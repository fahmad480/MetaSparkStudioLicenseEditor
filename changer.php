<?php
// read the file and unzip the file using ZipArchive to "temp" folder and filename as folder name
$zip = new ZipArchive;
$res = $zip->open($_FILES['file']['tmp_name']);
if ($res === TRUE) {
    $zip->extractTo('temp/' . $_FILES['file']['name']);
    $zip->close();
    $main_json = file_get_contents('./temp/' . $_FILES['file']['name'].'/main.json');
    $json = json_decode($main_json, true);
    if(!isset($json['children'][17]['children'][1]['identifier'])) {
        echo '<script>alert("Tidak ada file javascript, minimal buat 1");</script>';
    } else {
        echo $json['children'][17]['children'][1]['identifier'];
        $assetModelIdentifier = $json['children'][17]['children'][1]['identifier'];
        preg_match('/\d+/i', $assetModelIdentifier, $m);
        $code = (int) $m[0];

        $license_code = ltrim(str_replace($json['children'][25]['modelName'].":", '', $json['children'][25]['identifier']), 6);
        $license_model = "license_model:".($code+2)."-".$license_code;

        $licenseModelIdentifier = "license_model:".($code+2)."-".$license_code;

        $assetAuthor = $_POST['assetAuthor'];
        $assetTitle = $_POST['assetTitle'];
        $assetURLString = $_POST['assetURLString'];
        for($i=0; $i < count($assetAuthor); $i++) {
            $data['children'][$i]['assetAuthor'] = $assetAuthor[$i];
            $data['children'][$i]['assetModelIdentifier'] = $assetModelIdentifier;
            $data['children'][$i]['assetTitle'] = $assetTitle[$i];
            $data['children'][$i]['assetURLString'] = $assetURLString[$i];
            $data['children'][$i]['identifier'] = "asset_attribution_model:".($code+(4*($i+1)))."-".$license_code;
            $data['children'][$i]['licenseModelIdentifier'] = $licenseModelIdentifier;
            $data['children'][$i]['modelName'] = "asset_attribution_model";
        }
        $data['identifier'] = $json['children'][24]['identifier'];
        $data['modelName'] = $json['children'][24]['modelName'];
        $json['children'][24] = $data;

        $license_name = $_POST['license_name'];
        $license_url = $_POST['license_url'];
        $license_slug = $_POST['license_slug'];

        $newData['children'][0]['identifier'] = $license_model;
        $newData['children'][0]['linkURLString'] = $license_url;
        $newData['children'][0]['modelName'] = "license_model";
        $newData['children'][0]['name'] = $license_name;
        $newData['children'][0]['slug'] = $license_slug;
        $newData['identifier'] = $json['children'][25]['identifier'];
        $newData['modelName'] = $json['children'][25]['modelName'];
        $json['children'][25] = $newData;

        file_put_contents('./temp/' . $_FILES['file']['name'].'/main.json', json_encode($json));
        //zip a whole file inside the folder
        $zip = new ZipArchive;
        $res = $zip->open('temp/' . $_FILES['file']['name'].'.zip', ZipArchive::CREATE);
        if ($res === TRUE) {
            foreach (glob('temp/' . $_FILES['file']['name'].'/*') as $file) {
                $zip->addFile($file, basename($file));
            }    
            $zip->close();

            echo '<script>alert("File berhasil diubah");</script>';
            echo '<script>window.location.href = "./temp/' . $_FILES['file']['name'].'.zip";</script>';
        } else {
            echo '<script>alert("File gagal diubah");</script>';
        }
    }
} else {
    echo '<p>File upload failed!</p>';
}
?>
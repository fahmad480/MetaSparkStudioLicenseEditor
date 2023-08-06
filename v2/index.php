<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spark AR License Editor</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Spark AR Project License Editor V2 (BETA)</h1>
    <p><font style="color:red"><b>How to Use: </b></font></p>
    <li>Make sure your project have at least 1 javascript/typescript file, it's okay if the file is empty</li>
    <li>Upload only <b>.arproj</b> file to form below</li>
    <li>Click add license and fill all the form</li>
    <li>Click submit button</li>
    <li>Download the new project file</li>
    <li>Backup first your old .arproj file, and paste a new one</li>
    <form action="changer.php" method="post" enctype="multipart/form-data">
        <p>arproj file: <input type="file" name="file" id="file" required></p>
        <p><input type="submit" value="Upload"></p>
    </form>
</body>
</html>
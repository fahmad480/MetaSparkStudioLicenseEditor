<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spark AR License Editor</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Spark AR Project License Editor (BETA)</h1>
    <p><font style="color:red"><i>Disclaimer: </i></font>All license that already added inside the project will be removed.</p>
    <p><font style="color:red"><b>How to Use: </b></font></p>
    <li>Make sure your project have at least 1 javascript/typescript file, it's okay if the file is empty</li>
    <li>Upload only <b>.arproj</b> file to form below</li>
    <li>Click add license and fill all the form</li>
    <li>Click submit button</li>
    <li>Download the new project file</li>
    <li>Backup first your old .arproj file, and paste a new one</li>
    <form action="changer.php" method="post" enctype="multipart/form-data">
        <p>arproj file: <input type="file" name="file" id="file" required> | <button onclick="add_license()" type="button">Add License</button> | <button onclick="show_example()" type="button">Show Example</button></p>
        <p>License Name: <input type="text" name="license_name" id="license_name" required></p>
        <p>License Slug: <input type="text" name="license_slug" id="license_slug" required></p>
        <p>License URL: <input type="text" name="license_url" id="license_url" required></p>
        <table id="license">
        </table>
        <p><input type="submit" value="Upload"></p>
    </form>
    <script>
        function add_license() {
            $("#license").append('<tr style="border-style: solid; padding: 10px; margin: 3px;">'
            + '<th>Asset Author: <input type="text" name="assetAuthor[]" required></th>'
            + '<th>Asset Title: <input type="text" name="assetTitle[]" required></th>'
            + '<th>Asset URL: <input type="text" name="assetURLString[]" required></th>'
            + '<th><button onclick="return this.parentNode.parentNode.remove();" type="button">Remove this license</button></th>'
            + '</tr>');
        }
        function show_example() {
            $("#license").append('<tr style="border-style: solid; padding: 10px; margin: 3px;">'
            + '<th>Asset Author: <input type="text" name="assetAuthor[]" value="Faraaz Ahmad Permadi" required></th>'
            + '<th>Asset Title: <input type="text" name="assetTitle[]" value="Created" required></th>'
            + '<th>Asset URL: <input type="text" name="assetURLString[]" value="https://farzain.com/license/" required></th>'
            + '<th><button onclick="return this.parentNode.parentNode.remove();" type="button">Remove this license</button></th>'
            + '</tr>'
            + '<tr style="border-style: solid; padding: 10px; margin: 3px;">'
            + '<th>Asset Author: <input type="text" name="assetAuthor[]" value="Press F Studio" required></th>'
            + '<th>Asset Title: <input type="text" name="assetTitle[]" value="Developed" required></th>'
            + '<th>Asset URL: <input type="text" name="assetURLString[]" value="https://farzain.com/license/" required></th>'
            + '<th><button onclick="return this.parentNode.parentNode.remove();" type="button">Remove this license</button></th>'
            + '</tr>');
            $("#license_name").val("Developer");
            $("#license_slug").val("Press F Studio");
            $("#license_url").val("https://farzain.com/license/");
        }
    </script>
</body>
</html>
<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="#" enctype="multipart/form-data">
        <input type="file" name="fileToUpload"><br><br>
        <input type="submit" name="submit" value="Upload File">
</form>
</body>
</html>

<?php


$filename= $_FILES["fileToUpload"]["name"];
$tempname= $_FILES["fileToUpload"]["tmp_name"];
$folder="s-images/".$filename;
//echo $folder;
move_uploaded_file($tempname,$folder);
echo "<img src='$folder' height='100px' width='100px'>";
?>
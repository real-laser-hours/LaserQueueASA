<?php
//todo: set uploads/ to http server

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$dxfFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["submit"])) {
    $check = getdxfsize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an dxf - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an dxf.";
        $uploadOk = 0;
    }
}
//if (file_exists($target_file) || file_exists("old/"$target_file)) {
 //   echo "Sorry, file already exists.";
 //   $uploadOk = 0;
//}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($dxfFileType != "dxf) {
    echo "Sorry, only DXF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} 
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
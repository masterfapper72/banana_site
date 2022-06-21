<?php

require_once "functions.inc.php";
require_once "db_connect.inc.php";

session_start();

$file = $_FILES["profpic"];

$fileName = $_FILES["profpic"]["name"];
$fileTempName = $_FILES["profpic"]["tmp_name"];
$fileSize = $_FILES["profpic"]["size"];
$fileError = $_FILES["profpic"]["error"];

$fileExt = explode(".", $fileName);
$fileRealExt = strtolower(end($fileExt));

$allowedExt = array("jpg", "jpeg", "png", "gif");

if (in_array($fileRealExt, $allowedExt)) {
    if ($fileError == 0) {
        if ($fileSize < 1000000) {
            saveUserExt($conn, $fileRealExt, $_SESSION["username"]);
            $newFileName = $_SESSION["username"] . "_profile" . "." . $fileRealExt;
            $fileDestinationPath = "../assets/uploads/" . $newFileName;
            move_uploaded_file($fileTempName, $fileDestinationPath);
            updateProfileImgStatus($conn, $_SESSION["username"]);
            header("location: ../profile.php");
        } else {
            header("location: ../index.php?error=file_too_large");
        }
    } else {
        header("location: ../index.php?error=something_went_wrong");
}
    } else {
        header("location: ../index.php?error=invalid_file_extension");
}
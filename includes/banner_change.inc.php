<?php

require_once "functions.inc.php";
require_once "db_connect.inc.php";

session_start();

if (isset($_POST["submit"])) {
    $bannerFile = $_FILES["banner_file"];

    $bannerName = $_FILES["banner_file"]["name"];
    $bannerTempName = $_FILES["banner_file"]["tmp_name"];
    $bannerSize = $_FILES["banner_file"]["size"];
    $bannerError = $_FILES["banner_file"]["error"];

    $bannerExt = explode(".", $bannerName);
    $bannerRealExt = strtolower(end($bannerExt));

    $allowedBannerExt = array("png", "jpg", "jpeg", "gif");

    if (in_array($bannerRealExt, $allowedBannerExt)) {
        if ($bannerError == 0) {
            if ($bannerSize < 10000000) {
                saveUserBannerExt($conn, $bannerRealExt, $_SESSION["username"]);
                $newBannerName = $_SESSION["username"] . "_banner" . "." . $bannerRealExt;
                $bannerDestination = "../assets/uploads/" . $newBannerName;
                move_uploaded_file($bannerTempName, $bannerDestination);
                updateProfileBannerStatus($conn, $_SESSION["username"]);
                header("location: ../profile.php");
            } else {
                header("location: ../profile.php?error=file_too_large");
            }
        } else {
            header("location: ../profile.php?error=something_went_wrong");
        }
    } else {
        header("location: ../profile.php?error=invalid_file_extension");
    }
} else {
    header("location: ../index.php?error=bad_access");
}
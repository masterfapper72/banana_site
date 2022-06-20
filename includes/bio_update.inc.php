<?php

require_once "db_connect.inc.php";
require_once "functions.inc.php";

session_start();

$txtValue = $_POST["bio-txt"];

if (isset($_POST["submit"])) {
    if (!empty($txtValue)) {
        createBioTable($conn, $_SESSION["username"]);
        updateBio($conn, $txtValue, $_SESSION["username"]);
        header("location: ../profile.php");
    } else {
        header("location: ../profile.php?error=empty_bio");
        exit();
    }
} else {
    header("location: ../profile.php?error=bad_access");
    exit();
}
<?php 

require_once "db_connect.inc.php";
require_once "functions.inc.php";

session_start();

$dateValue = $_POST["date"];

if (isset($_POST["submit"])) {
    if (!empty($dateValue)) {
        editBirth($conn, $dateValue, $_SESSION["username"]);
        header("location: ../profile.php");
    } else {
        header("location: ../profile.php?error=empty_date_field");
    }
} else {
    header("location: ../profile.php?error=bad_access");
}
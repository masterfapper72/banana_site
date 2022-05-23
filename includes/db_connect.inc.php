<?php 

$dbServername = "localhost";
$dbUsername = "happybanana78";
$dbPassword = "biologia1";
$dbName = "banana_tutorial";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
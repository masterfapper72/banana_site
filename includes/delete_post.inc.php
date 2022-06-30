<?php

require_once "functions.inc.php";
require_once "db_connect.inc.php";

session_start();

$postId = $_POST["yes_del_btn"];

if (isset($_POST["yes_del_btn"])) {
    deletePost($conn, $_SESSION["username"], $postId);
} else {
    header("location: ../posts.php");
    exit();
}
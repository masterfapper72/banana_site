<?php

require_once "functions.inc.php";
require_once "db_connect.inc.php";

session_start();

$postTitleTxt = $_POST["new_post_title"];
$postContentTxt = $_POST["new_post_content"];

if (isset($_POST["submit"])) {
    createPostTable($conn);
    addNewPost($conn, $postContentTxt, $postTitleTxt, $_SESSION["username"]);
    header("location: ../posts.php");
} else {
    header("location: ../posts.php?error=bad_access");
    exit();
}
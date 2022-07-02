<?php

require_once "functions.inc.php";
require_once "db_connect.inc.php";

session_start();

$postContent = $_POST["edit_post_content"];
$postId = $_POST["yes_edit_btn"];

if (isset($_POST["yes_edit_btn"])) {
    editPost($conn, $_SESSION["username"], $postId, $postContent);
} 
elseif (isset($_POST["no_edit_btn"])) {
    header("location: ../posts.php");
    exit();
} else {
    header("location: ../posts.php?error=bad_access");
    exit();
}
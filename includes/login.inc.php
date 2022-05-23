<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["pwd"];

    include_once "db_connect.inc.php";
    include_once "functions.inc.php";

    $tableData = existingUsername($conn, $username);

    if (emptyInputLogin($username, $password) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if ($tableData["usersUid"] == $username) {
        if (password_verify($password, $tableData["usersPwd"])) {
            session_start();
            $_SESSION["userid"] = $tableData["usersId"];
            $_SESSION["username"] = $tableData["usersUid"];
            header("location: ../index.php");
        } else {
            header("location: ../index.php?error=wrong_password ");
        }
    } else {
        header("location: ../index.php?error=user_not_found");
    }
}
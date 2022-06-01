<?php

if (isset($_POST["submit"])) {
    $name = $_POST["full_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["pwd"];

    require_once "db_connect.inc.php";
    require_once "functions.inc.php";

    if (emptyInputSignup($name, $email, $username, $password) !== false) {
      header("location: ../index.php?error=emptyinput");
      exit();
    }

    if (invalidUsername($username) !== false) {
      header("location: ../index.php?error=invalidusername");
      exit();
    }

    if (existingUsername($conn, $username) !== false) {
      header("location: ../index.php?error=usernametaken");
      exit();
    }

    createUser($conn, $name, $email, $username, $password);

}

else {
  header("location: ../index.php?error=badaccess");
  exit();
}


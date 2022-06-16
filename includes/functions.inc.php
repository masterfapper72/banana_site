<?php

//Error functions
function emptyInputSignup($name, $email, $username, $password) {
    if (empty($name) || empty($email) || empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyInputLogin($name, $password) {
    if (empty($name) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUsername($user) {
    if (!preg_match("/^[a-zA-Z0-9]*$/", $user)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function existingUsername($conn, $user) {
    $sql = "SELECT * FROM users WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

//Create user on signup
function createUser($conn, $name, $email, $username, $password) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, profileImg, bannerImg, birthDate) VALUES (?, ?, ?, ?, 1, 1, 1);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmt_failed");
        exit();
    }
    $hashpwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../success.php");
    exit();
}

//Check if user already chnaged the default profile image
function checkProfileImg($conn) {
    $sql = "SELECT * FROM users";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row["profileImg"] == 1) {
            return true;
        } else {
            return false;
        }
    }
}

//Check if user already chnaged the default banner image
function checkBannerImg($conn) {
    $sql = "SELECT * FROM users";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row["bannerImg"] == 1) {
            return true;
        } else {
            return false;
        }
    }
}

//On user profile img upload change value in db
function updateProfileImgStatus($conn, $user) {
    $sql = "UPDATE users SET profileImg='" . 0 . "' WHERE usersUid='" . $user . "';";
    mysqli_query($conn, $sql);
}

//On user banner img upload change value in db
function updateProfileBannerStatus($conn, $user) {
    $sql = "UPDATE users SET bannerImg='" . 0 . "' WHERE usersUid='" . $user . "';";
    mysqli_query($conn, $sql);
}

//Save user profile img extension on db
function saveUserExt($conn, $ext, $user) {
    $sql = "UPDATE users SET ext='" . $ext . "' WHERE usersUid='" . $user . "';";
    mysqli_query($conn, $sql);
}

//Save user banner img extension on db
function saveUserBannerExt($conn, $ext, $user) {
    $sql = "UPDATE users SET bannerExt='" . $ext . "' WHERE usersUid='" . $user . "';";
    mysqli_query($conn, $sql);
}

//Get user profile img ext from db
function getExt($conn, $user) {
    $sql = "SELECT * FROM users WHERE usersUid='" . $user . "'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        return $row["ext"];
    }
}

//Get user banner img ext from db
function getBannerExt($conn, $user) {
    $sql = "SELECT * FROM users WHERE usersUid='" . $user . "'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        return $row["bannerExt"];
    }
}

//Edit birth date DB entry
function editBirth($conn, $date, $user) {
    $sql = "UPDATE users SET birthDate='" . $date . "' WHERE usersUid='" . $user . "';";
    mysqli_query($conn, $sql);
}

//Check user birth date
function checkBirthDate($conn, $user) {
    $sql = "SELECT * FROM users WHERE usersUid='" . $user . "';";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $result = $row["birthDate"];
    }
    if ($result != 1) {
        return true;
    } else {
        return false;
    }
}

//Get user birth date
function getBirthDate($conn, $user) {
    $sql = "SELECT * FROM users WHERE usersUid='" . $user . "';";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $result = $row["birthDate"];
    }
    return $result;
}
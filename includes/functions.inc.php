<?php

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

function createUser($conn, $name, $email, $username, $password) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, profileImg, bannerImg) VALUES (?, ?, ?, ?, 1, 1);";
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

function updateProfileImgStatus($conn, $user) {
    $sql = "UPDATE users SET profileImg='" . 0 . "' WHERE usersUid='" . $user . "';";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function updateProfileBannerStatus($conn, $user) {
    $sql = "UPDATE users SET bannerImg='" . 0 . "' WHERE usersUid='" . $user . "';";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function checkBannerImg($conn) {
    $sql = "SELECT * FROM users";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row["bannerImg"] == 1) {
            mysqli_close($conn);
            return true;
        } else {
            mysqli_close($conn);
            return false;
        }
    }
}

function saveUserExt($conn, $ext, $user) {
    $sql = "UPDATE users SET ext='" . $ext . "' WHERE usersUid='" . $user . "';";
    mysqli_query($conn, $sql);
}

function saveUserBannerExt($conn, $ext, $user) {
    $sql = "UPDATE users SET bannerExt='" . $ext . "' WHERE usersUid='" . $user . "';";
    mysqli_query($conn, $sql);
}

function getExt($conn, $user) {
    $sql = "SELECT * FROM users WHERE usersUid='" . $user . "'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        return $row["ext"];
    }
}

function getBannerExt($conn, $user) {
    $sql = "SELECT * FROM users WHERE usersUid='" . $user . "'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        return $row["bannerExt"];
    }
}
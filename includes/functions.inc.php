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

//Create users bio table
function createBioTable($conn, $user) {
    $sql1 = "CREATE TABLE IF NOT EXISTS usersBio (usersUid VARCHAR(128) NOT null, bio VARCHAR(256) NOT null);";
    $sql2 = "INSERT INTO usersBio (usersUid, bio) VALUES (?, 0);";
    $sql3 = "SELECT * FROM usersBio WHERE usersUid = '" . $user . "';";
    mysqli_query($conn, $sql1); // create bio table
    $checkUserQuery = mysqli_query($conn, $sql3); //check for username duplicate
    if (!mysqli_fetch_assoc($checkUserQuery)) {
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql2)) {
            header("location: ../profile.php?error=stmt_failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt); //bind username to new created table
        mysqli_stmt_close($stmt);
    }
}

//Update DB with new user bio
function updateBio($conn, $bio, $user) {
    $sql = "UPDATE usersBio SET bio = '" . $bio . "' WHERE usersUid = '" . $user . "';";
    mysqli_query($conn, $sql);
}

//Get users bio
function getBio($conn, $user) {
    $sql = "SELECT bio FROM usersBio WHERE usersUid = '" . $user . "';";
    $bioQuery = mysqli_query($conn, $sql);
    $fetchData = mysqli_fetch_assoc($bioQuery);
    return $fetchData["bio"];
}

//Check bio status
function bioStatus($conn, $user) {
    $sql = "SELECT bio FROM usersBio WHERE usersUid = '" . $user . "';";
    $bioQuery = mysqli_query($conn, $sql);
    $fetchData = mysqli_fetch_assoc($bioQuery);
    if ($fetchData["bio"] != 0) {
        return true;
    } else {
        return false;
    }
}

//Create posts table
function createPostTable($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS userPosts (
            id INT(11) PRIMARY KEY AUTO_INCREMENT NOT null,
            postAuthor VARCHAR(128) NOT null,
            postDate VARCHAR(128) NOT null,
            postContent LONGTEXT NOT null,
            postTitle VARCHAR(128) NOT null
            );";
    mysqli_query($conn, $sql);
}

//Insert users new post data into table
function addNewPost($conn, $postContent, $postTitle, $user) {
    $sql = "INSERT INTO userPosts (PostAuthor, postDate, postContent, postTitle) VALUES (?, ?, ?, ?);";
    $currentDate = date("Y/m/d");
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../posts.php?error=stmt_failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $user, $currentDate, $postContent, $postTitle);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

//Get user post from DB
function getPostContent($conn) {
    $sql = "SELECT * FROM userPosts WHERE postdate != '0000/00/00' ORDER BY postDate DESC;";
    $query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        echo "<h2>" . $row["postTitle"] . "</h2><br>";
        echo $row["postContent"] . "<br>";
    }
}
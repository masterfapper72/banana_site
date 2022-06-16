<?php require_once "includes/functions.inc.php"; ?>
<?php require_once "includes/db_connect.inc.php"; ?>
<?php include_once "modules/header.php"; ?>
<?php $userProfileExt = getExt($conn, $_SESSION["username"]); ?>
<?php $userBannerExt = getBannerExt($conn, $_SESSION["username"]); ?>
<?php $userBirth = getBirthDate($conn, $_SESSION["username"]); ?>

<div class="profile-container">
    <div class="profile-main-info">
        <form id="imgUpload" action="includes/profile_change.inc.php" method="POST" enctype="multipart/form-data">
            <?php if (checkProfileImg($conn)) { ?>
            <img class="profile-picture" src="assets/img/avatar.png" alt="profile avatar picture" onclick="changeProfileImg()">
            <?php } else { ?>
            <img class="profile-picture" src="<?php echo "assets/uploads/" . $_SESSION["username"] . "_profile". "." . $userProfileExt; ?>"
                alt="profile avatar picture" onclick="changeProfileImg()">
            <?php } ?>
            <input id="change_img" style="display: none;" type="file" name="profpic" onchange="submitImg()">
        </form>
        <p><?php echo $_SESSION["username"]; ?></p>
    </div>
    <?php if (checkBannerImg($conn)) { ?>
        <img class="banner-picture" src="assets/img/stock_banner.png" alt="profile banner picture">
    <?php } else { ?>
        <img class="banner-picture" src="<?php echo "assets/uploads/" . $_SESSION["username"] . "_banner". "." . $userBannerExt; ?>"
            alt="profile banner picture">
        <?php } ?>
    <div class="profile-bio">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    <div class="profile-birth"><b>Birth Date:</b>
        <?php
            if (!checkBirthDate($conn, $_SESSION["username"])) { ?>
                DD-MM-YY <?php } else {
                    echo $userBirth; 
                    } ?>
    </div>
    <button class="edit-profile-btn" type="button" onclick="openProfileSettings()">Edit Profile</button>
    <div id="p_settings" class="profile-edit">
        <img class="settings-close" src="assets/img/close.png" onclick="closeProfileSettings()">
        <div class="settings">
            <h2 class="sett-1">Edit Profile Banner</h2>
            <form class="banner-upload" action="includes/banner_change.inc.php" method="POST" enctype="multipart/form-data">
                <input class="banner-btn-1" type="file" name="banner_file">
                <button class="banner-btn-2" type="submit" name="submit">Upload</button>
            </form>
            <br>
            <hr>
            <h2 class="sett-2">Edit Birth Date</h2>
            <form class="birth-date" action="includes/birth_change.inc.php" method="POST">
                <input class="birth-btn-1" type="date" name="date">
                <button class="birth-btn-2" type="submit" name="submit">Change</button>
            </form>
            <br>
            <hr>
        </div>
    </div>
</div>

<?php include_once "modules/footer.php"; ?>
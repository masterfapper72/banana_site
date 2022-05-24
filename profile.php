<?php include_once "modules/header.php"; ?>

<div class="profile-container">
    <div class="profile-main-info">
        <img src="assets/img/avatar.png" alt="profile avatar picture">
        <p><?php echo $_SESSION["username"]; ?></p>
    </div>
    <img class="banner-picture" src="assets/img/stock_banner.png" alt="profile banner picture">
    <div class="profile-bio">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    <div class="profile-birth"><b>Birth Date:</b>
    DD/MM/YY
    </div>
    <button class="edit-profile-btn" type="button">Edit Profile</button>
</div>

<?php include_once "modules/footer.php"; ?>
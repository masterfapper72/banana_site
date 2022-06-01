    <!-- login popup -->
    <div id="login-bg" class="login-bg" onclick="closeLogin()"></div>
    <div id="login-popup" class="login-popup">
    <form action="includes/login.inc.php" method="post">
        <label>Username:</label>
        <input class="login-input" type="text" placeholder="Enter username..." name="username"><br>
        <label>Password:&nbsp;</label>
        <input class="login-input" type="password" placeholder="Enter password..." name="pwd"><br>
        <button class="login-btn" type="submit" name="submit">Login</button>
    </form>
    </div>
    <?php 
    if (isset($_GET["error"])) {
        // enmpty input error
        if ($_GET["error"] == "emptyinput") {
                ?> <div id="error-box" class="error-box">
                    <img src="assets/img/close.png" onclick="document.getElementById('error-box').style.display = 'none'">
                    <p>You left some blank fields into the form!</p>
                    </div>
        <?php }
        // user not found error
        if ($_GET["error"] == "user_not_found") {
            ?> <div id="error-box" class="error-box">
                <img src="assets/img/close.png" onclick="document.getElementById('error-box').style.display = 'none'">
                <p>Username not found! Consider signing up first.</p>
                </div>
    <?php }
    // wrong password error
    if ($_GET["error"] == "wrong_password") {
        ?> <div id="error-box" class="error-box">
            <img src="assets/img/close.png" onclick="document.getElementById('error-box').style.display = 'none'">
            <p>Wrong password!</p>
            </div>
<?php }
    }
?>
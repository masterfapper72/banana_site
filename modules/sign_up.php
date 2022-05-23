<!-- sign up popup -->
<div id="signup-bg" class="signup-bg" onclick="closeSignup()"></div>
        <div id="signup-popup" class="signup-popup">
        <form action="includes/signup.inc.php" method="post">
            <label>Full Name:</label>
            <input class="login-input" type="text" placeholder="Enter full name..." name="full_name"><br>
            <label>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input class="login-input" type="email" placeholder="Enter email..." name="email"><br>
            <label>Username:</label>
            <input class="login-input" type="text" placeholder="Enter username..." name="username"><br>
            <label>Password:&nbsp;</label>
            <input class="login-input" type="password" placeholder="Enter password..." name="pwd"><br>
            <button class="signup-btn" type="submit" name="submit">Sign Up</button>
        </form>
    </div>
<!-- sign up error messages -->
<?php 
    if (isset($_GET["error"])) {
        // enmpty input error
        if ($_GET["error"] == "emptyinput") {
                ?> <div id="error-box" class="error-box">
                    <img src="assets/img/close.png" onclick="document.getElementById('error-box').style.display = 'none'">
                    <p>You left some blank fields into the form!</p>
                    </div>
        <?php }
        // invalid username error
        else if ($_GET["error"] == "invalidusername") {
            ?> <div id="error-box" class="error-box">
                <img src="assets/img/close.png" onclick="document.getElementById('error-box').style.display = 'none'">
                <p>Invalid username! Please use only allowed characters.</p>
                </div>
            <?php }
            // uername taken error
            else if ($_GET["error"] == "usernametaken") {
                ?> <div id="error-box" class="error-box">
                    <img src="assets/img/close.png" onclick="document.getElementById('error-box').style.display = 'none'">
                    <p>Username already taken.</p>
                    </div>
            <?php }
    }
?>
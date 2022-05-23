<?php 
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Test Site v1</title>
    <meta
      name="description"
      content="This is my first Accademia delle professioni site!"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/app.css" />
  </head>
  <body>
    <div class="logo-container">
      <a href="index.php" title="Main Page"
        ><img src="assets/img/logo.png" alt="Big Banana Logo"
      /></a>
    </div>
    <!-- navbar -->
    <div class="menu">
      <?php
        if (isset($_SESSION["username"])) {
          ?> <a class="menu-item login color-black" href="../includes/logout.inc.php"><p>Logout</p></a>
          <?php
        } else { ?>
      <a class="menu-item login color-black" onclick="openSignup()"><p>Sign Up</p></a>
      <a class="menu-item login color-black" onclick="openLogin()"><p>Login</p></a>
      <?php 
          } ?>
      <?php
        if (isset($_SESSION["username"])) {
          ?> <a class="menu-item color-white" href="contact.php" title="contacts"
          ><p>Profile</p></a>
          <?php
        } ?>
      <a class="menu-item color-white" href="contact.php" title="contacts"
        ><p>Contacts</p></a
      >
      <a class="menu-item color-white" href="who.php" title="about the community"
        ><p>About Us</p></a
      >
      <a class="menu-item color-white" href="index.php" title="Main Page"><p>Home</p></a>
    </div>

    <?php include_once "modules/login.php" ?>
    <?php include_once "modules/sign_up.php" ?>
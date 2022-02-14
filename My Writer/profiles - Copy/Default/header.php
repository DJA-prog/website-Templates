<?php
  session_start();
  require "../../includes/dbh.inc.php";
  $server  = $_SERVER['SERVER_ADDR'];
  if (isset($_SESSION['WRITERname'])) {$user = $_SESSION['WRITERname'];}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/contacts.css">
    <link rel="stylesheet" href="../../css/general.css">
    <link rel="stylesheet" href="../../css/HMF.css">
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="../../css/links.css">
    <link rel="stylesheet" href="../../css/manage.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <link rel="stylesheet" href="../../css/up-down.css">
    <link rel="icon" href="../../img/writer_icon.png">
    <script src="../../scripts/main.js" charset="utf-8"></script>
    <title>MY Page</title>
  </head>

  <body>
    <header>
      <div class="header">
        <div class="Logo">
          <img src="../../img/writer_icon.png">
        </div>
        <div class="navbar">
          <div id="narrow">
            <div class="dropdown">
            <button class="dropbtn" onclick="myFunction()">Menu</button>
            <div class="dropdown-content" id="myDropdown">
              <a href="../../index.php">Home</a>
              <a href="./contacts.php">Contact</a>
              <a href="./links.php">Links</a>
              <a href="./up-down.php">UP / DOWN</a>
              <a href="./profile.php">Profile</a>
            </div>
            </div>
          </div>
          <div id="broad">
            <a href="../../index.php">Home</a>
            <a href="./contacts.php">Contact</a>
            <a href="./links.php">Links</a>
            <a href="./up-down.php">UP / DOWN</a>
            <a href="./profile.php">Profile</a>
          </div>
        </div>
        <div class="Profile">
          <div class="Username">
            <?php echo '<p>User: '.$_SESSION['WRITERname'].'</p>'; ?>
          </div>
          <div id="logout">
            <span onclick="logout_close()" style="cursor:pointer;">&times;</span>
            <div class="Username" style="text-align:center;">
              <?php echo '<p>Do you want to logout from:</P><br><p> '.$_SESSION['WRITERname'].'</p>';?>
            </div>
            <form action="../../includes/logout.inc.php" method="post" style="text-align:center;">
              <button type="submit" name="login-submit" style="cursor:pointer;" class="logout">Logout</button>
            </form>
          </div>
          <div class="Profile_image">
            <?php
            $query = "SELECT profile_img FROM users WHERE username='$user';";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $profile_img = $row['profile_img'];
                echo '<img src="/img/profile_img/'.$profile_img.'" id="Profile_image" onclick="logout()" style="cursor:pointer;">';
              }
            }else {
              echo $query;
            }
             ?>
          </div>
        </div>
      </div>
    </header>

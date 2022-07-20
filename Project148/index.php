<?php session_start(); // session: id, username, logged_in, welcomed
  // $_SESSION['id'] = 12195638;
  // $_SESSION['logged_in'] = false;
  // $_SESSION['username'] = "Jammy";
  // $_SESSION['welcomed'] = true;
  // $_SESSION['admin'] = false;
  require './includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="jquery.min.js" charset="utf-8"></script>
    <script src="./js/this_jquery.js"></script>
    <script src="./js/main.js" charset="utf-8"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/master.css">
    <link rel="stylesheet" href="./styles/login.css">
    <link rel="stylesheet" href="./styles/signup.css">
    <link rel="stylesheet" href="./styles/left_menu.css">
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/displays.css">
    <link rel="stylesheet" href="./styles/favourites.css">
    <link rel="stylesheet" href="./styles/website.css">
    <link rel="stylesheet" href="./styles/settings.css">
    <?php
    $query = "SELECT websiteData.value, websiteData.iconPath FROM websiteData WHERE websiteData.fieldName='siteName';";
    $result = mysqli_query($conn,$query);
    if (!empty($result)){
      if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
          echo '
          <link rel="icon" href="'.$row['iconPath'].'">
          <title>'.$row['value'].'</title>';
        }
      }
    }
     ?>

  </head>
  <body>
    <!-- <data id="cssProperties" buttonB-color="purple" buttonb-color="pink"></data> -->
    <?php
    if (!isset($_SESSION['TP_logged_in']) || $_SESSION['TP_logged_in'] == false){
      if (isset($_GET['log'])) {
        if ($_GET['log'] == "signin") {
          require './common/login_part.php';
        }elseif ($_GET['log'] == "signup") {
          require './common/signup_part.php';
        }
      }else{
        require './common/login_part.php';
      }
    }elseif ($_SESSION['TP_logged_in'] == true) {
      require './common/home_page.php';
    }
    ?>
  </body>
</html>

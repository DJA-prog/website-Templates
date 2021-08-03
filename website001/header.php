<?php
  session_start();
  require "./includes/dbh.inc.php";
  $server  = $_SERVER['SERVER_ADDR'].':84';
  if (isset($_SESSION['UID'])) {$user = $_SESSION['UID'];}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">
    <script src="./scripts/main.js" charset="utf-8"></script>
    <link rel="stylesheet" href="./css/master.css">
    <link rel="stylesheet" href="./css/content.css">
    <link rel="icon" href="./img/favicon.ico">
    <title>Site</title>
  </head>
  <body>
    <header>
      <div class="logo">
        <a href="./index.php">
          <img src="./img/logo.png" alt="Site">
          <h2>Site</h2>
        </a>
      </div>
      <div class="navigation">

      </div>
      <div class="logger">
        <div class="wrapper">
          <?php
            if(isset($user)){
              echo '
                <form class="logout" action="./includes/logout.php" method="post">
                  <input class="loggerButton" type="submit" name="logout" value="LOGOUT">
                </form>
              ';
            }else{
              echo '<button class="loggerButton" onclick="loginOpen()">LOGIN</button>';
            }
           ?>
        </div>
      </div>
    </header>

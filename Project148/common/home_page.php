<?php
$query = "SELECT users.background_img FROM users WHERE users.id = ".$_SESSION['TP_id'].";";
$result = mysqli_query($conn,$query);
if (!empty($result)){
  if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      echo '<style media="screen">#home_page{background-image: url("'.$row[0].'");color: white;}</style>';
    }
  }
}

 ?>
<div id="home_page">
  <?php
  include './common/pops/welcome.php';
  include './common/left_menu_mobile.php';
  ?>
  <img class="left_menu_mobile_button" src="./img/icons/list.png" alt="&#9776;" onclick="openMobileNav()">
  <img class="left_menu_button" src="./img/icons/list.png" alt="&#9776;" onclick="openNav()">
  <div id="main" class="home_page_window">
    <?php
      // if (isset($_GET['admin']) || $_GET['table'] == "Favourites"){
      //   include 'website.php';
      // }
      if (isset($_GET['settings'])){
        include 'settings.php';
      }elseif (isset($_GET['upload'])){
        include 'upload.php';
      }elseif (!isset($_GET['table']) || $_GET['table'] == "Favourites"){

        if ($_SESSION['TP_admin'] == false){include 'favourites.php';}else{include 'website.php';}
      }elseif (isset($_GET['table'])){
        require 'items_list.php';
      }


      require 'videos_display.php';
     ?>

  </div>
</div>

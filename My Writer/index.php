<?php
  require "header.php";
?>
    <div class="main">
      <?php
      if (isset($_GET["error"])) {
          echo '<script>alert('.$_GET["error"].')</script>';
      }
      if (isset($_GET["errorlogin"]) || isset($_GET["errorregister"])) {
          echo '<script>document.getElementById("login_register").style.display = "block";</script>';
      }
      /*if (isset($_SESSION['WRITERname']) && $_SESSION['WRITERname'] != "Admin") {
        echo '<form class="" action="./index/profile_create.php" method="post">
          <button type="submit" name="button">Create/Delete</button>
        </form>';
      }*/
       ?>
       <div class="current">
         <h2 style="margin: 0; text-align: center;">!Current Books available for reading!</h2>
       </div>
      <?php require 'index/book_link.php'; ?>
      <?php if (isset($user)) {
        echo '
        <div class="current">
          <h2 style="margin: 0; text-align: center;">LAST READ</h2>
        </div>';
       require 'index/book_link_last.php';
      } ?>

  </div>

<?php
  require "footer.php";
?>

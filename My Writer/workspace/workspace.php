<?php require './header.php';?>
<?php require './index/new_script.inc.php'; ?>
<link rel="stylesheet" href="./css/book_link.css">
<main>
  <div class="top_ribbon">
    <form method="post" class="top_ribbon_nav">
      <button name="button" class="new_script" title="Create and View own work."><img src="./img/new_script_icon.png" alt="New Script"></button>
      <button name="continue_script" class="continue_script" title="Continue on last editted."><img src="./img/continue_script_icon.jpg" alt="Continue Script"></button>
      <button name="my_library" class="my_library" title="Available for public view."><img src="./img/my_library_icon.jpg" alt="My Library"></button>
    </form>
      <!--
    <div class="top_ribbon_nav">
      <div class="continue_script"><img src="./img/continue_script_icon.jpg" alt="Continue Script" onclick="continue_script()"></div>
      <div class="my_library"><img src="./img/my_library_icon.jpg" alt="My Library" onclick="my_library()"></div>
    </div>
  -->
  </div>
  <div class="workshop_content">
    <?php
    if(isset($_POST['my_library'])){
      require '../index/book_link.php';
    }elseif (isset($_POST['continue_script'])) {
      require './index/continue.inc.php';
    }else {
      require './index/library.inc.php';
    }

     ?>
  </div>

</main>
<?php require './footer.php'; ?>

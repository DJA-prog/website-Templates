<?php require './header.php';
if ($_SESSION['WRITERname'] != "Admin") {
  header("Location: ../../index.php");
}?>
<main>
  <div class="profile_settings">
    <div class="profile_side_panel">
      <button onclick="personal()">Personal</button><br><!-- bio cell profile_image-->
      <button onclick="password()">Password</button><br>
      <button onclick="personalise()">Personalise</button><br>
      <button onclick="terminate()">Terminate</button><br>
    </div>
    <div class="profile_main_view">
      <?php require '../../index/profile_ext_01.php'; ?>
    </div>
  </div>
</main>




</body>
</html>

<?php require './header.php';
if (!isset($_SESSION['WRITERname'])) {
  header("Location: ../../index.php");
  exit;
}?>

<main>
  <div class="profile_settings">
    <div class="profile_side_panel">
      <button onclick="profile('personal')">Personal</button><br><!-- bio cell profile_image-->
      <button onclick="profile('pwd_change')">Password</button><br>
      <button onclick="profile('personalise')">Personalise</button><br>
      <button onclick="profile('delete_profile')">Terminate</button><br>
    </div>
    <div class="profile_main_view">
      <?php require './index/profile_ext_01.php'; ?>
    </div>
  </div>
</main>
<script src="./scripts/main.js" charset="utf-8"></script>


</body>
</html>

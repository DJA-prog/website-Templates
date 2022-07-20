<div id="left_menu_mobile" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="?settings" title="Settings" style="font-weight:bold;"><?php echo $_SESSION['TP_username']; ?></a>
  <a href="?table=Animations">Animations</a>
  <a href="?table=Images&category=comics">Comics</a>
  <a href="?table=Text&category=documents">Documents</a>
  <?php if ($_SESSION['TP_admin'] == false){echo '<a href="?table=Favourites">Favourites</a>';}?>
  <a href="?table=Images">Images</a>
  <a href="?table=Lists">Lists</a>
  <a href="?table=Text">Text</a>
  <a href="?upload">Upload</a>
  <a href="?table=Videos">Videos</a>
  <?php if ($_SESSION['TP_admin'] == true){echo '<a href="?table=Favourites">Website</a>';} ?>
  <a href="./includes/logout.inc.php">Logout</a>
</div>

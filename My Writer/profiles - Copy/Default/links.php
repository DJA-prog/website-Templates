<?php require './header.php';
if (!isset($_SESSION['WRITERname'])) {
  header("Location: ../../index.php");
  exit;
}?>
<main>
  <ul>
    <?php echo '<li><a href="/project010/home.php">Home</a></li>'; ?>
    <li><a href="http://www.youtube.com">YouTube</a></li>
  </ul>
</main>




</body>
</html>

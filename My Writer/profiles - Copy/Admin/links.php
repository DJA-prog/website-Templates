<?php require './header.php';
  if ($_SESSION['WRITERname'] != "Admin") {
    header("Location: ../../index.php");
  }?>
<main>
  <ul>
    <li><a href="../../../project010/index.php">Home</a></li>
    <li><a href="http://www.youtube.com">YouTube</a></li>
  </ul>
</main>




</body>
</html>

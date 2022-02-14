<?php

require '../../includes/dbh.inc.php';
if (isset($_POST['pvt'])) {
  $pvt = $_POST['pvt'];
  $who = $_POST['who'];

  $sql = 'UPDATE books SET pvt="'.$pvt.'" WHERE title="'.$who.'"';
  if (!mysqli_query($conn,$sql)) {
    echo "PVT update error: $sql";
  }
  header("Location: ../workspace.php");
  exit;
}
 ?>

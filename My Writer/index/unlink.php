<?php
if(isset($_POST['delete-submit'])){
  session_start();

  $user = $_SESSION['WRITERname'];
  $loc = $_POST['dirfile'];
  unlink("../profiles/".$user."/".$loc);
  header("Location: ../up-down.php?delete=success");
  exit;
}else {
 header("Location: ../index.php");
 exit;
}

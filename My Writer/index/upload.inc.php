<?php
if(isset($_POST['upload-submit'])){
  session_start();
 // Count total files
 $countfiles = count($_FILES['file']['name']);
 $user = $_SESSION['WRITERname'];
 $loc = $_POST['dir'];
 $location = '../profiles/'.$user.$loc;
 $file = 0;
 // Looping all files
 for($i=0;$i<$countfiles;$i++){
  $filename = $_FILES['file']['name'][$i];

  // Upload file
  move_uploaded_file($_FILES['file']['tmp_name'][$i],$location.$filename);
 }
 header("Location: ../up-down.php?upload=success");
 exit;
}else {
  header("Location: ../index.php");
  exit;
}

?>

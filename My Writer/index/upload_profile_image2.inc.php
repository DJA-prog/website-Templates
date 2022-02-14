<?php
session_start();
require '../includes/dbh.inc.php';
if (isset($_POST['upload-submit'])) {
  $image = $_FILES['uploadfile']['name'];
  $fileSize = $_FILES['uploadfile']['size'];
  $fileError = $_FILES['uploadfile']['error'];
  $fileTmpName = $_FILES['uploadfile']['tmp_name'];
  $ext = substr(strrchr($image, '.'), 1);
  $user = $_SESSION['WRITERname'];
  $fileNameNew = $user.".".$ext; //unique name from mili seconds
  $target = '../img/profile_img/' . $fileNameNew;

  $query1 = "SELECT profile_img FROM users WHERE username='$user'";
  $result = mysqli_query($conn, $query1);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $profile_img = $row['profile_img'];
      unlink('../img/profile_img/'.$profile_img);
    }
  }else {
    echo $query;
  }
  $query2 = "UPDATE users SET profile_img='$fileNameNew' WHERE username='$user'";
  mysqli_query($conn, $query2);
  mysqli_close($conn);

if (move_uploaded_file($fileTmpName, $target)) {
  header("location: ../profile.php?success=uploaded");
  exit;
}
}else {
  header("Location: ../index.php");
  exit();
}

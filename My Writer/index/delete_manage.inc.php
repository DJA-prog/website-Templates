<?php
session_start();
require '../includes/dbh.inc.php';

$admin = $_SESSION['WRITERname'];
$userdel = $_POST['user'];
$target = "../profiles/".$_POST['user'];

$sql = "DELETE FROM users WHERE username='$userdel';";
if ($conn->query($sql) === TRUE) {
  $conn->close();
  $query1 = "SELECT profile_img FROM users WHERE username='$userdel'";
  $result = mysqli_query($conn, $query1);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $profile_img = $row['profile_img'];
      unlink('../img/profile_img/'.$profile_img);
    }
  }else {
    echo $query;
  }
  deleteContent($target);
  rmdir($target);
  header("Location: ../profiles/".$admin."/Manage.php?Deleted=".$userdel);
  exit;
} else {
  header("Location: ../index.php?error=". $conn->error);
  exit;
}
function deleteContent($path){
  try{
    $iterator = new DirectoryIterator($path);
    foreach ( $iterator as $fileinfo ) {
      if($fileinfo->isDot())continue;
      if($fileinfo->isDir()){
        if(deleteContent($fileinfo->getPathname()))
          @rmdir($fileinfo->getPathname());
      }
      if($fileinfo->isFile()){
        @unlink($fileinfo->getPathname());
      }
    }
  } catch ( Exception $e ){
     // write log
     return false;
  }
  return true;
}

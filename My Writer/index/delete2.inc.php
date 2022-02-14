<?php
session_start();
require '../includes/dbh.inc.php';

$user = "'".$_SESSION['WRITERname']."'";
$target = "../profiles/".$_SESSION['WRITERname'];

$sql = "DELETE FROM users WHERE username=".$user.";";

if ($conn->query($sql) === TRUE) {
  $conn->close();
  deleteContent($target);
  rmdir($target);
  unset($_SESSION['WRITERid']);
  unset($_SESSION['WRITERname']);
  unset($_SESSION['WRITERmail']);
  header("Location: ../index.php?Deleted=".$user);
  exit;
} else {
  header("Location: ./index.php?error=". $conn->error);
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

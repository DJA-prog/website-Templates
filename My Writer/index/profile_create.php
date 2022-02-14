<?php
  session_start();
  $server  = $_SERVER['SERVER_ADDR'];
  if (isset($_SESSION['WRITERname'])) {
    $user = $_SESSION['WRITERname']; //Create/Delete
  }else {
    $user = $username; //first signup
  }
  $target = "../profiles/".$user;

if (!file_exists($target)) {
  mkdir($target);
  mkdir($target.'/documents');
  mkdir($target.'/images');
  mkdir($target.'/videos');

}elseif (isset($_SESSION['WRITERname'])) {
  deleteContent($target);
  rmdir($target);
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
header("Location: http://".$server."/Project033/index.php");
exit;

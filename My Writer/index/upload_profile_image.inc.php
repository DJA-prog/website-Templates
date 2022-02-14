<?php
session_start();
require '../includes/dbh.inc.php';
if (isset($_POST['upload-submit'])) {
  $file = $_FILES['uploadfile'];

  $fileName = $_FILES['uploadfile']['name'];
  $fileTmpName = $_FILES['uploadfile']['tmp_name'];
  $fileSize = $_FILES['uploadfile']['size'];
  $fileError = $_FILES['uploadfile']['error'];
  $fileType = $_FILES['uploadfile']['type'];
  $dir = "../profiles/".$_SESSION['WRITERname'];

  echo $dir . '</br>' . $fileName . '</br>' . $fileTmpName . '</br>' . $fileSize . '</br>' . $fileError . '</br>' . $fileType . '</br>';

  $fileExt = explode('.', $fileName); //split $fileName into smaller bits from the dot
  $fileActualExt = strtolower(end($fileExt)); //get end of name "Jpeg" and make sure it is lowercase


if ($fileError == 0) {
  if ($fileActualExt == 'png') {
    if ($fileSize < 500000) {
      if (file_exists($dir . '/' . $fileName)){unlink($dir.'/profile.png');}
      $fileNameNew = "profile".".".$fileActualExt;
  	  //$fileNameNew = uniqid('', true).".".$fileActualExt; //unique name from mili seconds
  	  $fileDestination = $dir . '/' . $fileNameNew; //change name to prevent clash
  	  //$fileDestination = $dir . '/' . $fileName;  //keep name
      $sql = "INSERT INTO users ('profile_img') VALUES ('$fileName')";
      mysqli_query($conn, $sql);

  	  move_uploaded_file($fileTmpName, $fileDestination); //move file "from" "too"
  	  header("location: ../profiles/".$_SESSION['WRITERname']."/profile.php?success=uploaded");
      exit;
  	}else {
  	  header("Location: ../profiles/".$_SESSION['WRITERname']."/profile.php?error=toolarge");
  	  exit();
  	}
  }else{
    header("Location: ../profiles/".$_SESSION['WRITERname']."/profile.php?error=notpng");
    exit();
  }
}else {
  header("Location: ../profiles/".$_SESSION['WRITERname']."/profile.php?error=notuploaded");
  exit();
}

}else{
  header("Location: ../index.php");
  exit();
}
 ?>

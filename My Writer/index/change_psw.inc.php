<?php
if (isset($_POST['change-psw'])) {
  require '../includes/dbh.inc.php';
  session_start();
  $user=$_SESSION['WRITERname'];
  $cpsw=$_POST['cpsw'];//here
  $npsw=$_POST['npsw'];
  $rnpsw=$_POST['rnpsw'];//here

  if ($npsw == $rnpsw) {
    if ($cpsw != $npsw) {
      $sql = "SELECT * FROM users WHERE username=?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {header("Location: ../index.php?error=sqlerror");exit();}
      mysqli_stmt_bind_param($stmt, "s", $user);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($cpsw, $row['password']);
        if ($pwdCheck == false) {
          header("Location: ../index.php?error=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true) {
          $stmt = $conn->prepare("UPDATE users SET password=? WHERE username=?");
          $inpsw = password_hash($npsw, PASSWORD_DEFAULT);
          $stmt->bind_param('ss', $inpsw, $user);
          $user = $_SESSION['WRITERname'];
          $stmt->execute();
          header("Location: ../Profiles/".$user."/profile.php?login=success");
          exit();
        }
      }
    }else {
      header("Location: ../Profiles/".$user."/profile.php?error=same");
      exit();
    }
  }else {
    header("Location: ../Profiles/".$user."/profile.php?error=notsame");
    exit();
  }

}else {
  header("Location: ../index.php");
  exit();
}

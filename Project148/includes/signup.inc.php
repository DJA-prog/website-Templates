<?php
if (isset($_POST['submit_signup'])) {

  require 'dbh.inc.php';

  $username = $_POST['username'];
  $fname = $_POST['first_name'];
  $sname = $_POST['last_name'];
  $email = $_POST['email'];
  $password = $_POST['password_1'];
  $passwordRepeat = $_POST['password_2'];

  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../index.php?log=signup&errorregister=emptyfields&username=".$username."&mail=".$email);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../index.php?log=signup&errorregister=invalidusernamemail&username=".$username."&mail=".$email."&fname=".$fname."&surname=".$sname);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../index.php?log=signup&errorregister=invalidusername&username=".$username."&mail=".$email."&fname=".$fname."&surname=".$sname);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../index.php?log=signup&errorregister=invalidmail&username=".$username."&mail=".$email."&fname=".$fname."&surname=".$sname);
    exit();
  }
  else if ($password !== $passwordRepeat) {
    header("Location: ../index.php?log=signup&errorregister=passnomatch&username=".$username."&mail=".$email."&fname=".$fname."&surname=".$sname);
    exit();
  }
  else {

    $sql = "SELECT username FROM users WHERE username=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?log=signup&errorregister=sqlerror1");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCount = mysqli_stmt_num_rows($stmt);
      mysqli_stmt_close($stmt);
      if ($resultCount > 0) {
        header("Location: ../index.php?log=signin&errorregister=usertaken&username=".$username);
        exit();
      }
      else {
        $sql = "INSERT INTO users (username, first_name, last_name, email, password) VALUES ( ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../index.php?log=signup&errorregister=sqlerror2");
          exit();
        }
        else {

          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          if (!mysqli_stmt_bind_param($stmt, "sssss", $username, $fname, $sname, $email, $hashedPwd)) {
              header("Location: ../index.php?log=signup&errorregister=SQLbinduploadfail");
              exit();
          }
          if (!mysqli_stmt_execute($stmt)) {
              header("Location: ../index.php?log=signup&errorregister=SQLuploadfail");
              exit();
          }

          $query = "UPDATE users SET profile_img='guest_icon.png' WHERE username='$username'";
          mysqli_query($conn, $query);

          // require '../index/profile_create.php';
          header("Location: ../index.php?log=signin&signup=success");
          exit();

        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location: ../index.php?here");
  exit();
}
?>

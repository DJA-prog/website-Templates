<?php
if (isset($_POST['signup-submit'])) {

  require 'dbh.inc.php';

  $username = $_POST['username'];
  $fname = $_POST['Fname'];
  $sname = $_POST['Lname'];
  $email = $_POST['mail'];
  $cell = $_POST['cell'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../index.php?errorregister=emptyfields&username=".$username."&mail=".$email);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../index.php?errorregister=invalidusernamemail&username=".$username."&mail=".$email."&fname=".$fname."&surname=".$sname."&cell=".$cell);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../index.php?errorregister=invalidusername&username=".$username."&mail=".$email."&fname=".$fname."&surname=".$sname."&cell=".$cell);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../index.php?errorregister=invalidmail&username=".$username."&mail=".$email."&fname=".$fname."&surname=".$sname."&cell=".$cell);
    exit();
  }
  else if ($password !== $passwordRepeat) {
    header("Location: ../index.php?errorregister=passwordcheck&username=".$username."&mail=".$email."&fname=".$fname."&surname=".$sname."&cell=".$cell);
    exit();
  }
  else {

    $sql = "SELECT username FROM users WHERE username=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?errorregister=sqlerror1");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCount = mysqli_stmt_num_rows($stmt);
      mysqli_stmt_close($stmt);
      if ($resultCount > 0) {
        header("Location: ../index.php?errorregister=usertaken&username=".$username."&mail=".$email."&fname=".$fname."&surname=".$sname."&cell=".$cell);
        exit();
      }
      else {
        $sql = "INSERT INTO users (username, fullname, surname, email, cell, password) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../index.php?errorregister=sqlerror2");
          exit();
        }
        else {

          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          if (!mysqli_stmt_bind_param($stmt, "ssssss", $username, $fname, $sname, $email, $cell, $hashedPwd)) {
              header("Location: ../index.php?errorregister=SQLbinduploadfail");
              exit();
          }
          if (!mysqli_stmt_execute($stmt)) {
              header("Location: ../index.php?errorregister=SQLuploadfail");
              exit();
          }

          $query = "UPDATE users SET profile_img='guest_icon.png' WHERE username='$username'";
          mysqli_query($conn, $query);

          require '../index/profile_create.php';
          header("Location: ../index.php?signup=success");
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
<input type="text" name="username" placeholder="Username">
<input type="text" name="Fname" placeholder="Full Name">
<input type="text" name="Lname" placeholder="Surname">
<input type="date" name="dob">
<input type="text" name="mail" placeholder="E-mail">
<input type="text" name="cell" placeholder="Cell">
<input type="password" name="pwd" placeholder="Password">
<input type="password" name="pwd-repeat" placeholder="Repeat password">

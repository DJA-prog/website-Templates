<?php
require '../includes/dbh.inc.php';
session_start();
if (isset($_POST['update-cell'])) {
  $cell = $_POST['cell'];
  $user = $_SESSION['WRITERname'];

  $stmt = $conn->prepare("UPDATE users SET cell=? WHERE username=?");
  $stmt->bind_param('ss', $cell, $user);
  $stmt->execute();
  header("Location: ../profile.php");
  exit;
}

if (isset($_POST['update-font_size'])) {
  $font_size = $_POST['font_size'];
  $user = $_SESSION['WRITERname'];

  $stmt = $conn->prepare("UPDATE users SET font_size=? WHERE username=?");
  $stmt->bind_param('ss', $font_size, $user);
  $stmt->execute();
  header("Location: ../profile.php");
  exit;

}

if (isset($_POST['update-line_space'])) {
  $line_space = $_POST['line_space'];
  $user = $_SESSION['WRITERname'];

  $stmt = $conn->prepare("UPDATE users SET line_space=? WHERE username=?");
  $stmt->bind_param('ss', $line_space, $user);
  $stmt->execute();
  header("Location: ../profile.php");
  exit;

}

if (isset($_POST['update-bio'])) {
  $bio = $_POST['mybio'];
  $user = $_SESSION['WRITERname'];

  $stmt = $conn->prepare("UPDATE users SET bio=? WHERE username=?");
  $stmt->bind_param('ss', $bio, $user);
  $bio = $_POST['mybio'];
  $user = $_SESSION['WRITERname'];
  $stmt->execute();
  header("Location: ../profile.php");
  exit;
}

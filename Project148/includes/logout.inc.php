<?php
  session_start();
  unset ($_SESSION['TP_id']);
  unset ($_SESSION['TP_logged_in']);
  unset ($_SESSION['TP_username']);
  unset ($_SESSION['TP_welcomed']);
  session_destroy();
  header("Location: ../index.php?logged=out");
  exit;
?>

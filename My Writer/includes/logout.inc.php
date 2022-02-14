<?php
session_start();
unset($_SESSION['WRITERid']);
unset($_SESSION['WRITERname']);
unset($_SESSION['WRITERmail']);
header("Location: ../index.php");

<?php
$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "******";
$dBName = "Site";

$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "Connection failed: " . mysqli_connect_error();
}

<?php
$dBServername = "localhost";
$dBUsername = "apacheUser";
$dBPassword = "BgIPpMAwgcCeAjce#2";
$dBName = "mywriter";

$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "Connection failed: " . mysqli_connect_error();
}

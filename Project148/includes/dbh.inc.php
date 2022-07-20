<?php
// $dBServername = "localhost";
// if (PHP_OS === 'WINNT') {
//     $dBUsername = "root";
// } else if (PHP_OS === 'Linux') {
//     $dBUsername = "apacheUser";
// } else {
//     $dBUsername = "root";
// }

// $dBPassword = "BgIPpMAwgcCeAjce#2";
// $dBName = "from_here";

$dBServername = "127.0.0.1";
$dBUsername = "Prime";
$dBPassword = "vAcR9NjWqEMSgD6";
$dBName = "Prime";

// Create connection
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

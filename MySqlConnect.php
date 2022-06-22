<?php
$databaseHost     = 'localhost';
$databaseName     = 'webbanhang';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if(!$mysqli)
    die("kết nối lỗi" . mysqli_connect_error());
?>
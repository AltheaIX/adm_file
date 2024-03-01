<?php

session_start(); // Digunakan untuk memulai session

date_default_timezone_set("Asia/Makassar");
//echo date("Y/m/d h:i:a");

$host = "localhost"; // nama host anda
$user = "tugasi_uldb"; // usernames dari host anda
$pass = "RuEFggSHTgEI"; //password dari host anda
$db   = "tugasi_ldb"; // nama database yang anda miliki

try {
	$conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}
?>

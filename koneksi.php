<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "db_algoritma_winnowing";

$conn = mysqli_connect($host, $username, $password, $database);

date_default_timezone_set('Asia/Jakarta');

include 'proses/function.php';
?>
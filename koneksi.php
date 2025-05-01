<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$port = "5432";
$user = "postgres"; 
$password = "jaelani"; 
$dbname = "dht11";

// Membuat koneksi
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// echo "Connected successfully";
// pg_close($conn);
?>

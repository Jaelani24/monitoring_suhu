<?php
// Koneksi ke PostgreSQL
$host = "localhost";
$port = "5432";
$dbname = "dht11"; 
$user = "postgres";  
$password = "jaelani"; 

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Membuat database baru
$sql = "CREATE DATABASE dht11";
$result = pg_query($conn, $sql);

if ($result) {
    echo "Database 'dht11' created successfully.";
} else {
    echo "Error creating database: " . pg_last_error($conn);
}

pg_close($conn);

echo "<br>";

// Koneksi ke database baru
$dbname = "dht11";
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Connection to 'dht11' failed: " . pg_last_error());
}

// Membuat tabel
$sql = "CREATE TABLE logs (
    no SERIAL PRIMARY KEY,
    tanggal DATE,
    hari VARCHAR(30),
    waktu TIME,
    pelanggan VARCHAR(30),
    suhu VARCHAR(10),
    kelembapan VARCHAR(10)
)";

$result = pg_query($conn, $sql);

if ($result) {
    echo "Table 'logs' created successfully.";
} else {
    echo "Error creating table: " . pg_last_error($conn);
}

pg_close($conn);
?>

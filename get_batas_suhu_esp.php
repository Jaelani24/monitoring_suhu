<?php
include('koneksi.php');

$query = "SELECT batas_suhu FROM setting_kipas WHERE id = 1";
$result = pg_query($conn, $query);

if ($result) {
    $row = pg_fetch_assoc($result);
    echo $row['batas_suhu'];
} else {
    echo "0"; // Default kalau gagal
}

pg_close($conn);
?>

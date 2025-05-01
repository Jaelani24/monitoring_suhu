<?php
require_once('koneksi.php'); // Pastikan koneksi database sudah benar

// Query untuk mengambil batas suhu
$query = "SELECT batas_suhu FROM setting_kipas WHERE id = 1"; 
$result = pg_query($conn, $query);

if ($result && pg_num_rows($result) > 0) {
    $row = pg_fetch_assoc($result);
    $batasSuhu = $row['batas_suhu'];
    echo json_encode(['status' => 'success', 'batas_suhu' => $batasSuhu]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Batas suhu tidak ditemukan']);
}

pg_close($conn); // Menutup koneksi
?>

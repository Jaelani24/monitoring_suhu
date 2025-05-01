<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('koneksi.php'); // Pastikan koneksi ke DB sudah benar

// Query untuk mengambil data suhu dan kelembapan
$query = "SELECT suhu, kelembapan FROM logs ORDER BY no asc"; // Ambil 50 data terakhir
$result = pg_query($conn, $query);

if ($result) {
    $logs = [];
    while ($row = pg_fetch_assoc($result)) {
        $logs[] = $row;
    }
    
    // Kembaliin data dalam format JSON
    echo json_encode([
        'status' => 'success',
        'logs' => $logs
    ]);
} else {
    // Jika query gagal
    echo json_encode([
        'status' => 'error',
        'message' => 'Gagal mengambil data'
    ]);
}

pg_close($conn); // Jangan lupa tutup koneksi
?>

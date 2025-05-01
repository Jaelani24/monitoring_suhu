<?php
// Include file konfigurasi database
include('koneksi.php');

// Function untuk mengambil data suhu terbaru
function getSuhuRealTime() {
    global $conn;

    $query = "SELECT no, suhu FROM logs ORDER BY no DESC LIMIT 1"; 
    $result = pg_query($conn, $query);

    if (!$result) {
        return null; // Query gagal
    }

    // Ambil data suhu terakhir
    $row = pg_fetch_assoc($result);
    if ($row) {
        return $row['suhu'];
    } else {
        return null; // Tidak ada data
    }
}

// Pastikan header untuk JSON
header('Content-Type: application/json');

// Mendapatkan suhu real-time
$suhu = getSuhuRealTime();

if ($suhu !== null) {
    echo json_encode(['status' => 'success', 'suhu' => $suhu]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Data suhu tidak ditemukan']);
}

// Menutup koneksi database
pg_close($conn);
?>

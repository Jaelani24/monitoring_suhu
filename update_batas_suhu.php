<?php
require_once('koneksi.php'); // Pastikan koneksi database sudah benar

// Pastikan respons bertipe JSON
header('Content-Type: application/json');

// Cek jika data batas suhu dikirimkan via POST
if (isset($_POST['batas_suhu'])) {
    $batasSuhu = $_POST['batas_suhu'];

    // Update batas suhu dalam database dengan parameterisasi
    $query = "UPDATE setting_kipas SET batas_suhu = $1 WHERE id = 1";
    $result = pg_query_params($conn, $query, array($batasSuhu));

    if ($result) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data']);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap']);
}

// Tutup koneksi database
pg_close($conn);
?>

<?php
	include "koneksi.php";

    // (Tidak perlu buat koneksi lagi karena sudah dari koneksi.php)

    // Cek koneksi
    if (!$conn) {
        die("Database connection failed: " . pg_last_error());
    }

    // Set timezone ke Asia/Jakarta
    date_default_timezone_set('Asia/Jakarta'); 
	$seminggu = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
	$hari = date("w");
	$hari_ini = $seminggu[$hari];
	
    $tgl_sekarang = date("Y-m-d"); // format disesuaikan YYYY-MM-DD untuk PostgreSQL DATE
    $jam_sekarang = date("H:i:s"); // format jam

    if (!empty($_POST['status1']) && !empty($_POST['status2']) && !empty($_POST['pelanggan'])) {
    	$status1 = $_POST['status1'];
		$status2 = $_POST['status2'];
    	$pelanggan = $_POST['pelanggan'];

	    $sql = "INSERT INTO logs (tanggal, hari, waktu, pelanggan, suhu, kelembapan)
	            VALUES ('$tgl_sekarang', '$hari_ini', '$jam_sekarang', '$pelanggan', '$status1', '$status2')";

		$result = pg_query($conn, $sql);

		if ($result) {
		    //echo "OK";
			echo "OK | Suhu: $status1 °C | Kelembapan: $status2 %";
		} else {
		    echo "Error: " . pg_last_error($conn);
		}
	}

    pg_close($conn);
?>

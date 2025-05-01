<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="7">
<title>Monitoring Suhu dan Kelembapan</title>
</head>

<body>
<style>
#c4ytable {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
#c4ytable td, #c4ytable th {
    border: 1px solid #ddd;
    padding: 8px;
}
#c4ytable tr:nth-child(even){background-color: #f2f2f2;}
#c4ytable tr:hover {background-color: #ddd;}
#c4ytable th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #00A8A9;
    color: white;
}
</style>

<div id="cards" class="cards">
    <table id="c4ytable" width="700" height="119" align="center" border="2" bordercolor="#000000">
        <tr>
            <th width="36">NO</th>
            <th width="90">TANGGAL</th>
            <th width="90">HARI</th>
            <th width="75">WAKTU</th>
            <th width="130">PELANGGAN</th>
            <th width="130">SUHU</th>
            <th width="200">KELEMBAPAN</th>
        </tr>
        
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        require_once('koneksi.php');

        $query1 = "SELECT * FROM logs ORDER BY no ASC";		
        $result = pg_query($conn, $query1);

        if ($result) {
            $no = 1;
            while ($data = pg_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td height='80' align='center'>{$no}</td>";
                echo "<td align='center'>{$data['tanggal']}</td>";
                echo "<td align='center'>{$data['hari']}</td>";
                echo "<td align='center'>{$data['waktu']}</td>";
                echo "<td align='center'>{$data['pelanggan']}</td>";
                echo "<td align='center'>{$data['suhu']}</td>";
                echo "<td align='center'>{$data['kelembapan']}</td>";
                echo "</tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='7' align='center'>Data tidak ditemukan</td></tr>";
        }

        pg_close($conn);
        ?>
    </table>
</div>

</body>
</html>

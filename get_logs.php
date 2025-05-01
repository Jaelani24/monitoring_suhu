<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('koneksi.php');

$query1 = "SELECT * FROM logs ORDER BY no DESC LIMIT 8";		
$result = pg_query($conn, $query1);

$response = [
    'logs' => [],
    'latest' => null
];

if ($result) {
    $data = [];
    while ($row = pg_fetch_assoc($result)) {
        $data[] = $row;
    }
    $response['logs'] = $data;
    if (!empty($data)) {
        $response['latest'] = [
            'suhu' => $data[0]['suhu'],
            'kelembapan' => $data[0]['kelembapan']
        ];
    }
    echo json_encode($response);
} else {
    echo json_encode($response);
}

pg_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard Monitoring</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">



</head>
<style>
    /* Style tabel */
    #logTable {
        border-collapse: collapse;
        width: 100%;
        font-size: 14px;
    }

    #logTable thead {
        background-color: #4CAF50; /* Hijau header */
        color: white;
        text-align: center;
    }

    #logTable th, #logTable td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: center;
        vertical-align: middle;
    }

    #logTable tbody tr:hover {
        background-color: #f5f5f5;
    }

    #logTable tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table-responsive {
        overflow-x: auto;
    }
    #statusKipas {
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    margin-top: 10px;
}

</style>


<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-home"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <p class="form-control" style='min-width:200px;border:none;'>Data Monitoring Suhu & Kelembapan</p>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>   
                    <li><a href="widget-basic.html" aria-expanded="false"><i class="icon icon-home"></i><span
                                class="nav-text">Suhu Dan Kelembapan</span></a></li>
                    <li><a href="#" aria-expanded="false" data-toggle="modal" data-target="#updateSuhuModal"><i class="icon icon-home"></i><span
                                class="nav-text">Update Batas Suhu</span></a></li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Suhu </div>
                                    <div id="suhuValue" class="stat-digit">Loading...</div>
                                </div>
                                <div class="progress">
                                    <div id="progressSuhu" class="progress-bar progress-bar-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Kelembapan</div>
                                    <div id="kelembapanValue" class="stat-digit">Loading...</div>
                                </div>
                                <div class="progress">
                                    <div id="progressKelembapan" class="progress-bar progress-bar-primary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Tanggal</div>
                                    <div id="datetime"  class="stat-digit"> <i class="fa fa-calendar"></i>Loading...</div>
                                </div>
                                <div class="stat-text" style='color:transparent'>. 
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Batas Suhu Kipas</div>
                                    <div id="batasSuhu" class="stat-digit">Loading...</div> <!-- Menampilkan Batas Suhu -->
                                </div>
        <div class="stat-content">
            <div class="stat-text">Status Kipas</div>
            <div id="statusKipas" class="stat-digit">OFF</div> <!-- Menampilkan Status Kipas -->
        </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <div class="row">
                    <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Suhu Real Time</h4>
                                </div>
                                <div class="card-body">
                                    <div class="cpu-load-chart">
                                        <div id="cpu-load" class="cpu-load"></div> <!-- ID untuk suhu -->
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Kelembapan Real Time</h4>
                                </div>
                                <div class="card-body">
                                    <div class="cpu-load-chart">
                                        <div id="humidity-load" class="cpu-load"></div> <!-- ID BARU untuk kelembapan -->
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Real Time</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="logTable" class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>TANGGAL</th>
                                                <th>HARI</th>
                                                <th>WAKTU</th>
                                                <th>RUANGAN</th>
                                                <th>SUHU</th>
                                                <th>KELEMBAPAN</th>
                                            </tr>
                                        </thead>
                                        <tbody id="logTableBody">
                                            <!-- Data otomatis akan masuk sini -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by Jaelani24 2025</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!-- Modal untuk Update Batas Suhu -->
<div class="modal fade" id="updateSuhuModal" tabindex="-1" role="dialog" aria-labelledby="updateSuhuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSuhuModalLabel">Update Batas Suhu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateSuhuForm">
                    <div class="form-group">
                        <label for="batasSuhunya">Batas Suhu (°C)</label>
                        <input 
                type="text" 
                class="form-control" 
                id="batasSuhunya" 
                name="batas_suhu"
                placeholder="Masukkan batas suhu"
            >
        </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <!--  flot-chart js -->
    <script src="./vendor/flot/jquery.flot.js"></script>
    <script src="./vendor/flot/jquery.flot.resize.js"></script>

    <script src="./dashboard-js.js"></script>
    <script>
// Tangani pengiriman form untuk update batas suhu
document.getElementById('updateSuhuForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form submit default

    // Ambil nilai batas suhu dari input
    var batasSuhu = document.getElementById('batasSuhunya').value;

    if (batasSuhu === "") {
        alert('Harap masukkan batas suhu yang valid!..');
    } else {
        // Kirim data batas suhu ke server
        fetch('update_batas_suhu.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `batas_suhu=${encodeURIComponent(batasSuhu)}`
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                alert('Batas suhu berhasil diperbarui!');
                //document.getElementById('batasSuhuValue').innerText = `${batasSuhu} °C`;
                $('#updateSuhuModal').modal('hide'); // Tutup modal setelah sukses
            } else {
                alert('Terjadi kesalahan: ' + (data.message || 'Gagal memperbarui batas suhu.'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal menghubungi server.');
        });
    }
});

// Function buat update datetime
function updateDateTime() {
    const now = new Date();
    const formattedDate = now.getFullYear() + '-' + 
        String(now.getMonth() + 1).padStart(2, '0') + '-' + 
        String(now.getDate()).padStart(2, '0') + ' ' +
        String(now.getHours()).padStart(2, '0') + ':' +
        String(now.getMinutes()).padStart(2, '0') + ':' +
        String(now.getSeconds()).padStart(2, '0');
    document.getElementById('datetime').innerHTML = '<i class="fa fa-calendar"></i> ' + formattedDate;
}

// Update setiap 1 detik
setInterval(updateDateTime, 1000);

// Panggil sekali saat halaman pertama kali dibuka
updateDateTime();
function loadLogs() {
    fetch('get_logs.php')
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('logTableBody');
            tbody.innerHTML = '';

            // Update Tabel Data
            data.logs.forEach((item, index) => {
                const row = `
                    <tr>
                        <td align="center">${index + 1}</td>
                        <td align="center">${item.tanggal}</td>
                        <td align="center">${item.hari}</td>
                        <td align="center">${item.waktu}</td>
                        <td align="center">${item.pelanggan}</td>
                        <td align="center">${item.suhu}</td>
                        <td align="center">${item.kelembapan}</td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });

            // Update Suhu dan Kelembapan Real Time
            if (data.latest) {
                const suhuElement = document.getElementById('suhuValue');
                const kelembapanElement = document.getElementById('kelembapanValue');
                const progressSuhu = document.getElementById('progressSuhu');
                const progressKelembapan = document.getElementById('progressKelembapan');

                let suhu = parseFloat(data.latest.suhu) || 0;
                let kelembapan = parseFloat(data.latest.kelembapan) || 0;

                // Update nilai suhu dan kelembapan
                suhuElement.innerHTML = `<i class="fa fa-thermometer-half"></i> ${suhu} °C`;
                kelembapanElement.innerHTML = `<i class="fa fa-tint"></i> ${kelembapan} %`;

                // Update Progress Bar
                progressSuhu.style.width = Math.min(suhu, 100) + '%';
                progressSuhu.setAttribute('aria-valuenow', suhu);

                progressKelembapan.style.width = Math.min(kelembapan, 100) + '%';
                progressKelembapan.setAttribute('aria-valuenow', kelembapan);
            }
        })
        .catch(error => {
            console.error('Error loading logs:', error);
        });
}

// Panggil pertama kali
loadLogs();

// Auto refresh setiap 5 detik
setInterval(loadLogs, 3000);
// Fungsi untuk mengambil batas suhu
function loadBatasSuhu() {
    fetch('get_batas_suhu.php')  // Meminta batas suhu dari backend
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Menampilkan batas suhu pada halaman
                document.getElementById('batasSuhu').innerText = `${data.batas_suhu} °C`;

                // Menambahkan pengecekan suhu untuk mengaktifkan kipas
                checkFanStatus(data.batas_suhu);
            } else {
                console.error('Gagal memuat batas suhu:', data.message);
            }
        })
        .catch(error => {
            console.error('Error fetching batas suhu:', error);
        });
}

// Fungsi untuk memeriksa dan mengubah status kipas
function checkFanStatus(batasSuhu) {
    fetch('get_suhu_real_time.php')  // Ambil data suhu real-time dari server
        .then(response => response.json())
        .then(data => {
            const currentTemperature = parseFloat(data.suhu);  // Ambil suhu terkini

            // Update status kipas
            const statusKipasElement = document.getElementById('statusKipas');

            if (currentTemperature > batasSuhu) {
                // Kipas aktif jika suhu lebih tinggi dari batas
                statusKipasElement.innerText = "ON";
                statusKipasElement.style.color = "green";  // Bisa juga mengubah warna kipas menjadi hijau (ON)
            } else {
                // Kipas mati jika suhu lebih rendah dari batas
                statusKipasElement.innerText = "OFF";
                statusKipasElement.style.color = "red";  // Bisa juga mengubah warna kipas menjadi merah (OFF)
            }
        })
        .catch(error => {
            console.error('Error fetching real-time temperature:', error);
        });
}

// Memanggil fungsi untuk pertama kali saat halaman dimuat
loadBatasSuhu();

// Menambahkan interval agar nilai batas suhu dan status kipas diperbarui setiap 5 detik
setInterval(loadBatasSuhu, 3000);


</script>

</body>

</html>
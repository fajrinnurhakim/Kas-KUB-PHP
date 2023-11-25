<?php include("../config.php");
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login.php");
}
date_default_timezone_set('Asia/Jakarta');
$hari_ini = date('Y-m-d');
$tgl_terakhir = date('Y-m-t', strtotime($hari_ini));
if (isset($_POST['terapkan'])) {

    // ambil data dari formulir
    $filter = $_POST['filter'];
    // $bukti_bayar = $_FILES['bukti_bayar'];

    if ($filter == 1) {
        $sql = "SELECT * FROM kas_umum WHERE MONTH(tanggal) = MONTH(NOW());";
    } else if ($filter == 2) {
        $sql = "SELECT * FROM kas_umum WHERE tanggal >= (tanggal - INTERVAL 1 month) && tanggal <= date(now());";
    } else if ($filter == 3) {
        $sql = "SELECT * FROM kas_umum WHERE year(tanggal) = year(NOW());";
    } else {
        $sql = "SELECT * FROM kas_umum";
    }
} else {
    $sql = "SELECT * FROM kas_umum";
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KUB MERCI | KAS KUB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.png" width="40px" height="40px">
                <img src="../img/textLogo.png" width="100px">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 " aria-current="page" href="admDashbord.php">Dashbord</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 active" aria-current="page" href="#">Kas KUB</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 " href="admNewMember.php">Input Member Baru</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 " href="admNewAdmin.php">Kelola Admin</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 " href="confLogOut.php"><i class="bi bi-box-arrow-left"></i></i>&nbsp LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-9 lebar-xy">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link text-danger" href="admKasKonfirm.php">KONFIRMASI KAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-light bg-danger" href="#">LAPORAN KAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="admLaporanBulanan.php">LAPORAN BULANAN</a>
                </li>
            </ul>
            <h3 style="margin-top: 30px;margin-bottom:20px;"><center><strong>DAFTAR TRANSAKSI YANG SUDAH DI KONFIRMASI</strong></center></h3>
            <div class="container-sm">
                <form action="" method="POST">
                    <label for="filter" class="form-label">Filter Berdasarkan : </label>
                    <select class="form-select" aria-label="Default select example" id="filter" name="filter">
                        <option selected>Tampilkan Seluruh Data</option>
                        <option value="1">Bulan Ini</option>
                        <option value="2">Satu Bulan Terakhir</option>
                        <option value="3">Tahun Ini</option>
                    </select>
                    <button type="submit" class="btn btn-primary" name="terapkan" value="terapkan" style="margin-top: 10px;">Submit</button>
                </form>
            </div>


            <table class="table table-striped" style="margin-top: 50px;">
                <tr class="table-danger" style="text-align: center;">
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Keterangan</th>
                    <th>Jumlah Dana Masuk</th>
                    <th>Jumlah Dana Keluar</th>
                    <th>Action</th>
                </tr>

                <?php
                $query = mysqli_query($db, $sql);
                $no = 1;

                while ($data = mysqli_fetch_array($query)) {
                    echo "<tr align='center'>";

                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $data['tanggal'] . "</td>";
                    echo "<td>" . $data['keterangan'] . "</td>";
                    echo "<td>Rp. " . $data['jumlah_masuk'] . "</td>";
                    echo "<td>Rp. " . $data['jumlah_keluar'] . "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-secondary' href='admKasUmumDetail.php?id=" . $data['id_transaksi'] . "'>LIHAT DETAIL</a>";
                    echo "</td>";

                    echo "</tr>";
                    $no++;
                }
                ?>
            </table>
            <script>
                function Myclick() {
                    document.location.href = 'inputLaporanBulanan.php';
                }
            </script>
            <div class="card text-center">
                <div class="card-header">
                    INPUT LAPORAN BULANAN
                </div>
                <div class="card-body">
                    <h5 class="card-title">KLIK TOMBOL DI BAWAH JIKA ANDA INGIN MEMASUKKAN DATA SALDO BULANAN KE DATABASE</h5>
                    <p class="card-text">INGATLAH BAHWA MELAKUKAN HAL INI HANYA SAAT AKHIR BULAN KETIKA SELURUH PEMASUKAN BULANAN SELESAI</p>
                    <button class="btn btn-primary" <?php if (date('Y-m-d') != $tgl_terakhir){ ?> enable <?php   } ?> onclick="Myclick()">INPUT LAPORAN BULANAN KE DATABASE</a>
                </div>
                <div class="card-footer text-muted">
                    - KUB-MERCI -
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="footer">
        <p>@2022 <a href="" style="text-decoration: none;color: red"> Bendahara KUB MERCI </a> | KKUB MERCI v1.0</p>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
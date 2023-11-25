<?php
include("../config.php");
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login.php");
}
//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM temp_transaksi WHERE id=$id";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
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
                    <a class="nav-link active bg-danger text-light" href="#">KONFIRMASI KAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="admKasUmum.php">LAPORAN KAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="admLaporanBulanan.php">LAPORAN BULANAN</a>
                </li>
            </ul>

            <?php

            ?>
            <div class="container-sm " style="margin-top: 20px;">
                <h4>
                    <center>DETAIL TRANSAKSI</center>
                </h4>
                <form action="inputKasUmum.php" method="POST">
                    <div class="mb-3">
                        <label for="id_transaksi" class="form-label">ID Transaksi</label>
                        <input type="text" class="form-control" id="id_transaksi" value="<?php echo $data['id']; ?>" name="id_transaksi" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="id" class="form-label">ID Member</label>
                        <input type="text" class="form-control" id="id" value="<?php echo $data['id_member']; ?>" name="id" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Member</label>
                        <input type="text" class="form-control" id="nama" value="<?php echo $data['nama']; ?>" name="nama" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                        <input type="date" class="form-control" id="tanggal" value="<?php echo $data['tanggal']; ?>" name="tanggal" readonly>
                    </div>
                    <label for="jumlah_pemasukan" class="form-label">Jumlah Pemasukan</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" aria-label="Jumlah Pemasukan" value="<?php echo $data['jumlah_masuk']; ?>" id="jumlah_pemasukan" name="jumlah_masuk" readonly>
                        <span class="input-group-text">.00</span>
                    </div>
                    <label for="jumlah_pengeluaran" class="form-label">Jumlah Pengeluaran</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" class="form-control" aria-label="Jumlah Pengeluaran" value="<?php echo $data['jumlah_keluar']; ?>" id="jumlah_pengeluaran" name="jumlah_keluar" readonly>
                        <span class="input-group-text">.00</span>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" value="<?php echo $data['keterangan']; ?>" name="keterangan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="keperluan">Keperluan</label>
                        <textarea class="form-control" id="keperluan" style="height: 100px" name="keperluan" readonly><?php echo $data['keperluan']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Transaksi</label>
                        <input type="text" class="form-control" id="status" value="<?php echo $data['setatus']; ?>" name="setatus" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="bukti_bayar">Bukti Transaksi</label><br>
                        <center><img src="<?php echo "../images/" . $data['bukti_bayar']; ?>" class="img-fluid" alt="<?php echo $data['bukti_bayar']; ?>"></center>
                    </div>
                    <center><button style="margin-top: 20px; margin-bottom:20px;" type="submit" class="btn btn-primary" value="confirm" name="confirm">KONFIRMASI TRANSAKSI</button></center>
                </form>
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
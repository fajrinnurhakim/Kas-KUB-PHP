<?php
include("../config.php");
date_default_timezone_set('Asia/Jakarta');
$hari_ini = new DateTime();
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login.php");
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
            <?php
            $sql = "SELECT * FROM kas_umum WHERE MONTH(tanggal) = MONTH(NOW());";
            $query = mysqli_query($db, $sql);
            $jumlah_pemasukan = 0;
            $jumlah_pengeluaran = 0;
            $keuntungan;
            $saldo_sebelumnya;
            $saldo_total;

            while ($data = mysqli_fetch_array($query)) {
                $jumlah_pemasukan += $data['jumlah_masuk'];
                $jumlah_pengeluaran += $data['jumlah_keluar'];
            }
            $keuntungan = $jumlah_pemasukan - $jumlah_pengeluaran;

            $sql = "SELECT * FROM saldo_bulanan ORDER BY id DESC LIMIT 1;";
            $query = mysqli_query($db, $sql);
            $data = mysqli_fetch_assoc($query);
            $saldo_sebelumnya = $data['saldo_total'];
            $saldo_total = $saldo_sebelumnya + $keuntungan;
            ?>
            <h3>
                <center><strong>KONFIRMASI INPUT LAPORAN BULANAN</strong></center>
            </h3>
            <form action="confInputLaporanBulanan.php" method="post">
                <div class="mb-3">
                    <label for="bulan" class="form-label">BULAN</label>
                    <input type="text" class="form-control" id="bulan" name="bulan" value="<?php echo $hari_ini->format('F')  ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="tahun" class="form-label">TAHUN</label>
                    <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $hari_ini->format('Y') ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="jumlah_masuk" class="form-label">Jumlah Pemasukan Bulan Ini</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" aria-label="Masukkan Jumlah" name="jumlah_masuk" value="<?php echo $jumlah_pemasukan  ?>" readonly>
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jumlah_keluar" class="form-label">Jumlah Pengeluaran Bulan Ini</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" aria-label="Masukkan Jumlah" name="jumlah_keluar" value="<?php echo $jumlah_pengeluaran  ?>" readonly>
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="jumlah_keuntungan" class="form-label">Keuntungan Bulan Ini</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" aria-label="Masukkan Jumlah" name="jumlah_keuntungan" value="<?php echo $keuntungan  ?>" readonly>
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="saldo_total" class="form-label">Saldo Akhir Pada Bulan Ini</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" aria-label="Masukkan Jumlah" name="saldo_total" value="<?php echo $saldo_total ?>" readonly>
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" value="submit" name="submit" style="margin-bottom:30px;">Submit</button>
            </form>
        </div>
    </div>

    <!-- <div class="footer">
        <p>@2022 <a href="" style="text-decoration: none;color: red"> Bendahara KUB MERCI </a> | KKUB MERCI v1.0</p>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
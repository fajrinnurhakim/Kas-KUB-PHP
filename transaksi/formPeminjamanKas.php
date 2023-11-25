<?php
include("../config.php");

//ambil id dari query string
$id_member = $_GET['id_member'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM tbl_keanggotaan WHERE id=$id_member";
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
    <title>KUB MERCI | KAS KUB MERCI</title>
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
                        <a class="nav-link fw-bold fs-5" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 active" href="#">Kas KUB</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5" href="../login.php"><i class="bi bi-box-arrow-in-right"></i>&nbsp LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-9 lebar-xy">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link text-danger" href="../kasBayar.php">Pembayaran Kas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active bg-danger text-light" href="#">Peminjaman Kas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="../kasInvest.php">Investasi</a>
                </li>
            </ul>


            <form action="confPeminjaman.php" method="post">
                <div class="mb-3">
                    <label for="id_member" class="form-label">ID Member</label>
                    <input type="text" class="form-control" id="id_member" name="id_member" value="<?php echo $data['id'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Member</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman">
                </div>
                <div class="mb-3">
                    <label for="jumlah_keluar" class="form-label">Jumlah Peminjaman Kas</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" aria-label="Masukkan Jumlah" name="jumlah_keluar">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="keperluan">Keperluan</label>
                    <textarea class="form-control" placeholder="Jelaskan Keperluan Peminjaman Dana" id="keperluan" style="height: 100px" name="keperluan"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit</button>
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
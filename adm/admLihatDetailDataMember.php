<?php
include("../config.php");
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login.php");
}
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM tbl_keanggotaan WHERE id=$id";
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
    <title>KUB MERCI | ADD NEW MEMBER</title>
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
                        <a class="nav-link fw-bold fs-5" aria-current="page" href="admDashbord.php">Dashbord</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 " aria-current="page" href="admKasKonfirm.php">Kas KUB</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 active" href="#">Input Member Baru</a>
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
                    <a class="nav-link text-danger" href="admNewMember.php">TAMBAH MEMBER BARU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active bg-danger text-light " href="admListMember.php">LIHAT DAFTAR MEMBER</a>
                </li>
            </ul>

            <div class="container-new-member">
                <h3 style="margin-top: 20px;">
                    <center><strong>DETAIL DATA MEMBER</strong></center>
                </h3>
                <div class="bagidua">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Member" name="nama" value="<?php echo $data['nama'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="id_member" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id_member" placeholder="Masukkan ID Member " name="id_member" value="<?php echo $data['id'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" placeholder="Masukkan Alamat Member" id="alamat" style="height: 100px" name="alamat" readonly><?php echo $data['alamat'] ?></textarea>
                    </div>
                </div>
                <div class="bagidua2">
                    <div class="mb-3 floating">
                        <label for="nama_usaha" class="form-label">Nama Usaha</label>
                        <input type="text" class="form-control" id="nama_usaha" placeholder="Masukkan Nama Usaha Member" name="nama_usaha" value="<?php echo $data['nama_usaha'] ?> " readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                        <input type="text" class="form-control" id="jenis_usaha" placeholder="Masukkan Jenis Usaha Member" name="jenis_usaha" value="<?php echo $data['jenis_usaha'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP/WA</label>
                        <input type="text" class="form-control" id="no_hp" placeholder="Masukkan Nomor HP/WA " name="no_hp" value="<?php echo $data['no_hp'] ?>" readonly>
                    </div>
                </div>

            </div>
        </div>
        <center>
            <label>FOTO MEMBER</label><br>
            <img src="<?php echo "../images/" . $data['foto_member'] ?>" class="img-fluid" alt="foto_member" style="width: 200px; height:auto;">
        </center>
    </div>

    <!-- <div class="footer">
       <p>@2022 <a href="" style="text-decoration: none;color: red"> Bendahara KUB MERCI </a> | KKUB MERCI v1.0</p>
    </div>  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
include("../config.php");
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login.php");
}
//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM temp_admin WHERE id=$id";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}
$id_member = $data['id'];
$nama_member = $data['nama'];
$password = $data['password'];

$sql = "INSERT INTO tbl_admin (`id`, `nama`, `password`, `status`) VALUE ('$id_member', '$nama_member', '$password', 'admin')";
$query = mysqli_query($db, $sql);

if ($query) {
    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    echo "
            <script>
                alert('ADMIN BARU BERHASIL DI DAFTARKAN');
                document.location.href = 'admNewAdmin.php';
            </script>
            ";
    $sql = "DELETE FROM temp_admin WHERE id = $id_member";
    mysqli_query($db, $sql);
} else {
    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    echo "
            <script>
                alert('ADMIN BARU GAGAL DI DAFTARKAN');
                document.location.href = 'admNewAdmin.php';
            </script>
            ";
}

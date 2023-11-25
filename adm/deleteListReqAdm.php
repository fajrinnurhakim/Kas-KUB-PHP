<?php
include("../config.php");
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login.php");
}
//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "DELETE FROM temp_admin WHERE id=$id";
$query = mysqli_query($db, $sql);

if ($query) {
    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    echo "
            <script>
                alert('BERHASIL MENOLAK PERMINTAAN');
                document.location.href = 'admNewAdmin.php';
            </script>
            ";
} else {
    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    echo "
            <script>
                alert('PENOLAKAN ADMIN GAGAL');
                document.location.href = 'admNewAdmin.php';
            </script>
            ";
}

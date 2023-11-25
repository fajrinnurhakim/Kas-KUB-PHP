<?php
include("../config.php");
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../login.php");
}
// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['confirm'])) {

    // ambil data dari formulir
    $id_transaksi = $_POST['id_transaksi'];

    $sql = "SELECT * FROM kas_umum WHERE id_transaksi = $id_transaksi";
    $query = mysqli_query($db, $sql);
    if (mysqli_fetch_array($query) > 0) {
        echo "
	            <script>
	                alert('TIDAK PERLU DI KONFIRMASI KARENA DATA TRANSAKSI SUDAH DI KONFIRMASI');
	                document.location.href = 'admKasKonfirm.php';
	            </script>
	            ";
    }


    $sql = "SELECT * FROM temp_transaksi WHERE id=$id_transaksi";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);

    $id_member = $data['id_member'];
    $nama = $data['nama'];
    //$tanggal = $data['tanggal'];
    $jumlah_masuk = $data['jumlah_masuk'];
    $jumlah_keluar = $data['jumlah_keluar'];
    $keterangan = $data['keterangan'];
    $keperluan = $data['keperluan'];
    $bukti_transaksi = $data['bukti_bayar'];

    //buat query
    $sql = "INSERT INTO kas_umum (id_transaksi, id_member, nama, jumlah_masuk, jumlah_keluar, keterangan, keperluan, bukti_bayar) VALUE ('$id_transaksi','$id_member', '$nama', '$jumlah_masuk', '$jumlah_keluar', '$keterangan', '$keperluan', '$bukti_transaksi')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        mysqli_query($db, "UPDATE temp_transaksi SET setatus = 'Di Konfirmasi' WHERE id = $id_transaksi");
        echo "
	            <script>
	                alert('DATA PEMBAYARAN BERHASIL DI KONFIRMASI');
                    document.location.href = 'admKasUmum.php';
	            </script>
	            ";
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        echo "
	            <script>
	                alert('DATA TRANSAKSI GAGAL DI KONVIRMASI');
	                document.location.href = 'admKasKonfirm.php';
	            </script>
	            ";
    }
} else {
    die("Akses dilarang...");
}

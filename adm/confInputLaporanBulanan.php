<?php
include("../config.php");
session_start();
if ($_SESSION['status'] != "login") {
	header("location:../login.php");
}

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['submit'])) {

	// ambil data dari formulir
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];
	$jumlah_masuk = $_POST['jumlah_masuk'];
	$jumlah_keluar = $_POST['jumlah_keluar'];
	$keuntungan = $_POST['jumlah_keuntungan'];
	$saldo_total = $_POST['saldo_total'];

	//buat query
	$sql = "INSERT INTO saldo_bulanan (bulan, tahun, jumlah_pemasukan, jumlah_pengeluaran, jumlah_keuntungan, saldo_total) VALUE ('$bulan', '$tahun', '$jumlah_masuk', '$jumlah_keluar', '$keuntungan', '$saldo_total')";
	$query = mysqli_query($db, $sql);

	// apakah query simpan berhasil?
	if ($query) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		echo "
	            <script>
	                alert('DATA SALDO BULANAN BERHASIL DI INPUT');
                    document.location.href = 'admLaporanBulanan.php';
	            </script>
	            ";
	} else {
		// kalau gagal alihkan ke halaman indek.php dengan status=gagal
		echo "
	            <script>
	                alert('DATA SALDO BULANAN GAGAL DI SIMPAN');
	                document.location.href = 'admKasUmum.php';
	            </script>
	            ";
	}
} else {
	die("Akses dilarang...");
}

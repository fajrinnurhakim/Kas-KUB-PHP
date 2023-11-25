<?php
include("../config.php");
session_start();
if ($_SESSION['status'] != "login") {
	header("location:../login.php");
}
// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['submit'])) {

	// ambil data dari formulir
	$id_member = $_POST['id_member'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$nama_usaha = $_POST['nama_usaha'];
	$jenis_usaha = $_POST['jenis_usaha'];
	$no_hp = $_POST['no_hp'];
	// $bukti_bayar = $_FILES['bukti_bayar'];

	$ukuran_file = $_FILES['foto_member']['size'];
	$nama_file = $_FILES['foto_member']['name'];
	$tmp_file = $_FILES['foto_member']['tmp_name'];
	$tipe_file = $_FILES['foto_member']['type'];
	$path = "../images/" . $nama_file;

	if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {

		// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan tindakan :
		// Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
		if ($ukuran_file <= 1000000) {
			// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
			// Proses upload
			if (move_uploaded_file($tmp_file, $path)) {
				// Cek apakah gambar berhasil diupload atau tidak
				// Jika gambar berhasil diupload, Lakukan :  
				// Proses simpan ke Database
				$query = "INSERT INTO tbl_keanggotaan (id, nama, no_hp, alamat, jenis_usaha, nama_usaha, foto_member) VALUE ('$id_member', '$nama', '$no_hp', '$alamat', '$jenis_usaha', '$nama_usaha', '$nama_file')";
				// Eksekusi/ Jalankan query dari variabel $query
				$sql = mysqli_query($db, $query);

				// Cek jika proses simpan ke database sukses atau tidak
				if ($sql) {
					// Jika Sukses, Lakukan :
					echo "
	            	<script>
	                	alert('DATA MEMBER BARU BERHASIL DI INPUT');
						document.location.href = 'admNewMember.php';
	            	</script>
	            	";
				} else {
					// Jika Gagal, Lakukan :
					echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
					echo "<br><a href='admNewMember.php'>Kembali Ke Form</a>";
				}
			} else {
				// Jika gambar gagal diupload, Lakukan ini
				echo "Maaf, Gambar gagal untuk diupload.";
				echo "<br><a href='admNewMember.php'>Kembali Ke Form</a>";
			}
		} else {
			// Jika ukuran file lebih dari 1MB, lakukan :
			echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
			echo "<br><a href='admNewMember.php'>Kembali Ke Form</a>";
		}
	} else {
		// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
		echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
		echo "<br><a href='admNewMember.php'>Kembali Ke Form</a>";
	}
} else {
	die("Akses dilarang...");
}

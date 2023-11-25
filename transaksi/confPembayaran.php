<?php 
	include("../config.php");

	// cek apakah tombol daftar sudah diklik atau blum?
	if(isset($_POST['submit'])){

	    // ambil data dari formulir
        $id_member = $_POST['id_member'];
        $nama = $_POST['nama'];
        $tanggal = $_POST['tanggal_pembayaran'];
        $jumlah_masuk = $_POST['jumlah_masuk'];
        // $bukti_bayar = $_FILES['bukti_bayar'];

        $ukuran_file = $_FILES['bukti_bayar']['size'];
        $nama_file = $_FILES['bukti_bayar']['name'];
        $tmp_file = $_FILES['bukti_bayar']['tmp_name'];
        $tipe_file = $_FILES['bukti_bayar']['type'];
        $path = "../images/".$nama_file;

		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){

			// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan tindakan :
			// Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
			if($ukuran_file <= 1000000){
			  // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
			  // Proses upload
			  if(move_uploaded_file($tmp_file, $path)){
				// Cek apakah gambar berhasil diupload atau tidak
				// Jika gambar berhasil diupload, Lakukan :  
				// Proses simpan ke Database
				$query = "INSERT INTO temp_transaksi (id_member, nama, tanggal, jumlah_masuk, keterangan, bukti_bayar, setatus) VALUE ('$id_member', '$nama', '$tanggal', '$jumlah_masuk', 'Bayar Kas', '$nama_file', 'Menunggu Konfirmasi')";
				// Eksekusi/ Jalankan query dari variabel $query
				$sql = mysqli_query($db, $query);
		  
				  // Cek jika proses simpan ke database sukses atau tidak
				if($sql){
				  // Jika Sukses, Lakukan :
				  echo "
	            	<script>
	                	alert('DATA PEMBAYARAN BERHASIL DI INPUT');
						document.location.href = '../kasBayar.php';
	            	</script>
	            	";
				}else{
				  // Jika Gagal, Lakukan :
				  echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
				  echo "<br><a href='formPembayaranKas.php'>Kembali Ke Form</a>";
				}
			  }else{
				// Jika gambar gagal diupload, Lakukan ini
				echo "Maaf, Gambar gagal untuk diupload.";
				echo "<br><a href='formPembayaranKas.php'>Kembali Ke Form</a>";
			  }
			}else{
			  // Jika ukuran file lebih dari 1MB, lakukan :
			  echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
			  echo "<br><a href='formPembayaranKas.php'>Kembali Ke Form</a>";
			}
		  }else{
			// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
			echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
			echo "<br><a href='formPembayaranKas.php'>Kembali Ke Form</a>";
		  }

	    // buat query
	    // $sql = "INSERT INTO temp_bayarkas (id, nama, tanggal_pembayaran, jumlah_bayar, bukti_bayar) VALUE ('$id_member', '$nama', '$tanggal', '$jumlah_bayar', '$bukti_bayar')";
	    // $query = mysqli_query($db, $sql);

	    // // apakah query simpan berhasil?
	    // if( $query ) {
	    //     // kalau berhasil alihkan ke halaman index.php dengan status=sukses
	    //     echo "
	    //         <script>
	    //             alert('DATA PEMBAYARAN BERHASIL DI INPUT');
	    //         </script>
	    //         ";
	    // } else {
	    //     // kalau gagal alihkan ke halaman indek.php dengan status=gagal
	    //      echo "
	    //         <script>
	    //             alert('DATA BOKING GAGAL DI SIMPAN');
	    //             document.location.href = 'formPembayaranKas.php';
	    //         </script>
	    //         ";
	    // }


	} else {
	    die("Akses dilarang...");
	}

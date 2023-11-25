<?php 
	include("config.php");

	// cek apakah tombol daftar sudah diklik atau blum?
	if(isset($_POST['submit'])){

	    // ambil data dari formulir
        $id_member = $_POST['id_member'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];

	    //buat query
	    $sql = "INSERT INTO temp_admin (`id`, `nama`, `password`, `status`) VALUE ('$id_member', '$nama', '$password', 'Menunggu Konfirmasi')";
	    $query = mysqli_query($db, $sql);

	    // apakah query simpan berhasil?
	    if( $query ) {
	        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
	        echo "
	            <script>
	                alert('PENDAFTARAN ADMIN BERHASIL, SILAHKAN HUBUNGI PIHAK ADMIN UNTUK KONFIRMASI PERMOHONAN ANDA');
                    document.location.href = 'login.php';
	            </script>
	            ";
	    } else {
	        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
	         echo "
	            <script>
	                alert('PENDAFTARAN ADMIN GAGAL');
	                document.location.href = 'register.php';
	            </script>
	            ";
	    }


	} else {
	    die("Akses dilarang...");
	}

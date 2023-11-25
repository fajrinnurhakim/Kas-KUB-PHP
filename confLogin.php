<?php
session_start();
if (isset($_POST['login'])) {
	$server = "localhost";
	$user = "root";
	$password = "";
	$nama_database = "kub_merci";

	$db = mysqli_connect($server, $user, $password, $nama_database);

	if (!$db) {
		die("GAGAL MENGHUBUNGKAN KE DATABASE: " . mysqli_connect_error());
	}
	// ambil data dari formulir
	$id_anggota = $_POST['id_anggota'];
	$password = $_POST['password'];

	// buat query
	$sql = "SELECT * FROM tbl_admin WHERE id = '$id_anggota'";
	$query = mysqli_query($db, $sql);
	$data = mysqli_fetch_assoc($query);

	// apakah query simpan berhasil?
	if ($query) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		if ($data['password'] == $password) {
			if ($data['status'] == 'admin') {
				$_SESSION['status'] = "login";
				echo "
		    			<script>
							alert('ANDA BERHASIL LOGIN SEBAGAI ADMIN');
							document.location.href = 'adm/admDashbord.php';
						</script>
		    			";
			} else {
				echo "
						<script>
		    			alert('ANDA TIDAK TERDAFTAR SEBAGAI ADMIN, SILAHKAN REQUEST UNTUK JADI ADMIN');
							document.location.href = 'login.php';
						</script>
		    			";
			}
		} else {
			echo "
		    			<script>
							alert('ID ATAU PASSWORD SALAH SILAHKAN LOGIN ULANG');
							document.location.href = 'login.php';
						</script>
		    		";
		}
	} else {
		// kalau gagal alihkan ke halaman indek.php dengan status=gagal
		echo "
		    			<script>
							alert('USERNAME / PASSWORD SALAH SILAHKAN LOGIN ULANG');
							document.location.href = 'login.php';
						</script>
		    		";
	}
}

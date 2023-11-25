<?php 
	if(isset($_POST['cari'])){
		$server = "localhost";
		$user = "root";
		$password = "";
		$nama_database = "kub_merci";

		$db = mysqli_connect ($server, $user, $password, $nama_database);

		if( !$db ){
			    die("GAGAL MENGHUBUNGKAN KE DATABASE: " . mysqli_connect_error());
		}
		   // ambil data dari formulir
		    $id_member = $_POST['id_member'];

		    // buat query
		    $sql = "SELECT * FROM tbl_keanggotaan WHERE id = '$id_member'";
		    $query = mysqli_query($db, $sql);
		    $data = mysqli_fetch_assoc($query);
		    if (mysqli_num_rows($query) < 1) {
                die("data tidak ditemukan...");
            }
		    // apakah query simpan berhasil?
		    if( $query ) {
		        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
		    	echo "
                <script>
                    alert('DATA DITEMUKAN');
                    document.location.href = 'transaksi/confirmDataInvest.php?id_member=".$id_member."';
                </script>";
		    } else {
		        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
		        echo "
		    			<script>
							alert('DATA TIDAK DI TEMUKAN');
							document.location.href = 'kasInvest.php';
						</script>
		    		";
		    }
    }
?>
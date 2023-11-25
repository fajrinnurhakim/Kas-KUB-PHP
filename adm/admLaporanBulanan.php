<?php include("../config.php"); 
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../login.php");
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KUB MERCI | KAS KUB</title>
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
                        <a class="nav-link fw-bold fs-5 " aria-current="page" href="admDashbord.php">Dashbord</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 active" aria-current="page" href="#">Kas KUB</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 " href="admNewMember.php">Input Member Baru</a>
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
                    <a class="nav-link text-danger" href="admKasKonfirm.php">KONFIRMASI KAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="admKasUmum.php">LAPORAN KAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active bg-danger text-light" href="#">LAPORAN BULANAN</a>
                </li>
            </ul>

            <table class="table table-striped" style="margin-top: 50px;">
                <tr class="table-danger" style="text-align: center;">
                    <th>NO</th>
                    <th>BULAN</th>
                    <th>TAHUN</th>
                    <th>JUMLAH PEMASUKAN</th>
                    <th>JUMLAH PENGELUARAN</th>
                    <th>SALDO</th>
                    <th>SALDO TOTAL</th>
                </tr>

                <?php
                $sql = "SELECT * FROM saldo_bulanan where id>1";
                $query = mysqli_query($db, $sql);
                $no = 1;

                while ($data = mysqli_fetch_array($query)) {
                    echo "<tr align='center'>";

                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $data['bulan'] . "</td>";
                    echo "<td>" . $data['tahun'] . "</td>";
                    echo "<td>Rp. " . $data['jumlah_pemasukan'] . "</td>";
                    echo "<td>Rp. " . $data['jumlah_pengeluaran'] . "</td>";
                    echo "<td>" . $data['jumlah_keuntungan'] . "</td>";
                    echo "<td>" . $data['saldo_total'] . "</td>";

                    echo "</tr>";
                    $no++;
                }
                ?>
            </table>
        </div>
    </div>

    <!-- <div class="footer">
        <p>@2022 <a href="" style="text-decoration: none;color: red"> Bendahara KUB MERCI </a> | KKUB MERCI v1.0</p>
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
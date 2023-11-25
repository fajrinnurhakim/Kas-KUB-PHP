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
    <title>KUB MERCI | KELOLA ADMIN</title>
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
                        <a class="nav-link fw-bold fs-5" aria-current="page" href="admKasKonfirm.php">Kas KUB</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 " href="admNewMember.php">Input Member Baru</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 active" href="#">Kelola Admin</a>
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
            <h3 style="margin-top: 20px;"><center><strong>LIST MEMBER YANG MENDAFTAR JADI ADMIN</strong></center></h3>
            <table class="table table-striped" style="margin-top: 20px;">
                <tr class="table-danger" style="text-align: center;">
                    <th>NO</th>
                    <th>ID MEMBER</th>
                    <th>NAMA</th>
                    <th>ACTION</th>
                </tr>

                <?php
                $sql = "SELECT * FROM temp_admin";
                $query = mysqli_query($db, $sql);
                $no = 1;

                while ($data = mysqli_fetch_array($query)) {
                    echo "<tr align='center'>";

                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $data['id'] . "</td>";
                    echo "<td>" . $data['nama'] . "</td>";

                    echo "<td>";
                    echo "<a class='btn btn-success' href='confNewAdmin.php?id=" . $data['id'] . "'>TERIMA</a> &nbsp &nbsp";
                    echo "<a class='btn btn-danger' href='deleteListReqAdm.php?id=" . $data['id'] . "'>TOLAK</a>";
                    echo "</td>";

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
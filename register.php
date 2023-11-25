<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KUB MERCI | LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" width="40px" height="40px">
                <img src="img/textLogo.png" width="100px">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 " href="kasBayar.php">Kas KUB</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link fw-bold fs-5 active" href="#"><i class="bi bi-box-arrow-in-right"></i>&nbsp LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-9 lebar-xy">
        <div class="row justify-content-center">
                <div class="col-md-5">

                    <main class="form-signin w-100 m-auto">
                        <center>
                            <h1 class="h3 fw-normal" style="margin-top: 140px">Silahkan Cari ID Anda Kemudian Request Admin</h1>
                        </center>
                        <form action="confRegist.php" method="post">

                            <div class="form-floating">
                                <input type="number" name="id_member" class="form-control" id="id_member" placeholder="12345..." autofocus required>
                                <label for="id_member">ID Keanggotaan</label>
                            </div>

                            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit" value="submit">CARI ID</button>
                        </form>
                        <small class="d-block text-center mt-3">Anda Sebagai Admin? <a href="login.php">Silahkan Login</a></small>
                    </main>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>@2022 <a href="" style="text-decoration: none;color: red"> Bendahara KUB MERCI </a> | KKUB MERCI v1.0</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
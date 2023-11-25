<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "kub_merci";

$db = mysqli_connect ($server, $user, $password, $nama_database);

if( !$db ){
    die("GAGAL MENGHUBUNGKAN KE DATABASE: " . mysqli_connect_error());
}

?>
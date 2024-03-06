<?php 


$host = "localhost";
$user = "root";
$pass = "";
$db = "restoran";


$koneksi = mysqli_connect($host,$user,$pass,$db);

if ($koneksi) {
$pesan = "berhasil konek";
}
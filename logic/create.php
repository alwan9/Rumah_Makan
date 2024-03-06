<?php

// logika input
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $des = $_POST['deskripsi'];
    $img = $_POST['image'];

    if ($nama && $harga && $stok && $des && $img) {
        //    echo     "adaaaaaaaaaaaaa";
        // $pesan = "ada";
        $sql1 = "INSERT INTO makanan VALUES ('', '$nama','$harga','$stok','$des','$img', '')";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            //    echo     "adaaaaaaaaaaaaa";
            $pesan = "ada";
            header("Location:http://localhost/restoran/index.php");
        }
    }
}

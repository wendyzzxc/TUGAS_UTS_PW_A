<?php

include '../db.php';
session_start();
$nama = $_SESSION['profil'];
$name = $_POST['name'];
$email = $_POST['email'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
$namaFile = $_FILES['foto']['name'];

if ($namaFile != "") {
    $namaSementara = $_FILES['foto']['tmp_name'];

    $dirUpload = "../foto/";

    $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);


    $query = mysqli_query($con, "UPDATE users set name='$name' , email='$email' , no_telp='$no_telp', alamat='$alamat', foto='$namaFile' WHERE name='$nama'");
    $_SESSION['profil']  = $name;
    if ($query) {
        header('location:../page/profil.php?pesan=update');
    }
} else {
    $data = mysqli_query($con, "select * from users where name='$nama'");
    $p = mysqli_fetch_array($data);
    $foto = $p['foto'];
    $query = mysqli_query($con, "UPDATE users set name='$name' , email='$email' , no_telp='$no_telp', alamat='$alamat', foto='$foto' WHERE name='$nama'");
    $_SESSION['profil']  = $name;
    if ($query) {
        header('location:../page/profil.php?pesan=update');
    }
}

<?php

include '../db.php';

$id = $_POST['id'];
$nama_menu = $_POST['nama_menu'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$status = $_POST['status'];
$namaFile = $_FILES['foto']['name'];

if ($namaFile != "") {
    $namaSementara = $_FILES['foto']['tmp_name'];

    $dirUpload = "../foto/";

    $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);


    $query = mysqli_query($con, "UPDATE menu set nama_menu='$nama_menu' , kategori='$kategori' , harga='$harga', status='$status', foto='$namaFile' WHERE id='$id'");

    if ($query) {
        header('location:../page/index.php?pesan=update');
    }
} else {
    $data = mysqli_query($con, "select * from menu where id='$id'");
    $p = mysqli_fetch_array($data);
    $foto = $p['foto'];

    $query = mysqli_query($con, "UPDATE menu set nama_menu='$nama_menu', kategori='$kategori' , harga='$harga' , status='$status', foto='$foto' WHERE id='$id'");

    if ($query) {
        header('location:../page/index.php?pesan=update');
    }
}

<?php

include '../db.php';

$nama_menu = $_POST['nama_menu'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$status = $_POST['status'];

$namaFile = $_FILES['foto']['name'];
$namaSementara = $_FILES['foto']['tmp_name'];
$dirUpload = "../foto/";

$fileFoto = (object) @$_FILES['foto'];
$listPesanError = [];

if (!@$fileFoto->name) {
    array_push($listPesanError, "File Foto Tidak Boleh Kosong.");
}

if ($listPesanError) {
    //validasi upload file
    foreach ($listPesanError as $pesanError) {
        echo "
        <script>
        alert('{$pesanError}')
        </script>
        ";
    }
    echo "<a href='../page/index.php'>Kembali</a>";

    # hentikan program
    die();
} else {
    //ketika form sudah terisi semua
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

    mysqli_query($con, "INSERT INTO menu(nama_menu,kategori,harga,status,foto) VALUES( '$nama_menu', '$kategori' , '$harga'  , '$status' , '$namaFile')");

    header("location:../page/index.php?pesan=insert");
}

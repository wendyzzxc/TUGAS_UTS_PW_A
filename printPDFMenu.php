<?php

require_once __DIR__ . '/vendor/autoload.php';
include './db.php';
$query = mysqli_query($con, "select * from menu");



$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Print Menu</title>
</head>
<body>
<div class="container">
<h2 class="text-center mb-5">RESTORAN...</h2>

<div class="card mt-5">
    <div class="card-header text-center font-weight-bold">
        <h2>MENU</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">#</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>';

$i = 1;
while ($d = mysqli_fetch_array($query)) {
    $html .= '<tr>
    <td>' . $i++ . '</td>
    <td scope="row"><img class="foto" src="./foto/' . $d['foto'] . '" width="80px" height="80px" ></td>
    <td>' . $d['nama_menu'] . '</td>
    <td>' . $d['kategori'] . ' </td>
    <td>Rp. ' . $d['harga'] . ',00</td>
    <td>' . $d['status'] . '</td>
</tr>';
}

$html .= '</tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();

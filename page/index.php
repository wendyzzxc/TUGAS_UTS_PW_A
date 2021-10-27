<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data Menu</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Style CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Arial';
            font-weight: 500;
        }

        .container {
            margin-top: 50px;
        }

        .foto {
            width: 150px;
            height: 150px;
            border-radius: 5%;
        }
    </style>

    <!-- Link JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-5">RESTORAN FOODIES</h2>
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "insert") {
                echo "
                    <script>
                    alert('Menu Berhasil di Tambah')
                    </script>
                  ";
            } elseif ($_GET['pesan'] == "update") {
                echo "
                    <script>
                    alert('Menu Berhasil di Update')
                    </script>
                  ";
            } elseif ($_GET['pesan'] == "delete") {
                echo "
                    <script>
                    alert('Menu Berhasil di Hapus')
                    </script>
                  ";
            }
        }
        ?>

        <div class="card mt-5">
            <div class="card-header text-center font-weight-bold">
                <h2>MENU</h2>
            </div>
            <div class="card-body">
                <a href="../page/createMenu.php" class="btn btn-primary">Tambah Menu</a>
                <a href="../process/logoutProcess.php" class="btn btn-danger">Logout</a>
                <a href="../printPDFMenu.php" class="btn btn-info" style="color: white;" target="_blank">Print PDF</a>
                <br />
                <br />
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Status</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include '../db.php';
                        $query = mysqli_query($con, "select * from menu");
                        if (mysqli_num_rows($query) == 0) {
                            echo '<tr> <td colspan="6"> Tidak ada data </td> </tr>';
                        } else {
                            while ($d = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <th scope="row"><img class="foto" src="<?php echo "../foto/" . $d['foto']; ?>"></th>
                                    <td><?php echo $d['nama_menu'] ?></td>
                                    <td><?php echo $d['kategori'] ?></td>
                                    <td>Rp. <?php echo $d['harga'] ?>,00</td>
                                    <td><?php echo $d['status'] ?></td>
                                    <td>
                                        <a href="../page/updateMenu.php?id=<?php echo $d['id']; ?>" class="btn btn-warning text-white mb-2">Edit</a>
                                        <a href="../process/deleteMenu.php?id=<?php echo $d['id']; ?>" class="btn btn-danger mb-2">Hapus</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
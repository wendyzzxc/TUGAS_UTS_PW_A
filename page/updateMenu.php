<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Menu</title>

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

        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>

    <!-- Link JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <?php
        include '../db.php';
        $id = $_GET['id'];
        $data = mysqli_query($con, "select * from menu where id='$id'");
        $d = mysqli_fetch_array($data);
        ?>

        <div class="card">
            <div class="card-header text-center font-weight-bold">
                <h2>EDIT DATA MENU</h2>
            </div>
            <div class="card-body">
                <form method="post" action="../process/proses_updateMenu.php" enctype="multipart/form-data">


                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                        <label for="nama_menu">Nama Menu :</label><br><br>
                        <input type="text" name="nama_menu" class="form-control" id="nama_menu" value="<?php echo $d['nama_menu'] ?>" placeholder="Nama Menu" required>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori :</label><br><br>
                        <select class="form-control" name="kategori" id="exampleFormControlSelect1">
                            <?php
                            if ($d['kategori'] == 'Makanan') {
                                echo "<option value='Makanan'>Makanan</option>";
                                echo "<option value='Minuman'>Minuman</option>";
                            } else {
                                echo "<option value='Minuman'>Minuman</option>";
                                echo "<option value='Makanan'>Makanan</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="harga">Harga :</label><br><br>
                        <input type="number" name="harga" class="form-control" id="harga" value="<?php echo $d['harga'] ?>" placeholder="Rp.-" required>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="status">Status :</label><br>
                        <?php
                        if ($d['status'] == 'Tersedia') {
                            echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='Tersedia' value='Tersedia' name='status' class='custom-control-input' checked>
                                        <label class='custom-control-label' for='Tersedia'>Tersedia</label>
                                    </div>
                                    ";
                            echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='TidakTersedia' value='TidakTersedia' name='status' class='custom-control-input'>
                                        <label class='custom-control-label' for='TidakTersedia'>Tidak Tersedia</label>
                                    </div>
                                    ";
                        } elseif ($d['status'] == 'TidakTersedia') {
                            echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='Tersedia' value='Tersedia' name='status' class='custom-control-input'>
                                        <label class='custom-control-label' for='Tersedia'>Tersedia</label>
                                    </div>
                                    ";
                            echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='TidakTersedia' value='TidakTersedia' name='status' class='custom-control-input' checked>
                                        <label class='custom-control-label' for='TidakTersedia'>Tidak Tersedia</label>
                                    </div>
                                    ";
                        }
                        ?>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="image">Upload Foto</label><br>
                        <img src="<?php echo "../foto/" . $d['foto']; ?>" id="preview" class="img-fluid" width="300px" height="300px">
                        <input type="file" name="foto" class="file" accept="image/*">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="<?php echo $d['foto'] ?>" id="file">
                            <div class="input-group-append">
                                <button type="button" class="browse btn btn-primary">Browse</button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                    <a href="../page/index.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
        <?php
        //    }
        ?>
    </div>

    <script>
        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</body>

</html>
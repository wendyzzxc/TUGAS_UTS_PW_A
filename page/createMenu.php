<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Menu</title>

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
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                <h2>TAMBAH DATA MENU</h2>
            </div>
            <div class="card-body">
                <form method="post" action="../process/process_createMenu.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_menu">Nama Menu :</label><br><br>
                        <input type="text" name="nama_menu" class="form-control" id="nama_menu" placeholder="Nama Menu" required>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Kategori :</label><br><br>
                        <select class="form-control" name="kategori" id="exampleFormControlSelect1">
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                        </select>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="harga">Harga :</label><br><br>
                        <input type="text" name="harga" class="form-control" id="harga" placeholder="Rp.-" required>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="status">Status :</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="Tersedia" value="Tersedia" name="status" class="custom-control-input">
                            <label class="custom-control-label" for="Tersedia">Tersedia</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="TidakTersedia" value="TidakTersedia" name="status" class="custom-control-input">
                            <label class="custom-control-label" for="TidakTersedia">Tidak Tersedia</label>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="image">Upload Foto</label><br>
                        <img src="https://via.placeholder.com/300" id="preview" class="img-fluid" width="300px" height="300px">
                        <input type="file" name="foto" class="file" accept="image/*">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="Upload Foto" id="file">
                            <div class="input-group-append">
                                <button type="button" class="browse btn btn-primary">Browse</button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                    <a href="./index.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
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
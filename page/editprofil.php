<?php
include '../db.php';
session_start();
$nama = $_SESSION['profil'];
$data = mysqli_query($con, "select * from users where name='$nama'");
$d = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Profil</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center font-weight-bold" style="background-color: aqua;">
                <h2>PROFILE</h2>
            </div>
            <div class="card-body">
                <form method="post" action="../process/updateProfilProcess.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nama User :</label><br><br>
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $d['name'] ?>" placeholder="Nama User" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email">Email :</label><br><br>
                        <input type="text" name="email" class="form-control" id="email" value="<?php echo $d['email'] ?>" placeholder="Example@gmail.com" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon :</label><br><br>
                        <input type="text" name="no_telp" class="form-control" id="no_telp" value="<?php echo $d['no_telp'] ?>" placeholder="08xxxxxxxxxx" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="alamat">Alamat :</label><br><br>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $d['alamat'] ?>" placeholder="Jalan ....." required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="image">Upload Foto</label><br>
                        <img src="<?php echo "../foto/" . $d['foto']; ?>" id="preview" class="img-fluid" width="300px" height="300px">
                        <input type="file" name="foto" class="file" accept="image/*" style="visibility: hidden;">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="<?php echo $d['foto'] ?>" id="file">
                            <div class="input-group-append">
                                <button type="button" class="browse btn btn-primary">Browse</button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                    <a href="../page/profil.php" class="btn btn-secondary">Cancel</a>
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
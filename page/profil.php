<?php
session_start();
if (!$_SESSION['isLogin']) {
    echo
    '<script>
         alert("Login Dulu dong"); window.location = "../page/login.php"
    </script>';
} else {
    include '../db.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/profil-style.css">
    <link rel="stylesheet" href="../css/navbar_style.css">
    <title>Profil Akun</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:red; height: 68px;">
            <div class="container-fluid">
                <a href="../index.php" class="navbar-brand"><img src="https://foodiesomaha.com/wp-content/uploads/2019/10/foodies-omaha-logo-768x323.png" alt="logo" style="width: 100px; height: 42px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../page/register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../page/login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../page/menu.php">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../page/reservation.php">Reservation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../page/profil.php">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../page/about.php">About Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <?php
    $nama = $_SESSION['profil'];
    $query = mysqli_query($con, "SELECT * FROM users WHERE name='$nama'");
    $data = mysqli_fetch_assoc($query);
    ?>

    <section class="banner">
        <div class="container">
            <h2 class="text-center" style="font-size: 40px;">Profil Akun Anda</h2>
            <div class="container-grid">
                <img src="<?php echo "../foto/" . $data['foto']; ?>" id="preview" class="img_profil" width="280px" height="250px">
                <div class="text-container">
                    <h3><i class="fas fa-user-alt"></i>NAMA : <?php echo $data['name'] ?></h3><br>
                    <p><i class="fas fa-envelope"></i>EMAIL : <?php echo  $data['email'] ?></p>
                    <p><i class="fas fa-phone-alt"></i>NOMOR TELEPON : <?php echo  $data['no_telp'] ?></p>
                    <p><i class="fas fa-map-marked-alt"></i>ALAMAT : <?php echo  $data['alamat'] ?></p>
                </div>
                <div class="content-menu" style="padding-left: 20%;">
                    <a href="../process/logoutProcess.php" style="font-weight:600;"><button class="btn btn-danger"><i class="fas fa-sign-out-alt"></i>Logout</button></a>
                    <a href="../page/editprofil.php" style="font-weight:600;"><button class="btn btn-info"><i class="fa fa-edit"></i>Edit</button></a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
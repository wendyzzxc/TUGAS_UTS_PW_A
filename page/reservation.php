<?php
session_start();
if (!$_SESSION['isLogin']) {
    echo
    '<script>
         alert("Login Dulu dong"); window.location = "../page/login.php"
    </script>';
} else {
    include('../db.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/reservation-style.css">
    <link rel="stylesheet" href="../css/navbar_style.css">
    <title>Reservation</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:red; height: 68px;">
            <div class="container-fluid">
                <a href="../index.php" class="navbar-brand"><img src="https://foodiesomaha.com/wp-content/uploads/2019/10/foodies-omaha-logo-768x323.png" alt="logo" style="width: 100px;"></a>
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
    <section class="banner">
        <h2 class="text-center" id="res-title">BOOK YOUR TABLE NOW</h2>
        <div class="card-container">
            <h2 class="text-center">Reservation Form</h2>
            <form class="reservation-form" action="#" method="post">
                <div class="card-content">
                    <h3 class="form-subtitle text-center">Data Pemesan</h3>
                    <div class="row">
                        <label for="inputFirst">First Name</label>
                        <input type="text" class="form-control" id="inputFirst" placeholder="Your First Name" required>
                    </div>
                    <div class="row">
                        <label for="inputLast">Last Name</label>
                        <input type="text" class="form-control" id="inputLast" placeholder="Your Last Name" required>
                    </div>
                    <div class="row">
                        <label for="inputTelp">Nomor Telepon</label>
                        <input type="text" class="form-control" id="inputTelp" placeholder="08XX-XXXX-XXXX" required pattern="[0][8][0-9]{10,11}">
                    </div>
                </div>
                <div class="card-content">
                    <h3 class="form-subtitle text-center">Detail Reservasi</h3>
                    <div class="row">
                        <label for="inputTanggal">Tanggal Reservasi</label>
                        <input type="date" class="form-control" id="inputTanggal">
                    </div>
                    <div class="row">
                        <label for="inputWaktu">Waktu Reservasi</label>
                        <input type="time" class="form-control" id="inputWaktu">
                    </div>
                    <div class="row">
                        <label for="inputJumlah">Jumlah Orang</label>
                        <input type="number" class="form-control" id="inputJumlah" min="1">
                    </div>
                    <button type="submit" class="btn btn-outline-secondary" onclick="alert('Reservation Successfully')">Submit</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Js Library -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- JS Script -->
    <script src="../js/script.js"></script>
</body>

</html>
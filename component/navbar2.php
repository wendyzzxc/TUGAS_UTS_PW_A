<?php
session_start();
include('../db.php');
echo '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Home</title>
    <link rel="stylesheet" href="../css/navbar_style.css">
</head>

<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:red">
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
';

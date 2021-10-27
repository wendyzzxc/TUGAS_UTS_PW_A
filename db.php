<?php
$host = "sql111.epizy.com";
$users = "epiz_30150781";
$pass = "wfOSuOafP6VCxSM";
$name = "epiz_30150781_restoran";

$con = mysqli_connect($host, $users, $pass, $name);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL : " . mysqli_connect_error();
}

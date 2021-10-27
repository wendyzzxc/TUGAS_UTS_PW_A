<?php

include '../db.php';

$id = $_GET['id'];

mysqli_query($con, "DELETE FROM menu WHERE id='$id'");

header("location:../page/index.php?pesan=delete");

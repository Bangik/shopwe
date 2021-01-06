<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "shopwe";

$koneksi = mysqli_connect($server, $username, $password, $database) or die("koneksi ke db gagal");

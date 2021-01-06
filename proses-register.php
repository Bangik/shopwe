<?php
include_once("config/koneksi.php");
include_once("config/helper.php");

$level = "customer";
$status = "on";
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$password = md5($_POST['password']);
$password2 = md5($_POST['password2']);

unset($_POST['password']);
$data_form = http_build_query($_POST);

$query = mysqli_query($koneksi, "SELECT email FROM user where email='$email'");

if (empty($nama_lengkap) or empty($email) or empty($telp) or empty($alamat) or empty($password)) {
  header("Location: ".BASE_URL."index.php?page=register&notif=require&".$data_form);
}elseif ($password != $password2) {
  header("Location: ".BASE_URL."index.php?page=register&notif=pass&".$data_form);
}elseif (mysqli_num_rows($query) == 1) {
  header("Location: ".BASE_URL."index.php?page=register&notif=email&".$data_form);
}else {
  $query = mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status) VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$telp', '$password', '$status')");
  if ($query) {
    header("Location: ".BASE_URL."index.php?page=register");
  }
}

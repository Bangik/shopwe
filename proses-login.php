<?php
include_once("config/koneksi.php");
include_once("config/helper.php");

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on'");
if (mysqli_num_rows($query) == 0) {
  header("Location: ".BASE_URL."index.php?page=login&notif=require");
}else {
  $row = mysqli_fetch_assoc($query);

  session_start();

  $_SESSION['id'] = $row['user_id'];
  $_SESSION['name'] = $row['nama'];
  $_SESSION['level'] = $row['level'];

  if (isset($_SESSION['proses_pesanan'])) {
    header("Location: ".BASE_URL."index.php?page=data_pemesanan");
  }else {
    header("Location: ".BASE_URL."index.php?page=profile&module=pesanan&action=list");
  }
}

?>

<?php
include("../../config/koneksi.php");
include("../../config/helper.php");

session_start();

$pesanan_id = $_GET['pesanan_id'];
$btn = $_POST['button'];

if ($btn == "Konfirmasi") {
  $user_id = $_SESSION['id'];
  $nomor_rekening = $_POST['nomor_rekening'];
  $nama_akun = $_POST['nama_akun'];
  $tanggal = $_POST['tanggal_transfer'];

  $query_pembayaran = mysqli_query($koneksi, "INSERT INTO konfirmasi_pembayaran (pesanan_id, nomor_rekening, nama_account, tanggal_transfer) VALUES ('$pesanan_id', '$nomor_rekening', '$nama_akun', '$tanggal')");

  if ($query_pembayaran) {
    mysqli_query($koneksi, "UPDATE pesanan SET status='1' WHERE pesanan_id='$pesanan_id'");
  }
  header("Location:".BASE_URL."index.php?page=profile&module=pesanan&action=list");
}
?>

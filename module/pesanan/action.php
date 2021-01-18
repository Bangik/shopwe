<?php
include("../../config/koneksi.php");
include("../../config/helper.php");
admin_only("pesanan", $level);
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
}elseif ($btn == "Edit Status") {
  $status = $_POST['status'];

  mysqli_query($koneksi, "UPDATE pesanan SET status='$status' WHERE pesanan_id='$pesanan_id'");
  if ($status == 2) {
    $query = mysqli_query($koneksi, "SELECT * FROM pesanan_detail WHERE pesanan_id='$pesanan_id'");
    while ($row = mysqli_fetch_assoc($query)) {
      $barang_id = $row['barang_id'];
      $quantity = $row['quantity'];
      mysqli_query($koneksi, "UPDATE barang SET stok =stok-$quantity WHERE barang_id = '$barang_id'");
    }
  }
}
header("Location:".BASE_URL."index.php?page=profile&module=pesanan&action=list");
?>

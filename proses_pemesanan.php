<?php
  include_once("config/koneksi.php");
  include_once("config/helper.php");

  session_start();

  $nama_penerima = $_POST['nama_penerima'];
  $nomor_telp = $_POST['nomor_telp'];
  $alamat = $_POST['alamat'];
  $kota = $_POST['kota'];

  $user_id = $_SESSION['id'];
  $time_now = date("Y-m-d H:i:s");

  $query = mysqli_query($koneksi, "INSERT INTO pesanan (nama_penerima, user_id, nomor_telepon, kota_id, alamat, tanggal_pemesanan, status) VALUES ('$nama_penerima', '$user_id', '$nomor_telp', '$kota', '$alamat', '$time_now', '0')");

  if ($query) {
    $last_pesanan_id = mysqli_insert_id($koneksi);

    $keranjang = $_SESSION['keranjang'];

    foreach ($keranjang as $key => $value) {
      $barang_id = $key;
      $quantity = $value['quantity'];
      $harga = $value['harga'];

      mysqli_query($koneksi, "INSERT INTO pesanan_detail(pesanan_id, barang_id, quantity, harga) VALUES ('$last_pesanan_id', '$barang_id', '$quantity', '$harga')");

      unset($_SESSION['keranjang']);

      header("Location: ".BASE_URL."index.php?page=profile&module=pesanan&action=detail&pesanan_id=$la$last_pesanan_id");
    }
  }
?>

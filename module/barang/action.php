<?php
include_once("../../config/helper.php");
include_once("../../config/koneksi.php");
admin_only("barang", $level);

$kategori_id = $_POST['kategori_id'];
$nama_barang = $_POST['nama_barang'];
$spesifikasi = $_POST['spesifikasi'];
$stok = $_POST['stok'];
$status = $_POST['status'];
$harga = $_POST['harga'];
$gambar = "";

if (!empty($_FILES['file']['name'])) {
  $nama_file = $_FILES['file']['name'];
  move_uploaded_file($_FILES['file']['tmp_name'], "../../asset/img/barang/".$nama_file);
  $gambar = ", gambar='$nama_file'";
}

if ($_POST['btn-submit-form-barang'] == "Tambah") {
  $query_tambah = mysqli_query($koneksi, "INSERT INTO barang (kategori_id, nama_barang, spesifikasi, gambar, harga, stok, status) VALUES ('$kategori_id', '$nama_barang', '$spesifikasi', '$nama_file', '$harga', '$stok', '$status')");
}elseif ($_POST['btn-submit-form-barang'] == "Edit") {
  $idd = $_GET['barang-id'];
  $query_edit = mysqli_query($koneksi, "UPDATE barang SET kategori_id='$kategori_id', nama_barang='$nama_barang', spesifikasi='$spesifikasi', harga='$harga', Stok='$stok', status='$status' $gambar where barang_id='$idd'");
}
header("Location:".BASE_URL."index.php?page=profile&module=barang&action=list");
?>

<?php
include_once("../../config/helper.php");
include_once("../../config/koneksi.php");

$kategori = $_POST['kategori'];
$status = $_POST['status'];

if ($_POST['btn-submit-login'] == "Tambah") {
  mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES ('$kategori', '$status')");
}elseif ($_POST['btn-submit-login'] == "Edit") {
  $idd = $_GET['kategori-id'];
  mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori', status='$status' where kategori_id='$idd'");
}
header("Location:".BASE_URL."index.php?page=profile&module=kategori&action=list");
?>

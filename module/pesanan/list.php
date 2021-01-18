<?php
$pagination = isset($_GET['pagination']) ? $_GET['pagination']:1;
$data_per_halaman = 3;
$start = ($pagination-1) * $data_per_halaman;
  if ($level == "superadmin") {  
    $query_pesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id = user.user_id ORDER BY pesanan.tanggal_pemesanan DESC LIMIT $start, $data_per_halaman");
  }
  else {
    $query_pesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id = user.user_id WHERE pesanan.user_id='$id' ORDER BY pesanan.tanggal_pemesanan DESC LIMIT $start, $data_per_halaman");
  }
  if (mysqli_num_rows($query_pesanan) == 0) {
    echo "<h3>Saat ini belum ada pesanan</h3>";
  }else {
    echo "
    <table class='tabel-list'>
      <tr class='baris-title'>
        <th class='kiri'>Nomor Pesanan</th>
        <th class='kiri'>Status</th>
        <th class='kiri'>Nama</th>
        <th class='kiri'>Aksi</th>
      </tr>";
      $admin_button = "";
    while ($row = mysqli_fetch_assoc($query_pesanan)) {
      if ($level == "superadmin") {
        $admin_button = "<a href='".BASE_URL."index.php?page=profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]' class='tombol-action'>Update Pesanan</a>";
      }
      $status = $row['status'];
      echo "
      <tr>
        <td class='kiri'>$row[pesanan_id]</td>
        <td class='kiri'>$array_status_pesanan[$status]</td>
        <td class='kiri'>$row[nama]</td>
        <td class='kiri'>
          <a href='".BASE_URL."index.php?page=profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]' class='tombol-action'>Detail Pesanan</a>
          $admin_button
        </td>
      </tr>";
    }
    echo "</table>";
    if ($level == "superadmin") {
      $query = "SELECT * FROM pesanan";
    }else {
      $query = "SELECT * FROM pesanan WHERE user_id='$id'";
    }
    paginations($query, $data_per_halaman, $pagination, "index.php?page=profile&module=pesanan&action=list");
  }
?>

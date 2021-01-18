<?php
  $query_pesanan = mysqli_query($koneksi, "SELECT * FROM pesanan JOIN user ON pesanan.user_id = user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");

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
    while ($row = mysqli_fetch_assoc($query_pesanan)) {
      echo "
      <tr>
        <td class='kiri'>$row[pesanan_id]</td>
        <td class='kiri'>$row[status]</td>
        <td class='kiri'>$row[nama]</td>
        <td class='kiri'>
          <a href='".BASE_URL."index.php?page=profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]' class='tombol-action'>Detail Pesanan</a>
        </td>
      </tr>";
    }
    echo "</table>";  
  }
?>

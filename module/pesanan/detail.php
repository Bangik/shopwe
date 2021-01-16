<?php
  $pesanan_id = $_GET['pesanan_id'];

  $query = mysqli_query($koneksi, "SELECT pesanan.pesanan_id, pesanan.nama_penerima, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pemesanan, user.nama, kota.kota, kota.tarif FROM pesanan JOIN user ON pesanan.user_id = user.user_id JOIN kota ON kota.kota_id=pesanan.kota_id WHERE pesanan.pesanan_id='$pesanan_id' ");

  $row = mysqli_fetch_assoc($query);

?>

<div id="frame-faktur">
  <h3> <center> Detail Pesanan </center> </h3>
  <hr/>
  <table>
    <tr>
      <td>Nomor Faktur</td>
      <td>:</td>
      <td><?php echo $row['pesanan_id']; ?></td>
    </tr>
    <tr>
      <td>Nama Pemesan</td>
      <td>:</td>
      <td><?php echo $row['nama_penerima']; ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><?php echo $row['alamat']; ?></td>
    </tr>
    <tr>
      <td>Nomor Telepon</td>
      <td>:</td>
      <td><?php echo $row['nomor_telepon']; ?></td>
    </tr>
    <tr>
      <td>Tanggal Pemesanan</td>
      <td>:</td>
      <td><?php echo $row['tanggal_pemesanan']; ?></td>
    </tr>
  </table>
</div>

<table class="tabel-list">
  <tr class="baris-title">
    <th>No</th>
    <th>Nama Barang</th>
    <th>Qty</th>
    <th class="kanan">Harga Satuan</th>
    <th class="kanan">Total</th>
  </tr>
  <?php
    $query_detail = mysqli_query($koneksi, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");

    $no = 1;
    $sub_total = 0;
    while ($row_detail = mysqli_fetch_assoc($query_detail)) {
      $total = $row_detail['harga'] * $row_detail['quantity'];
      $sub_total = $sub_total + $total;

      echo "<tr>
        <td class='no'>$no</td>
        <td class='kiri'>$row_detail[nama_barang]</td>
        <td class='tengah'>$row_detail[quantity]</td>
        <td class='kanan'> ".rupiah($row_detail['harga'])."</td>
        <td class='kanan'> ".rupiah($total)."</td>
      </tr>";
      $no++;
    }
    $sub_total = $sub_total + $row['tarif'];
  ?>
  <tr>
    <td class="kanan" colspan="4">Biaya Pengiriman</td>
    <td class="kanan"><?php echo rupiah($row['tarif']); ?></td>
  </tr>
  <tr>
    <td class="kanan" colspan="4">Sub Total</td>
    <td class="kanan"><b><?php echo rupiah($sub_total); ?></b></td>
  </tr>
</table>

<div id="form-keterangan-pembayaran">
  <p>Silahkan lakukan pembayaran ke Bank BCA <br>
  Nomor Rekening : 000-000-000 (an Bangik). <br>
  Setelah melakukan pembayaran, silahkan konfirmasi pembayaran
  <a href="<?php echo BASE_URL; ?>index.php?page=profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=<?php echo $pesanan_id; ?>">Disini</a>
  </p>
</div>

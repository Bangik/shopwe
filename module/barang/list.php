<div class="frame-tambah">
  <a class="btn-action" href="<?php echo BASE_URL."index.php?page=profile&module=barang&action=form";?>">+ Tambah Barang</a>
</div>

<?php
  $query_barang = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori on barang.kategori_id = kategori.kategori_id ORDER by nama_barang asc");
  if (mysqli_num_rows($query_barang) == 0) {
    echo "<h3>Maaf, Data tidak ditemukan</h3>";
  }else {
?>
  <table class="tabel-list">
    <tr class="baris-title">
      <th class="kolom-nomor">No</th>
      <th class="kiri">Barang tes</th>
      <th class="kiri">Kategori</th>
      <th class="kiri">Harga</th>
      <th class="tengah">Status</th>
      <th class="tengah">Aksi</th>
    </tr>
    <?php
    $no = 1;
    while($row = mysqli_fetch_assoc($query_barang)){
    ?>
    <tr>
      <td class="kolom-nomor"><?php echo $no++; ?></td>
      <td class="kiri"><?php echo $row['nama_barang']; ?></td>
      <td class="kiri"><?php echo $row['kategori']; ?></td>
      <td class="kiri"><?php echo rupiah($row['harga']); ?></td>
      <td class="tengah"><?php echo $row['status']; ?></td>
      <td class="tengah">
        <a class="btn-action" href="<?php echo BASE_URL."index.php?page=profile&module=barang&action=form&barang-id=$row[barang_id]";?>">Edit</a>
      </td>
    </tr>
    <?php
    }
    ?>
  </table>
<?php
  }
?>

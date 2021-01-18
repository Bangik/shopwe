<div class="frame-tambah">
  <a class="btn-action" href="<?php echo BASE_URL."index.php?page=profile&module=kategori&action=form";?>">+ Tambah Kategori</a>
</div>

<?php
  $pagination = isset($_GET['pagination']) ? $_GET['pagination']:1;
  $data_per_halaman = 3;
  $start = ($pagination-1) * $data_per_halaman;
  $query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori LIMIT $start, $data_per_halaman");
  if (mysqli_num_rows($query_kategori) == 0) {
    echo "<h3>Maaf, Data tidak ditemukan</h3>";
  }else {
?>
  <table class="tabel-list">
    <tr class="baris-title">
      <th class="kolom-nomor">No</th>
      <th class="kiri">Kategori</th>
      <th class="tengah">Status</th>
      <th class="tengah">Aksi</th>
    </tr>
    <?php
    $no = 1 + $start;
    while($row = mysqli_fetch_assoc($query_kategori)){
    ?>
    <tr>
      <td class="kolom-nomor"><?php echo $no++; ?></td>
      <td class="kiri"><?php echo $row['kategori']; ?></td>
      <td class="tengah"><?php echo $row['status']; ?></td>
      <td class="tengah">
        <a class="btn-action" href="<?php echo BASE_URL."index.php?page=profile&module=kategori&action=form&kategori-id=$row[kategori_id]";?>">Edit</a>
      </td>
    </tr>
    <?php
    }
    ?>
  </table>
<?php
    $query = "SELECT * FROM kategori";
    paginations($query, $data_per_halaman, $pagination, "index.php?page=profile&module=kategori&action=list");
  }
?>

<div class="frame-tambah">
  <div id="left">
    <form action="<?php echo BASE_URL."index.php"; ?>" method="get">
      <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
      <input type="hidden" name="module" value="<?php echo $_GET['module']; ?>">
      <input type="hidden" name="action" value="<?php echo $_GET['action']; ?>">
      <input type="text" name="search">
      <input type="submit" value="Search">
    </form>
  </div>
  <div id="right">
    <a class="btn-action" href="<?php echo BASE_URL."index.php?page=profile&module=barang&action=form";?>">+ Tambah Barang</a>
  </div>
</div>

<?php
  $search = isset($_GET['search']) ? $_GET['search']:false;
  $pagination = isset($_GET['pagination']) ? $_GET['pagination']:1;
  $data_per_halaman = 3;
  $start = ($pagination-1) * $data_per_halaman;

  $where = "";
  $search_url = "";
  if ($search) {
    $search_url = "&search=$search";
    $where = "WHERE barang.nama_barang LIKE '%$search%'";
  }

  $query_barang = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori on barang.kategori_id = kategori.kategori_id $where ORDER by nama_barang asc LIMIT $start, $data_per_halaman");
  if (mysqli_num_rows($query_barang) == 0) {
    echo "<h3>Maaf, Data tidak ditemukan</h3>";
  }else {
?>
  <table class="tabel-list">
    <tr class="baris-title">
      <th class="kolom-nomor">No</th>
      <th class="kiri">Barang</th>
      <th class="kiri">Kategori</th>
      <th class="kiri">Harga</th>
      <th class="tengah">Status</th>
      <th class="tengah">Aksi</th>
    </tr>
    <?php
    $no = 1+ $start;
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
  $query = "SELECT * FROM barang $where";
  paginations($query, $data_per_halaman, $pagination, "index.php?page=profile&module=barang&action=list$search_url");
  }
?>

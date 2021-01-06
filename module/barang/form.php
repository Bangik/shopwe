<?php
  $barang_id = isset($_GET['barang-id'])? $_GET['barang-id']:false;

  $nama_barang = "";
  $kategori_id = "";
  $spesifikasi = "";
  $gambar = "";
  $stok = "";
  $status = "";
  $harga = "";
  $stringket = "";
  $button = "Tambah";

  if ($barang_id) {
    $query_kategori_ambil = mysqli_query($koneksi, "SELECT * FROM barang where barang_id='$barang_id'");
    $row = mysqli_fetch_assoc($query_kategori_ambil);
    $nama_barang = $row['nama_barang'];
    $kategori_id = $row['kategori_id'];
    $spesifikasi = $row['spesifikasi'];
    $gambar = "<img src='".BASE_URL."asset/img/barang/".$row['gambar']."' alt='gambar' style='width:200px;vertical-align:middle;'>";
    $stok = $row['stok'];
    $status = $row['status'];
    $harga = $row['harga'];
    $stringket = "(Klik pilih gambar jika ingin mengganti gambar disamping)";
    $button = "Edit";
  }
?>
<form class="" action="<?php echo BASE_URL."module/barang/action.php?barang-id=$barang_id"; ?>" method="post" enctype="multipart/form-data">
  <div class="element-form">
    <label class="element-label">Kategori</label>
    <span class="element-span">
      <select class="select-kategori" name="kategori_id">
        <?php
          $query_ambil_idk = mysqli_query($koneksi, "SELECT kategori, kategori_id FROM kategori WHERE status='on' ORDER BY kategori ASC");
          while ($rows = mysqli_fetch_assoc($query_ambil_idk)) {
            if ($kategori_id == $rows['kategori_id']) {
              echo "<option value='$rows[kategori_id]' selected>$rows[kategori]</option>";
            }else {
              echo "<option value='$rows[kategori_id]'>$rows[kategori]</option>";
            }
          }
        ?>
      </select>
    </span>
  </div>
  <div class="element-form">
    <label class="element-label">Nama Barang</label>
    <span class="element-span">
      <input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>">
    </span>
  </div>
  <div class="element-form">
    <label class="element-label">spesifikasi</label>
    <span class="element-span">
      <textarea type="text" name="spesifikasi" id="editor"><?php echo $spesifikasi; ?></textarea>
    </span>
  </div>
  <div class="element-form">
    <label class="element-label">Stok</label>
    <span class="element-span">
      <input type="text" name="stok" value="<?php echo $stok; ?>">
    </span>
  </div>
  <div class="element-form">
    <label class="element-label">Harga</label>
    <span class="element-span">
      <input type="text" name="harga" value="<?php echo $harga; ?>">
    </span>
  </div>
  <div class="element-form">
    <label class="element-label">Gambar Produk <?php echo $stringket; ?></label>
    <span class="element-span">
      <input type="file" name="file">
      <?php echo $gambar; ?>
    </span>
  </div>
  <div class="element-form">
    <label class="element-label">Status</label>
    <span class="element-span">
      <input type="radio" name="status" value="on" <?php if ($status == "on"){echo "checked";} ?> >On</input>
      <input type="radio" name="status" value="off" <?php if ($status == "off"){echo "checked";} ?>>Off</input>
    </span>
  </div>
  <div class="element-form">
    <span>
      <input type="submit" name="btn-submit-form-barang" class="btn-register" value="<?php echo $button; ?>"></input>
    </span>
  </div>
</form>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

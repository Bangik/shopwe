<?php
  $kategori_id = isset($_GET['kategori-id'])? $_GET['kategori-id']:false;

  $kategori = "";
  $status = "";
  $button = "Tambah";

  if ($kategori_id) {
    $query_kategori_ambil = mysqli_query($koneksi, "SELECT * FROM kategori where kategori_id='$kategori_id'");
    $row = mysqli_fetch_assoc($query_kategori_ambil);
    $kategori = $row['kategori'];
    $status = $row['status'];
    $button = "Edit";
  }
?>
<form class="" action="<?php echo BASE_URL."module/kategori/action.php?kategori-id=$kategori_id"; ?>" method="post">
  <div class="element-form">
    <label class="element-label">Kategori</label>
    <span class="element-span"> <input type="text" name="kategori" value="<?php echo $kategori; ?>"> </span>
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
      <input type="submit" name="btn-submit-login" class="btn-register" value="<?php echo $button; ?>"></input>
    </span>
  </div>
</form>

<?php
  $pesanan_id = $_GET['pesanan_id'];

  $query = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE pesanan_id='$pesanan_id'");
  $row = mysqli_fetch_assoc($query);
  $status = $row['status'];
?>

<form  action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="post">
  <div class="element-form">
    <label class="element-label">Pesanan ID (Faktur ID)</label>
    <span class="element-span"><input type="text" name="kota" value="<?php echo $pesanan_id; ?>" disabled /></span>
  </div>
  <div class="element-form">
    <label class="element-label">Status</label>
    <span class="element-span">
      <select name="status">
        <?php
          foreach ($array_status_pesanan as $key => $value) {
            if ($status == $key) {
              echo "<option value='$key' selected>$value</option>";
            }else {
              echo "<option value='$key'>$value</option>";
            }
          }
        ?>
      </select>
    </span>
  </div>
  <div class="element-form">
    <span><input type="submit" name="button" value="Edit Status" class="tombol-action" /></span>
  </div>
</form>

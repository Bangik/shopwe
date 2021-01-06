<?php
  $banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";

  $banner = "";
  $link = "";
  $gambar = "";
  $keterangan_gambar = "";
  $status = "";

  $button = "Add";
  if($banner_id != ""){
    $button = "Update";

    $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id='$banner_id'");
    $row=mysqli_fetch_array($queryBanner);

		$banner = $row["banner"];
		$link = $row["link"];
		$gambar = "<img src='". BASE_URL."asset/slide/$row[gambar]' style='width: 200px;vertical-align: middle;' />";
		$keterangan_gambar = "(klik 'Pilih Gambar' hanya jika tidak ingin mengganti gambar)";
		$status = $row["status"];
  }
?>

<form action="<?php echo BASE_URL."module/banner/action.php?banner_id=$banner_id"?>" method="post" enctype="multipart/form-data">

	<div class="element-form">
		<label class="element-label">Banner</label>
		<span class="element-span"><input type="text" name="banner" value="<?php echo $banner; ?>" /></span>
	</div>

	<div class="element-form">
		<label class="element-label">Link</label>
		<span class="element-span"><input type="text" name="link" value="<?php echo $link; ?>" /></span>
	</div>

	<div class="element-form">
		<label class="element-label">Gambar <?php echo $keterangan_gambar; ?></label>
		<span class="element-span"><input type="file" name="file" /><?php echo $gambar; ?></span>
	</div>

	<div class="element-form">
		<label class="element-label">Status</label>
		<span class="element-span">
			<input type="radio" value="on" name="status" <?php if($status == "on"){ echo "checked"; } ?> /> On
			<input type="radio" value="off" name="status" <?php if($status == "off"){ echo "checked"; } ?> /> Off
		</span>
	</div>

	<div class="element-form">
		<span><input type="submit" name="button" value="<?php echo $button; ?>" class="btn-register" /></span>
	</div>
</form>

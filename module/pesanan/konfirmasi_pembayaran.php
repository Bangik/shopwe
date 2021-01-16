<?php
  $pesanan_id = $_GET['pesanan_id'];
?>
<table class="tabel-list">
  <form action="<?php echo BASE_URL; ?>module/pesanan/action.php?pesanan_id=<?php echo $pesanan_id; ?>" method="post">
    <div class="element-form">
  		<label class="element-label">Nomor Rekening</label>
  		<span class="element-span"><input type="text" name="nomor_rekening"></span>
  	</div>
    <div class="element-form">
  		<label class="element-label">Nama Akun</label>
  		<span class="element-span"><input type="text" name="nama_akun"></span>
  	</div>
    <div class="element-form">
  		<label class="element-label">Tanggal Transfer (format: yyyy-mm-dd)</label>
  		<span class="element-span"><input type="text" name="tanggal_transfer"></span>
  	</div>
    <div class="element-form">
  		<span class="element-span"><input type="submit" value="Konfirmasi" name="button"></span>
  	</div>
  </form>
</table>

<?php
  define('BASE_URL', 'http://localhost/shop/');

  $array_status_pesanan[0] = "Menunggu Pembayaran";
  $array_status_pesanan[1] = "Pembayaran Sedang di Valdasi";
  $array_status_pesanan[2] = "Lunas";
  $array_status_pesanan[3] = "Pembayaran di Tolak";

  function rupiah($nilai = 0){
    $string = "Rp. " . number_format($nilai);
    return $string;
  }
  function kategori($kategori_id = false){
		global $koneksi;

		$string = "<div id='menu-kategori'>";

			$string .= "<ul>";

				$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");

				while($row=mysqli_fetch_assoc($query)){
          $kategori_nama = strtolower($row['kategori']);
					if($kategori_id == $row['kategori_id']){
						$string .= "<li><a href='".BASE_URL."$row[kategori_id]/$kategori_nama.html' class='active'>$row[kategori]</a></li>";
					}else{
						$string .= "<li><a href='".BASE_URL."$row[kategori_id]/$kategori_nama.html'>$row[kategori]</a></li>";
					}
				}

			$string .= "</ul>";

		$string .= "</div>";

		return $string;
  }
function admin_only($module, $level){
  if ($level != "superadmin") {
    $admin_pages = array("kategori", "barang", "kota", "user", "banner", "KATEGORI", "BARANG", "KOTA", "USER", "BANNER");
    if (in_array($module, $admin_pages)) {
      header("Location: ".BASE_URL);
    }
  }
}

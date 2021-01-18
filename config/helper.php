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
function paginations($query, $data_per_halaman, $pagination, $url){
  global $koneksi;
  $query_hitung_kategori = mysqli_query($koneksi, $query);
  $total_data = mysqli_num_rows($query_hitung_kategori);
  $total_halaman = ceil($total_data / $data_per_halaman);

  $batas_posisi_no = 6;
  $batas_jumlah_hal = 10;
  $start_pagination = 1;
  $batas_akhir_page = $total_halaman;

  echo "<ul class='pagination'>";
  if ($pagination > 1) {
    $prev = $pagination - 1;
    echo "<li><a href='".BASE_URL."$url&pagination=$prev'><< Prev</a></li>";
  }
  if ($total_halaman >= $batas_jumlah_hal) {
    if ($pagination > $batas_posisi_no) {
      $start_pagination = $pagination - ($batas_posisi_no - 1);
    }
    $batas_akhir_page = ($start_pagination - 1 ) + $batas_jumlah_hal;
    if ($batas_akhir_page > $total_halaman) {
      $batas_akhir_page = $total_halaman;
    }
  }
  for ($i=$start_pagination; $i <= $batas_akhir_page; $i++) {
    if ($pagination == $i) {
      echo "<li><a href='".BASE_URL."$url&pagination=$i' class='active'>$i</a></li>";
    }else {
      echo "<li><a href='".BASE_URL."$url&pagination=$i'>$i</a></li>";
    }
  }
  if ($pagination < $total_halaman) {
    $next = $pagination + 1;
    echo "<li><a href='".BASE_URL."$url&pagination=$next'>Next >></a></li>";
  }
  echo "</ul>";
}

<div class="frame-tambah">
	<a class="btn-action" href="<?php echo BASE_URL."index.php?page=profile&module=kota&action=form"; ?>">+ Tambah Kota</a>
</div>

<?php
	$pagination = isset($_GET['pagination']) ? $_GET['pagination']:1;
	$data_per_halaman = 3;
	$start = ($pagination-1) * $data_per_halaman;
	$queryKota = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY kota ASC LIMIT $start, $data_per_halaman");

	if(mysqli_num_rows($queryKota) == 0){
		echo "<h3>Saat ini belum ada nama kota yang didalam database.</h3>";
	}
	else{
		echo "<table class='tabel-list'>";

			echo "<tr class='baris-title'>
					<th class='kolom-nomor'>No</th>
					<th class='kiri'>Kota</th>
					<th class='kiri'>Tarif</th>
					<th class='tengah'>Status</th>
					<th class='tengah'>Action</th>
				 </tr>";

			$no = 1+ $start;
			while($rowKota=mysqli_fetch_assoc($queryKota)){
				echo "<tr>
						<td class='kolom-nomor'>$no</td>
						<td>$rowKota[kota]</td>
						<td>".rupiah($rowKota['tarif'])."</td>
						<td class='tengah'>$rowKota[status]</td>
						<td class='tengah'>
							<a class='btn-action' href='".BASE_URL."index.php?page=profile&module=kota&action=form&kota_id=$rowKota[kota_id]"."'>Edit</a>
						</td>
					 </tr>";

				$no++;
			}

		echo "</table>";
		$query = "SELECT * FROM kota";
	  paginations($query, $data_per_halaman, $pagination, "index.php?page=profile&module=kota&action=list");
	}
?>

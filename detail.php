<div id="kiri">
  <div id="menu-kategori">
    <ul>
      <?php
        $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
        while ($row = mysqli_fetch_assoc($query)) {
          if ($kategori_id == $row['kategori_id']) {
          ?>
            <li> <a href="<?php BASE_URL; ?>index.php?kategori_id=<?php echo $row['kategori_id']; ?>" class="active"><?php echo $row['kategori']; ?></a> </li>
          <?php }else{ ?>
            <li> <a href="<?php BASE_URL; ?>index.php?kategori_id=<?php echo $row['kategori_id']; ?>"><?php echo $row['kategori']; ?></a> </li>
            <?php
          }
        }
      ?>
    </ul>
  </div>
</div>
<div id="kanan">
  <?php
    $barang_id = $_GET['barang_id'];
    $query2 = mysqli_query($koneksi,"SELECT * FROM barang WHERE barang_id='$barang_id' and status='on'");

    $row = mysqli_fetch_assoc($query2);
    echo "
    <div id='detail-barang'>
      <h2>$row[nama_barang]</h2>
      <div id='frame-gambar'>
        <img src='".BASE_URL."asset/img/barang/$row[gambar]'>
      </div>
      <div id='frame-harga'>
        <span>".rupiah($row['harga'])."</span>
        <a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'>+ add to cart</a>
      </div>
      <div id='keterangan'>
        <b>Keterangan</b> $row[spesifikasi]
      </div>
    </div>
    ";
  ?>
</div>

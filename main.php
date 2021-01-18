<div id="kiri">
<?php echo kategori($kategori_id); ?>
</div>
<div id="kanan">
  <div id="slides">
    <?php
      $query_banner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' order by banner_id desc limit 3");
      while ($row3 = mysqli_fetch_assoc($query_banner)) {
    ?>
      <a href="<?php echo BASE_URL . $row3['link']; ?>">
        <img src="<?php echo BASE_URL; ?>asset/slide/<?php echo $row3['gambar']; ?>" alt="">
      </a>
    <?php } ?>
  </div>
  <div id="frame-barang">
    <ul>
      <?php
        if ($kategori_id) {
          $kategori_id = "AND barang.kategori_id = '$kategori_id'";
        }
        $query2 = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id = kategori.kategori_id WHERE barang.status='on' $kategori_id order by rand() desc limit 9");
        $no = 1;

        while ($row2 = mysqli_fetch_assoc($query2)) {
          $kategori_id2 = strtolower($row2['kategori']);
          $barang = strtolower($row2['nama_barang']);
          $barang = str_replace(" ", "-", $barang);
          $style = false;
          if ($no==3) {
            $style = "style='margin-right:0px;'";
            $no = 0;
          }
      ?>
      <li <?php echo $style; ?>>
        <p class="price"><?php echo rupiah($row2['harga']); ?></p>
        <a href="<?php echo BASE_URL . "$row2[barang_id]/$kategori_id2/$barang.html"?>">
          <img src="<?php echo BASE_URL; ?>asset/img/barang/<?php echo $row2['gambar']; ?>" alt="Gambar">
        </a>
        <div class="keterangan-gambar">
          <p> <a href="<?php echo BASE_URL . "$row2[barang_id]/$kategori_id2/$barang.html"?>"><?php echo $row2['nama_barang'] ?></a> </p>
          <span>Stok : <?php echo $row2['stok']; ?></span>
        </div>
        <div class="button-add-cart">
          <a href="<?php echo BASE_URL; ?>tambah_keranjang.php?barang_id=<?php echo $row2['barang_id']; ?>">+ add to cart</a>
        </div>
      </li>
      <?php
      $no++;
        }
      ?>
    </ul>
  </div>
</div>

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
  <div id="frame-barang">
    <ul>
      <?php

        if ($kategori_id) {
          $query2 = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' and kategori_id='$kategori_id' order by rand() desc limit 9");
        }else {
          $query2 = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' order by rand() desc limit 9");
        }
        $no = 1;

        while ($row2 = mysqli_fetch_assoc($query2)) {
          $style = false;
          if ($no==3) {
            $style = "style='margin-right:0px;'";
            $no = 0;
          }
      ?>
      <li <?php echo $style; ?>>
        <p class="price"><?php echo rupiah($row2['harga']); ?></p>
        <a href="<?php echo BASE_URL; ?>index.php?page=detail&barang_id=<?php echo $row2['barang_id']; ?>">
          <img src="<?php echo BASE_URL; ?>asset/img/barang/<?php echo $row2['gambar']; ?>" alt="Gambar">
        </a>
        <div class="keterangan-gambar">
          <p> <a href="<?php echo BASE_URL; ?>index.php?page=detail&barang_id=<?php echo $row2['barang_id']; ?>"><?php echo $row2['nama_barang'] ?></a> </p>
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

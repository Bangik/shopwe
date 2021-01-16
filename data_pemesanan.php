<?php
  if ($id == false) {
    $_SESSION["proses_pesanan"] = true;
    header("Location: ".BASE_URL."index.php?page=login");
    exit();
  }
?>
<div id="frame-data-pengiriman">
  <h3 class="label-data-pengiriman">Alamat Pengiriman Barang</h3>

  <div id="frame-form-pengiriman">
    <form action="<?php echo BASE_URL; ?>proses_pemesanan.php" method="post">
      <div class="element-form">
        <label class="element-label">Nama Penerima</label>
        <span class="element-span"> <input type="text" name="nama_penerima"> </span>
      </div>
      <div class="element-form">
        <label class="element-label">Nomor Telp</label>
        <span class="element-span"> <input type="text" name="nomor_telp"> </span>
      </div>
      <div class="element-form">
        <label class="element-label">Alamat Pengiriman</label>
        <span class="element-span">
          <textarea name="alamat"></textarea>
        </span>
      </div>
      <div class="element-form">
        <label class="element-label">Kota</label>
        <span class="element-span">
          <select name="kota">
          <?php
            $query = mysqli_query($koneksi, "SELECT * FROM kota");
            while($row = mysqli_fetch_assoc($query)){
              echo "<option value='$row[kota_id]'>$row[kota] (".rupiah($row['tarif']).")</option>";
            }
          ?>
          </select>
        </span>
      </div>
      <div class="element-form">
        <span class="element-span"> <input type="submit" value="submit"> </span>
      </div>
    </form>
  </div>
</div>
<div id="frame-data-detail">
  <h3 class="label-data-pengiriman">Detail Order</h3>
  <div id="frame-detail-order">
    <table class="tabel-list">
      <tr>
        <th class="kiri">Nama Barang</th>
        <th class="tengah">Qty</th>
        <th class="kanan">Total</th>
      </tr>
      <?php
        $sub_total = 0;
        foreach ($keranjang as $key => $value) {
          $barang_id = $key;

          $nama_barang = $value['nama_barang'];
          $qty = $value['quantity'];
          $harga = $value['harga'];

          $total = $qty * $harga;
          $sub_total = $sub_total + $total;

          echo "<tr>
            <td class='kiri'>$nama_barang</td>
            <td class='tengah'>$qty</td>
            <td class='kanan'>".rupiah($total)."</td>
          </tr>";
        }
        echo "<tr>
          <td colspan='2' class='kanan'> <b>Sub Total</b> </td>
          <td class='kanan'> <b>".rupiah($sub_total)."</b> </td>
        </tr>";
      ?>
    </table>
  </div>
</div>

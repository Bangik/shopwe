<?php
  if ($total_barang == 0) {
    echo "<h3>Saat ini belum ada data di keranjang</h3>";
  }else {
    $no = 1;
    echo "
    <table class='tabel-list'>
      <tr class='baris-title'>
        <th class='tengah'>No</th>
        <th class='kiri'>Gambar</th>
        <th class='tengah'>Nama</th>
        <th class='tengah'>Qty</th>
        <th class='kanan'>Harga Satuan</th>
        <th class='kanan'>Total</th>
      </tr>
    ";
    $sub_total = 0;
    foreach ($keranjang as $key => $value) {
      $barang_id = $key;

      $nama_barang = $value{"nama_barang"};
      $quantity = $value{"quantity"};
      $gambar = $value{"gambar"};
      $harga = $value{"harga"};
      $total = $quantity * $harga;
      $sub_total = $sub_total + $total;

      echo "
      <tr>
        <td class='tengah'>$no</td>
        <td class='kiri'> <img src='".BASE_URL."asset/img/barang/$gambar' height='100px'> </td>
        <td class='kiri'>$nama_barang</td>
        <td class='tengah'> <input type='text' name='$barang_id' value='$quantity' class='update-quantity'> </td>
        <td class='kanan'>".rupiah($harga)."</td>
        <td class='kanan hapus_item'>".rupiah($total)."<a href='".BASE_URL."hapus-item.php?barang_id=$barang_id'>X</a> </td>
      </tr>";
      $no++;
    }
    echo "<tr>
      <td colspan='5' class='kanan'> <b>Sub Total</b> </td>
      <td class='kanan'> <b>".rupiah($sub_total)."</b> </td>
    </tr>";
    echo "</table>";
    echo "<div id='frame-button-keranjang'>
      <a href='".BASE_URL."index.php' id='lanjut-belanja'> Lanjut Belanja </a>
      <a href='".BASE_URL."index.php?page=data_pemesanan' id='lanjut-pesanan'> Lanjut Pesanan </a>
    </div>";
  }
?>

<script type="text/javascript">
  $(".update-quantity").on("input", function(e){
    let barang_id = $(this).attr("name");
    let value = $(this).val();

    $.ajax({
      method:"post",
      url:"update-keranjang.php",
      data:"barang_id=" + barang_id +"&value=" + value
    })
    .done(function(data){
      var json = $.parseJSON(data);
      if(json.status == true){
          location.reload();
      }else{
          alert(json.pesan);
          location.reload();
      }
    });
  })
</script>

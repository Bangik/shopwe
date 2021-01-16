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

    foreach ($keranjang as $key => $value) {
      $barang_id = $key;

      $nama_barang = $value{"nama_barang"};
      $quantity = $value{"quantity"};
      $gambar = $value{"gambar"};
      $harga = $value{"harga"};

      $total = $quantity * $harga;

      echo "
      <tr>
        <td class='tengah'>$no</td>
        <td class='kiri'> <img src='".BASE_URL."asset/img/barang/$gambar' height='100px'> </td>
        <td class='kiri'>$nama_barang</td>
        <td class='kiri'> <input type='text' name='$barang_id' value='$quantity' class='update-quantity'> </td>
        <td class='kanan'>".rupiah($harga)."</td>
        <td class='kanan'>".rupiah($total)."</td>
      </tr>";
      $no++;
    }
    echo "</table>";
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

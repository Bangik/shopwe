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

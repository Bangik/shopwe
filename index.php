<?php
  include_once("config/helper.php");
  include_once("config/koneksi.php");
  session_start();

  $id = isset($_SESSION['id']) ? $_SESSION['id'] : false;
  $nama = isset($_SESSION['name']) ? $_SESSION['name'] : false;
  $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
  $page = isset($_GET['page']) ? $_GET['page'] : false;
  $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>asset/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>asset/css/style-slides2.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slidesjs/3.0/jquery.slides.min.js" integrity="sha512-TxlLXEZX6gqIhL0yu/40Aed5AJpP2DagJBE3cXgu1oLXoZ33TG3Na+I8Cdnb7KdM15Z5srcDIsbuGMBnESY+EQ==" crossorigin="anonymous"></script>
    <title>ShopWe</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <a href="<?php echo BASE_URL; ?>">
          <img src="<?php echo BASE_URL;?>asset/img/logo.png" alt="logo">
        </a>
        <div class="menu">
          <div class="user">
            <?php
              if ($id) {
                echo "Hi <b>".$nama."</b>, "."<a href='".BASE_URL."index.php?page=profile&module=pesanan&action=list' class='link'> My Profile</a>";
                echo "<a href='".BASE_URL."logout.php' class='link'> Logout</a>";;
              }else {
            ?>
            <a href="<?php echo BASE_URL; ?>index.php?page=login" class="link">Login</a>
            <a href="<?php echo BASE_URL; ?>index.php?page=register" class="link">Register</a>
            <?php } ?>
          </div>
          <a href="<?php echo BASE_URL; ?>index.php?page=keranjang" class="btn-keranjang">
            <img src="<?php echo BASE_URL;?>asset/img/cart.png" alt="logo" class="btn-img">
          </a>
        </div>
      </div>
      <div class="content">
        <?php
          $filename = "$page.php";
          if (file_exists($filename)) {
            include_once($filename);
          }else {
            include_once("main.php");
          }
        ?>
      </div>
      <div class="footer">
        <p class="footer-p">Bangik 2020</p>
      </div>
    </div>
  </body>
  <script>
    $(function() {
      $('#slides').slidesjs({
        height: 350,
        play: {
          active: true,
          auto: true,
          interval: 3000,
          swap: true
        }
      });
    });
  </script>
</html>

<?php
  if ($id) {
    $module = isset($_GET['module']) ? $_GET['module']:false;
    $action = isset($_GET['action']) ? $_GET['action']:false;
    $mode = isset($_GET['mode']) ? $_GET['mode']:false;
  }else {
    header("Location: ".BASE_URL."index.php?page=login");
  }
  admin_only($module, $level);
?>
<div class="page-profile-bg">
  <div class="menu-profile">
    <ul>
      <?php if ($level == "superadmin") {?>
      <li>
        <a <?php if($module == "kategori"){echo 'class="active"';} ?> href="<?php echo BASE_URL."index.php?page=profile&module=kategori&action=list";?>">Kategori</a>
      </li>
      <li>
        <a <?php if($module == "barang"){echo 'class="active"';} ?> href="<?php echo BASE_URL."index.php?page=profile&module=barang&action=list";?>">Barang</a>
      </li>
      <li>
        <a <?php if($module == "kota"){echo 'class="active"';} ?> href="<?php echo BASE_URL."index.php?page=profile&module=kota&action=list";?>">Kota</a>
      </li>
      <li>
        <a <?php if($module == "user"){echo 'class="active"';} ?> href="<?php echo BASE_URL."index.php?page=profile&module=user&action=list";?>">User</a>
      </li>
      <li>
        <a <?php if($module == "banner"){echo 'class="active"';} ?> href="<?php echo BASE_URL."index.php?page=profile&module=banner&action=list";?>">Banner</a>
      </li>
      <?php } ?>
      <li>
        <a <?php if($module == "pesanan"){echo 'class="active"';} ?> href="<?php echo BASE_URL."index.php?page=profile&module=pesanan&action=list";?>">Pesanan</a>
      </li>
    </ul>
  </div>
  <div class="profile-content">
    <?php
      $file = "module/$module/$action.php";
      if (file_exists($file)) {
        include_once($file);
      }else {
        echo "<h3>Maaf, Halaman tidak ditemukan $file</h3>";
      }
    ?>
  </div>
</div>

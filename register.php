<?php
  if ($id) {
    header("Location: ".BASE_URL."index.php");
  }

  $notif = isset($_GET['notif']) ? $_GET['notif']:false;
  $nama = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap']:false;
  $email = isset($_GET['email']) ? $_GET['email']:false;
  $telp = isset($_GET['telp']) ? $_GET['telp']:false;
  $alamat = isset($_GET['alamat']) ? $_GET['alamat']:false;

?>
<div class="container-user-akses">
  <form class="form" action="<?php echo BASE_URL; ?>proses-register.php" method="post">
    <?php
    if ($notif == "require") {
      echo "<div class='notif'>maaf, form harus lengkap</div>";
    }elseif ($notif == "pass") {
      echo "<div class='notif'>maaf, password tidak sama</div>";
    }elseif ($notif == "email") {
      echo "<div class='notif'>maaf, email sudah terdaftar</div>";
    }
    ?>
    <div class="element-form">
      <label class="element-label">Nama Lengkap</label>
      <span class="element-span"> <input type="text" name="nama_lengkap" value="<?php echo $nama; ?>"> </span>
    </div>
    <div class="element-form">
      <label class="element-label">Email</label>
      <span class="element-span"> <input type="email" name="email" value="<?php echo $email; ?>" required> </span>
    </div>
    <div class="element-form">
      <label class="element-label">Nomor Telp</label>
      <span class="element-span"> <input type="text" name="telp" value="<?php echo $telp; ?>" required> </span>
    </div>
    <div class="element-form">
      <label class="element-label">Alamat</label>
      <span class="element-span"> <textarea name="alamat" required><?php echo $alamat; ?></textarea> </span>
    </div>
    <div class="element-form">
      <label class="element-label">Password</label>
      <span class="element-span"> <input type="password" name="password"> </span>
    </div>
    <div class="element-form">
      <label class="element-label">Re - Password</label>
      <span class="element-span"> <input type="password" name="password2" required> </span>
    </div>
    <div class="element-form">
      <span> <button type="submit" name="btn-submit" class="btn-register">Register</button> </span>
    </div>
  </form>
</div>

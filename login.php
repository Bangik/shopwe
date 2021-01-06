<?php

  if ($id) {
    header("Location: ".BASE_URL."index.php");
  }
  $notif = isset($_GET['notif']) ? $_GET['notif']:false;
?>
<div class="container-user-akses">
  <form class="form" action="<?php echo BASE_URL; ?>proses-login.php" method="post">
    <?php
    if ($notif == "require") {
      echo "<div class='notif'>maaf, email atau password salah</div>";
    }
    ?>
    <div class="element-form">
      <label class="element-label">Email</label>
      <span class="element-span"> <input type="email" name="email" required> </span>
    </div>
    <div class="element-form">
      <label class="element-label">Password</label>
      <span class="element-span"> <input type="password" name="password"> </span>
    </div>
    <div class="element-form">
      <span> <button type="submit" name="btn-submit-login" class="btn-register">Login</button> </span>
    </div>
  </form>
</div>

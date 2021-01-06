<?php

  session_start();
  unset($_SESSION['id']);
  unset($_SESSION['name']);
  unset($_SESSION['level']);
  header("Location: index.php");
?>

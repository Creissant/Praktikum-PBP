<?php
// Fahrel Gibran Alghany
// 24060120130106

session_start();
if (isset($_SESSION['username'])) {
  unset($_SESSION['username']);
  session_destroy();
}
header('Location: login.php');

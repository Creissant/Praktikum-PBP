<?php
// Fahrel Gibran Alghany
// 24060120130106

session_start();
$_SESSION['cart'] = array();
header('Location: view_books.php');

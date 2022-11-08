<?php
// Fahrel Gibran Alghany
// 24060120130106

require_once 'lib/db_login.php';

// Get email from url
$email = $_GET['email'];

// Check if email is already registered
$query = "SELECT * FROM user WHERE email = '$email'";
$result = $db->query($query);


echo $result->num_rows > 0;

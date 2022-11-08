<?php
// Fahrel Gibran Alghany
// 24060120130106

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "bookorama";
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
  die("Database connection failed: " . $db->connect_error);
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

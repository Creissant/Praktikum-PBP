<?php
// Fahrel Gibran Alghany
// 24060120130106

require_once('db_login.php');

session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}

//Menghapus data customer 
if (!isset($_GET['id'])) {
  // Get the id from ajax body
  $id = $_POST['id'];
} else {
  $id = test_input($_GET['id']);
}
//assign a query
$query = "DELETE FROM customers WHERE customerid=" . $id;
//execute the query
$result = $db->query($query);
if (!$result) {
  die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
} else {
  $db->close();
  header('Location: view_customer.php');
}

<!-- Nama: Fahrel Gibran Alghany -->
<!-- NIM: 24060120130106 -->

<?php
require_once('db_login.php');
$customerid = $_GET['id'];
//Assign query
$query = "SELECT * FROM customers where customerid=" . $customerid;
$result = $db->query($query);
if (!$result) {
  die("Could not query the database: <br />" . $db->error);
}
//Fetch and display results
while ($row = $result->fetch_object()) {
  echo 'Name: ' . $row->name . '<br />';
  echo 'Address: ' . $row->address . '<br />';
  echo 'City: ' . $row->city . '<br />';
}
$result->free();
$db->close();
?>
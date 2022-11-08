<?php
// Fahrel Gibran Alghany
// 24060120130106

require_once 'lib/db_login.php';

// Get all provinsi from table provinsi and echo the result
$query = "SELECT * FROM provinsi";
$result = $db->query($query);
if (!$result) {
  die("Could not query the database: <br/>" . $db->error);
} else {
  echo "<option disabled selected value=''>Pilih Provinsi</option>";
  while ($row = $result->fetch_object()) {
    echo "<option value='" . $row->id . "'>" . $row->nama . "</option>";
  }
}

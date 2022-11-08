<?php
require_once('db_login.php');

// Get the isbn
$isbn = $_GET['isbn'];

// Get the query from the search
$query = "SELECT * FROM books WHERE isbn = '$isbn'";

$result = $db->query($query);

if (!$result) {
  die("Could not query the database: <br />" . $db->error);
}

// Fetch and display the results
while ($row = $result->fetch_object()) {
  echo '<h6>Detail Buku</h6>';
  echo '<div class="">';
  echo '<h1 class="">' . $row->title . '</h1>';
  echo '<h2 class="">Author: ' . $row->author . '</h2>';
  echo '<h2 class="">ISBN: ' . $row->isbn . '</h2>';
  echo '<h2 class="">Price: ' . $row->price . '</h2>';
  echo '</div>';
}

$result->free();
$db->close();

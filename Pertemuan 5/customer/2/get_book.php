<?php
require_once('db_login.php');

$search = $_GET['search'];
// Get the query from the search
$query = "SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%' OR isbn LIKE '%$search%'";
$result = $db->query($query);

if (!$result) {
  die("Could not query the database: <br />" . $db->error);
}

// Fetch and display the results
echo '<div class="row">';
while ($row = $result->fetch_object()) {
  echo '<div class="col-md-4">';
  echo '<div class="card m-3" style="width: 18rem;">';
  echo '<div class="card-body">';
  echo '<h5 class="card-title">' . $row->title . '</h5>';
  // Button that execute detail_book function on click with isbn parameter
  echo '<button type="button" class="btn btn-primary" onclick="detail_book(\'' . $row->isbn . '\')">Detail</button>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}
echo '</div>';

$result->free();
$db->close();

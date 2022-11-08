<?php
// Fahrel Gibran Alghany
// 24060120130106

require_once('db_login.php');
$query = "SELECT * FROM books";
$result = $db->query($query);
if (!$result) {
  die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Books</title>
  <!-- add bootstrap cdn -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<div class="card">
  <div class="card-header">List of Books</div>
  <div class="card-body">
    <br>
    <table class="table table-striped">
      <tr>
        <th>ISBN</th>
        <th>Author</th>
        <th>Title</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
      <?php
      while ($row = $result->fetch_object()) {
        echo '<tr>';
        echo '<td>' . $row->isbn . '</td>';
        echo '<td>' . $row->author . '</td>';
        echo '<td>' . $row->title . '</td>';
        echo '<td>' . $row->price . '</td>';
        echo '<td><a class="btn btn-primary" href="show_cart.php?id=' . $row->isbn . '">Add to Cart</a></td>';
        echo '</tr>';
      }

      ?>
    </table>
    <?php echo 'Total Rows = ' . $result->num_rows;
    $result->free();
    ?>
  </div>
</div>
<?php
// Fahrel Gibran Alghany
// 24060120130106

session_start();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  if ($id != '') {
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
    }
    if (isset($_SESSION['cart'][$id])) {
      $_SESSION['cart'][$id]++;
    } else {
      $_SESSION['cart'][$id] = 1;
    }
  }
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Cart</title>
  <!-- add bootstrap cdn -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<div class="card">
  <div class="card-header">Shopping Cart</div>
  <div class="card-body">
    <br>
    <table class="table table-striped">
      <tr>
        <th>ISBN</th>
        <th>Author</th>
        <th>Title</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Price * Quantity</th>
      </tr>
      <?php
      require_once('db_login.php');
      $sum_qty = 0;
      $sum_price = 0;
      if (count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $id => $qty) {
          $query = "SELECT * FROM books WHERE isbn='" . $id . "'";
          $result = $db->query($query);
          if (!$result) {
            die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
          }
          while ($row = $result->fetch_object()) {
            $sum_qty += $qty;
            $sum_price += $row->price * $qty;
            echo '<tr>';
            echo '<td>' . $row->isbn . '</td>';
            echo '<td>' . $row->author . '</td>';
            echo '<td>' . $row->title . '</td>';
            echo '<td>' . $row->price . '</td>';
            echo '<td>' . $qty . '</td>';
            echo '<td>' . $row->price * $qty . '</td>';
            echo '</tr>';
          }
        }
        echo '<tr><td></td><td></td><td></td><td></td><td>' . $sum_qty . '</td><td>' . $sum_price . '</td></tr>';
        $result->free();
        $db->close();
      } else {
        echo '<tr><td colspan="6" align="center">Cart is empty</td></tr>';
      }
      ?>
    </table>
    Total items = <?php echo $sum_qty; ?><br><br>
    <a class="btn btn-primary" href="view_books.php">Continue Shopping</a>
    <a class="btn btn-danger" href="delete_cart.php">Empty Cart</a><br><br>
  </div>
</div>
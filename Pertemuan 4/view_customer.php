<?php
// Fahrel Gibran Alghany
// 24060120130106

session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}
?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <!-- add bootstrap cdn -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        Customers Data
        <a class="btn btn-secondary btn-sm" href="logout.php">Logout</a>
      </div>
    </div>
    <div class="card-body">
      <a class="btn btn-primary" href="add_customer.php">+Add Customer</a>
      <br>
      <br>
      <table class="table table-striped">
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Address</th>
          <th>City</th>
          <th>Action</th>
        </tr>
        <?php
        // include our login information
        require_once('db_login.php');
        // Assign the query
        $query = "SELECT customerid AS ID, name AS Nama, address AS Alamat, city AS Kota FROM customers ORDER BY customerid";
        $result = $db->query($query);
        if (!$result) {
          die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
        }

        $i = 1;
        while ($row = $result->fetch_object()) {
          echo '<tr>';
          echo '<td>' . $i . '</td>';
          echo '<td>' . $row->Nama . '</td>';
          echo '<td>' . $row->Alamat . '</td>';
          echo '<td>' . $row->Kota . '</td>';
          echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id=' . $row->ID . '">Edit</a> ';
          echo '<a class="btn btn-danger btn-sm" href="delete_customer.php?id=' . $row->ID .
            '">Delete</a></td>';

          echo '</tr>';
          $i++;
        }
        echo '</table>';
        echo '<br>';
        echo 'Total Rows = ' . $result->num_rows;
        $result->free();
        $db->close();
        ?>

      </table>
    </div>
  </div>
</body>

</html>
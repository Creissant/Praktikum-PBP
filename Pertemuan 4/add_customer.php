<?php
// Fahrel Gibran Alghany
// 24060120130106

require_once('db_login.php');
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}
//Menambahkan data customer baru
if (!isset($_POST['submit'])) {
  $name = '';
  $address = '';
  $city = '';
  $error_name = '';
  $error_address = '';
  $error_city = '';
} else {
  $valid = TRUE; //flag validasi
  $name = test_input($_POST['name']);
  $address = test_input($_POST['address']);
  $city = test_input($_POST['city']);
  //cek nama
  if ($name == '') {
    $error_name = "Name is required";
    $valid = FALSE;
  } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
    $error_name = "Only letters and white space allowed";
    $valid = FALSE;
  }
  //cek alamat
  if ($address == '') {
    $error_address = "Address is required";
    $valid = FALSE;
  }
  //cek kota
  if ($city == '') {
    $error_city = "City is required";
    $valid = FALSE;
  } elseif (!preg_match("/^[a-zA-Z ]*$/", $city)) {
    $error_city = "Only letters and white space allowed";
    $valid = FALSE;
  }
  //insert into database with customerid continue from highest id
  if ($valid) {
    //get highest customerid from database
    $query = "SELECT MAX(customerid) AS max FROM customers";
    $result = $db->query($query);
    if (!$result) {
      die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
    } else {
      while ($row = $result->fetch_object()) {
        $newid = $row->max + 1;
      }
    }
    //escape inputs data
    $name = $db->real_escape_string($name);
    $address = $db->real_escape_string($address);
    $city = $db->real_escape_string($city);
    //assign a query
    $query = "INSERT INTO customers (customerid, name,address,city) VALUES ('" . $newid . "','" . $name . "','" . $address . "','" . $city . "')";
    //execute the query
    $result = $db->query($query);
    if (!$result) {
      die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
    } else {
      $db->close();
      header('Location: view_customer.php');
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Customer</title>
  <!-- add bootstrap cdn -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="card">
    <div class="card-header">Edit Customers Data</div>
    <div class="card-body">
      <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table class="table table-stripped">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
            <span class="error"><?php if (isset($error_name)) echo $error_name; ?></span>
          </div>
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
            <span class="error"><?php if (isset($error_address)) echo $error_address; ?></span>
          </div>
          <div class="form-group">
            <label for="city">City:</label>
            <select class="form-control" id="city" name="city">
              <option value="none">Select City</option>
              <option value="Airport West" <?php if ($city == 'Airport West') echo 'selected="selected"'; ?>>Airport West</option>
              <option value="Box Hill" <?php if ($city == 'Box Hill') echo 'selected="selected"'; ?>>Box Hill</option>
              <option value="Yarraville" <?php if ($city == 'Yarraville') echo 'selected="selected"'; ?>>Yarraville</option>

            </select>
            <span class="error"><?php if (isset($error_city)) echo $error_city; ?></span>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
        </table>
      </form>
    </div>
  </div>
</body>

<?php $db->close() ?>
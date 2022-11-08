<!-- Nama: Fahrel Gibran Alghany -->
<!-- NIM: 24060120130106 -->

<?php
require_once('db_login.php');
$name = $db->real_escape_string($_POST['name']);
$address = $db->real_escape_string($_POST['address']);
$city = $db->real_escape_string($_POST['city']);
$query = "INSERT INTO customers (name,address,city) VALUES('" . $name . "','" . $address . "','" . $city . "')";
$result = $db->query($query);

if (!$result) {
  echo    '<div class="alert alert-danger alert-dismissible">
            <strong>Error!</strong> Could not query the database<br>' .
    $db->error . '<br>query = ' . $query .
    '</div>';
} else {
  echo    '<div class="alert alert-success alert-dismissible">
                <strong>Success!</strong> Data has been added.<br>
                Name : ' . $_POST['name'] . '<br>
                Address : ' . $_POST['address'] . '<br>
                City : ' . $_POST['city'] . '<br>
            </div>';
}
//close db connection
$db->close();
?>
<script src="ajax.js"></script>
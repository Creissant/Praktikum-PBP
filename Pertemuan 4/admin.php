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
</head>

<body>
  <div class="card">
    <div class="card-header">
      <h3>Admin Page</h3>
    </div>
    <div class="card-body">
      <p>Welcome</p>
      <p>You're logged in as <b><?php echo $_SESSION['username']; ?></b></p>
      <br>
      <a href="view_customer.php" class="btn btn-success">Go To Dashboard</a><a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
  </div>
</body>
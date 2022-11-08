<?php
// Fahrel Gibran Alghany
// 24060120130106

session_start();
require_once('db_login.php');

if (isset($_SESSION['username'])) {
  header('Location: view_customer.php');
}

//mengecek apakah user sudah submit form
if (isset($_POST['submit'])) {
  $valid = TRUE; //flag validasi

  //cek validasi email
  $email = test_input($_POST['email']);
  if ($email == '') {
    $error_email = "Email is required";
    $valid = FALSE;
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_email = "Invalid email format";
    $valid = FALSE;
  }

  //cek validasi password
  $password = test_input($_POST['password']);
  if ($password == '') {
    $error_password = "Password is required";
    $valid = FALSE;
  }

  //cek validasi
  if ($valid) {
    //assign a query
    $query = "SELECT * FROM admin WHERE email='" . $email . "' AND password=MD5('" . $password . "')";

    //execute the query
    $result = $db->query($query);
    if (!$result) {
      die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
    } else {
      if ($result->num_rows > 0) {
        $_SESSION['username'] = $email;
        header('Location: view_customer.php');
        exit;
      } else {
        echo '<span class="error">Combination of username and password are not correct</span>';
      }
    }
    //close db
    $db->close();
  }
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- add bootstrap cdn -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="card">
    <div class="card-header">
      Login Form
    </div>
    <div class="card-body">
      <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email" size="30" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
          <span class="error"><?php if (isset($error_email)) echo $error_email; ?></span>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password">
          <span class="error"><?php if (isset($error_password)) echo $error_password; ?></span>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
      </form>
    </div>
  </div>
</body>
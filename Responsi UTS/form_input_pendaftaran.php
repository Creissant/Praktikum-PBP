<?php /* Fahrel Gibran Alghany */ ?>
<?php /* 24060120130106 */ ?>

<?php include('header.html') ?>
<?php
/*TODO: buat 
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */

require_once 'lib/db_login.php';

// Check if already submit the form
if (isset($_POST['submit'])) {
  $submit = true;
  // Check if nama is empty
  if (empty($_POST['nama'])) {
    $error_nama = "Nama tidak boleh kosong";
    $submit = false;
  } else {
    $nama = $db->real_escape_string(trim($_POST['nama']));
  }

  // Check if email is empty
  if (empty($_POST['email'])) {
    $error_email = "Email tidak boleh kosong";
    $submit = false;
  } else {
    // Check email is valid
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $error_email = "Email tidak valid";
      $submit = false;
    } else {
      $email = $db->real_escape_string(trim($_POST['email']));
      // Check if email is already registered
      $query = "SELECT * FROM user WHERE email = '$email'";
      $result = $db->query($query);
      if ($result->num_rows > 0) {
        $error_email = "Email sudah terdaftar";
        $submit = false;
      }
    }
  }

  // Check if gender is empty
  if (empty($_POST['gender'])) {
    $error_gender = "Gender tidak boleh kosong";
    $submit = false;
  } else {
    $gender = $db->real_escape_string(trim($_POST['gender']));
  }

  // Check if alamat is empty
  if (empty($_POST['alamat'])) {
    $error_alamat = "Alamat tidak boleh kosong";
    $submit = false;
  } else {
    $alamat = $db->real_escape_string(trim($_POST['alamat']));
  }

  // Check if provinsi is empty
  if (empty($_POST['provinsi'])) {
    $error_provinsi = "Provinsi tidak boleh kosong";
    $submit = false;
  } else {
    $provinsi = $db->real_escape_string(trim($_POST['provinsi']));
  }

  // Check if kabupaten is empty
  if (empty($_POST['kabupaten'])) {
    $error_kabupaten = "Kabupaten tidak boleh kosong";
    $submit = false;
  } else {
    $kabupaten = $db->real_escape_string(trim($_POST['kabupaten']));
  }

  // If submit is true, insert the data
  if ($submit) {
    $query = "INSERT INTO user (nama, email, jenis_kelamin, alamat, id_provinsi, id_kabupaten) VALUES ('$nama', '$email', '$gender', '$alamat', $provinsi, $kabupaten)";

    $result = $db->query($query);

    if (!$result) {
      $success = false;
      $error_message = "Gagal mendaftar!";
    } else {
      $success = true;
      // Clear all the input
      $nama = "";
      $email = "";
      $gender = "";
      $alamat = "";
      $provinsi = "";
      $kabupaten = "";
    }

    $db->close();
  }
}


?>

<div class="card">
  <!-- If there is success variable, show message -->
  <?php if (isset($success)) : ?>
    <?php if ($success) : ?>
      <div class="alert alert-success" role="alert">
        Berhasil mendaftar
      </div>
    <?php else : ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error_message ?>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="card-header">Form Input Pendaftaran</div>
  <div class="card-body">
    <!-- /* TODO definisikan method dan actions */ -->
    <form name="daftar" method="POST" action="">
      <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?php if (isset($nama)) echo $nama; ?>">
        <div id="error_name" style="color: red;">
          <?php if (isset($error_nama))  echo $error_nama ?>
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <!-- /* TODO buat cek email menggunakan ajax */ -->
        <input type="email" name="email" id="email" class="form-control" oninput="getUser()" value="<?php if (isset($email)) echo $email; ?>">
        <div id="error_email" style="color: red;">
          <?php if (isset($error_email))  echo $error_email ?>
        </div>
      </div>
      <label>Jenis Kelamin</label>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="gender" value="Laki-laki" <?php if (isset($gender) && $gender == "Laki-laki") echo "checked"; ?>>Laki-laki
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="gender" value="Perempuan" <?php if (isset($gender) && $gender == "Perempuan") echo "checked"; ?>>Perempuan
        </label>
      </div>
      <div id="error_gender" style="color: red; margin-bottom: 12px;">
        <?php if (isset($error_gender))  echo $error_gender ?>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" rows="3" class="form-control"><?php if (isset($alamat)) echo $alamat; ?></textarea>
        <div id="error_alamat" style="color: red;">
          <?php if (isset($error_alamat))  echo $error_alamat ?>
        </div>
      </div>
      <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <select onchange="getKabupaten()" name="provinsi" id="provinsi" class="form-control">
          <option value="">Pilih Provinsi</option>
          <!-- /* TODO tampilkan daftar provinsi menggunakan ajax */ -->
          <!-- DONE: Ditaruh di body onload -->
        </select>
        <div id="error_provinsi" style="color: red;">
          <?php if (isset($error_provinsi))  echo $error_provinsi ?>
        </div>
      </div>
      <div class="form-group">
        <label for="kabupaten">Kabupaten</label>
        <select name="kabupaten" id="kabupaten" class="form-control">
          <option value="">Pilih Kabupaten</option>
          <!-- /* TODO tampilkan daftar kabupaten berdasarkan pilihan provinsi sebelumnya, menggunakan ajax*/ -->
          <!-- DONE: onchange bagian provinsi -->
        </select>
        <div id="error_kabupaten" style="color: red;">
          <?php if (isset($error_kabupaten))  echo $error_kabupaten ?>
        </div>
      </div>
      <br>
      <button type="submit" name="submit" id="submit" value="submit" class="btn btn-primary container-fluid">Daftar</button>
    </form>
  </div>
</div>

<?php include('footer.html') ?>
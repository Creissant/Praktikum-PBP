<!-- Fahrel Gibran Alghany -->
<!-- 24060120130106 -->
<!-- B2 -->

<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>user_form_post</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <div class="container"><br>
    <div class="card">
      <div class="card-header">Form Mahasiswa</div>
      <div class="card-body">
        <form method="POST" autocomplete="on" action="">
          <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="kota">Kota/ Kabupaten:</label>
            <select id="kota" name="kota" class="form-control">
              <option value="Semarang">Semarang</option>
              <option value="Jakarta">Jakarta</option>
              <option value="Bandung">Bandung</option>
              <option value="Surabaya">Surabaya</option>
            </select>
          </div>
          <label>Jenis Kelamin:</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita
            </label>
          </div>
          <br>
          <label>Peminatan:</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="minat[]" value="coding">Coding
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design">UX Design
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data Science
            </label>
          </div>
          <br>
          <!-- submit, reset dan button -->
          <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </form>
        <br>
        <?php
        if (isset($_POST["submit"])) {
          echo "<h3>Your Input:</h3>";
          echo 'Nama = ' . $_POST['nama'] . '<br />';
          echo 'Email = ' . $_POST['email'] . '<br />';
          echo 'Kota = ' . $_POST['kota'] . '<br />';
          if (isset($_POST['jenis_kelamin'])) {
            echo 'Jenis Kelamin = ' . $_POST['jenis_kelamin'] . '<br />';
          } else {
            echo 'Jenis Kelamin = ' . 'Belum diisi' . '<br />';
          }
          if (isset($_POST['minat'])) {
            echo 'Peminatan = ' . implode(', ', $_POST['minat']) . '<br />';
          } else {
            echo 'Peminatan = ' . 'Belum diisi' . '<br />';
          }
        }
        ?>
      </div>
</body>

</html>
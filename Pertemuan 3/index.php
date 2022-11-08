<!-- Fahrel Gibran Alghany -->
<!-- 24060120130106 -->
<!-- B2 -->

<?php

if (isset($_POST['submit'])) {
  // Inimialisasi isValid
  $isValid = true;
  // Check NIM
  if (isset($_POST['nim'])) {
    $nim = $_POST['nim'];
    // Check if NIM is only numeric with 14 digits
    if ($nim == '') {
      $isValid = false;
      $nim_error = 'NIM tidak boleh kosong!';
    } elseif (!preg_match('/^[0-9]{14}$/', $nim)) {
      $isValid = false;
      $nim_error = 'NIM harus 14 digit angka!';
    }
  }

  // Check Nama
  if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    if ($nama == '') {
      $isValid = false;
      $nama_error = 'Nama tidak boleh kosong!';
    }
  }

  // Check Kelamin
  if (!isset($_POST['kelamin'])) {
    $isValid = false;
    $kelamin_error = 'Jenis kelamin harus dipilih!';
  } else {
    $kelamin = $_POST['kelamin'];
  }

  // Check Kelas
  if (isset($_POST['kelas'])) {
    $kelas = $_POST['kelas'];
  } else {
    $isValid = false;
    $kelas_error = 'Kelas tidak boleh kosong!';
  }

  // Check Ekstra
  if (isset($_POST['submit'])) {
    if (isset($kelas)) {
      $ekstra = [];
      if (isset($_POST['ekstra'])) {
        $ekstra = $_POST['ekstra'];
      }
      if ($kelas != 'XII') {
        if (count($ekstra) < 1) {
          $isValid = false;
          $ekstra_error = 'Ekstra minimal 1';
        } elseif (count($ekstra) > 3) {
          $isValid = false;
          $ekstra_error = 'Ekstra maksimal 3!';
        }
      }
    }
  }
  if ($isValid) {
    // Reset form
    $nim = '';
    $nama = '';
    $kelas = null;
    $ekstra = [];
    $kelamin = null;
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validasi Form PHP</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>
  <script src="js/script.js"></script>
</head>

<body class="h-screen bg-blue-500">
  <div class="flex flex-col justify-center items-center h-full w-full">
    <!-- If isValid is true, show success badges -->
    <?php if (isset($isValid) && $isValid) : ?>
      <div id="close_alert" class="mt-12 w-1/2 bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">Data berhasil disimpan!</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="hideAlert()">
          <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
          </svg>
      </div>
    <?php endif; ?>
    <div class="w-1/2 bg-white rounded shadow-2xl p-8 m-4">
      <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">Form Input Mahasiswa</h1>
      <form action="" method="post">
        <div class="flex flex-col mb-4">
          <label class="mb-2 font-semibold text-lg text-gray-900" for="nim">NIM</label>
          <input required class="border py-2 px-3 text-grey-800" value="<?php if (isset($nim)) echo $nim ?>" type="number" name="nim" id="nim">
          <!-- Show error dialog if $nim_error is set -->
          <?php if (isset($nim_error)) : ?>
            <div class="text-red-500 text-sm"><?= $nim_error ?></div>
          <?php endif; ?>
        </div>
        <div class="flex flex-col mb-4">
          <label class="mb-2 font-semibold text-lg text-gray-900" for="nama">Nama</label>
          <input required value="<?php if (isset($nama)) echo $nama ?>" class="border py-2 px-3 text-grey-800" type="text" name="nama" id="nama">
          <!-- Show error dialog if $nama_error is set -->
          <?php if (isset($nama_error)) : ?>
            <div class="text-red-500 text-sm"><?= $nama_error ?></div>
          <?php endif; ?>
        </div>
        <div class="flex flex-col mb-4">
          <label class="mb-2 font-semibold text-lg text-gray-900">Jenis Kelamin</label>
          <div>
            <input <?php if (isset($kelamin) && $kelamin == 'P') echo 'checked' ?> value="P" required type="radio" name="kelamin" id="kelamin1">
            <label class="mr-6" for="kelamin1">Pria</label>
          </div>
          <div>
            <input <?php if (isset($kelamin) && $kelamin == 'W') echo 'checked' ?> value="W" required type="radio" name="kelamin" id="kelamin2">
            <label class="mr-6" for="kelamin2">Wanita</label>
          </div>
          <!-- Show error dialog if $kelamin_error is set -->
          <?php if (isset($kelamin_error)) : ?>
            <div class="text-red-500 text-sm"><?= $kelamin_error ?></div>
          <?php endif; ?>
        </div>
        <div class="flex flex-col mb-4">
          <label class="mb-2 font-semibold text-lg text-gray-900" for="kelas">Kelas</label>
          <select name="kelas" id="kelas" onchange="toggleExtra()" class="border py-2 px-3 text-grey-800">
            <option value="" disabled <?php if (!isset($kelas)) echo 'selected' ?>>-- Pilih Kelas --</option>
            <option value="X" <?php if (isset($kelas) && $kelas == 'X') echo 'selected' ?>>X</option>
            <option value="XI" <?php if (isset($kelas) && $kelas == 'XI') echo 'selected' ?>>XI</option>
            <option value="XII" <?php if (isset($kelas) && $kelas == 'XII') echo 'selected' ?>>XII</option>
          </select>
          <!-- Show error dialog if $kelas_error is set -->
          <?php if (isset($kelas_error)) : ?>
            <div class="text-red-500 text-sm"><?= $kelas_error ?></div>
          <?php endif; ?>
        </div>
        <div class="flex flex-col mb-4 <?php if (!isset($kelas) || $kelas == 'XII') echo 'hidden' ?>" id="extra">
          <label class="mb-2 font-semibold text-lg text-gray-900" for="ekstrakurikuler">Ekstrakurikuler</label>
          <div class="flex flex-col">
            <div>
              <input <?php if (isset($ekstra) && in_array('pramuka', $ekstra)) echo 'checked' ?> class="extra_opt" type="checkbox" name="ekstra[]" id="pramuka" value="pramuka"> <label for="pramuka">Pramuka</label>
            </div>
            <div>
              <input <?php if (isset($ekstra) && in_array('seni_tari', $ekstra)) echo 'checked' ?> class="extra_opt" type="checkbox" name="ekstra[]" id="seni_tari" value="seni_tari"> <label for="seni_tari">Seni Tari</label>
            </div>
            <div>
              <input <?php if (isset($ekstra) && in_array('sinematografi', $ekstra)) echo 'checked' ?> class="extra_opt" type="checkbox" name="ekstra[]" id="sinematografi" value="sinematografi"> <label for="sinematografi">Sinematografi</label>
            </div>
            <div>
              <input <?php if (isset($ekstra) && in_array('basket', $ekstra)) echo 'checked' ?> class="extra_opt" type="checkbox" name="ekstra[]" id="basket" value="basket"> <label for="basket">Basket</label>
            </div>
          </div>
          <!-- Show error dialog if $ekstra_error is set -->
          <?php if (isset($ekstra_error)) : ?>
            <div class="text-red-500 text-sm"><?= $ekstra_error ?></div>
          <?php endif; ?>
        </div>
        <div class="flex justify-center gap-3">
          <button class="block shadow-md bg-blue-500 transition-all hover:bg-blue-700 text-white uppercase text-md px-4 py-2 rounded" type="submit" name="submit" value='submit'>Submit</button>
          <button onclick="return confirm('Anda yakin untuk reset?')" class="block shadow-md transition-all bg-red-500 hover:bg-red-700 text-white uppercase text-md px-4 py-2 rounded" type="reset">Reset</button>
        </div>
      </form>
    </div>
    <div>
      <small class="text-white opacity-60 hover:opacity-90">
        <a target="_blank" href="https://github.com/dafex301">
          Fahrel Gibran Alghany - 24060120130106
        </a>
      </small>
    </div>
  </div>

</body>


</html>
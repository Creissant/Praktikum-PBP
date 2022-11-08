<?php
// Connect to database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cobapbp';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die('Koneksi gagal: ' . mysqli_connect_error());
}

$query = 'SELECT nim, mahasiswa.nama as m, departemen.nama as d FROM mahasiswa INNER JOIN departemen WHERE dept = departemen.id';
$result = mysqli_query($conn, $query);

// Fetch make a table
echo '<table border="1">';
echo '<tr><th>NIM</th><th>Nama</th><th>Departemen</th></tr>';
while ($row = mysqli_fetch_array($result)) {
  echo '<tr>';
  echo '<td>' . $row['nim'] . '</td>';
  echo '<td>' . $row['m'] . '</td>';
  echo '<td>' . $row['d'] . '</td>';
  echo '</tr>';
}
echo '</table>';

// Close connection
mysqli_close($conn);

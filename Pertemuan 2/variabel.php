<?php
//assign nilai ke variabel
$a = 15;
echo 'Variabel a berisi : ' . $a . '<br />';
$a = 'Pemrograman Web dan Internet';
echo 'Variabel a berisi : ' . $a . '<br />';

// Variabel lokal
// Define a function
echo '----- Variabel Lokal -----<br>';
function diskon()
{
  $harga = 1000;
  $harga = 0.2 * $harga;
}
$harga = 2000;
diskon();
echo 'harga = ' . $harga . '<br />';

// Variabel global
// Define a function
echo '----- Variabel Global -----<br>';
function diskon1()
{
  // Define harga as a global variable
  global $harga;
  // Multiple harga by 0.8
  $harga = 0.8 * $harga;
}
// Set harga
$harga = 2000;
// Call the function
diskon1();
// Display the age
echo 'harga = ' . $harga . '<br />';

// Variabel Statik
// Define the function
echo '----- Variabel Statik -----<br>';
function diskon2()
{
  // Define harga as a static variable
  static $harga = 1000;
  $harga = 0.8 * $harga;

  echo 'harga = ' . $harga . '<br />';
}
// Set harga to 2000
$harga = 30;
// Call the function twice
diskon2();
diskon2();
// Display the harga
echo 'harga = ' . $harga . '<br />';

// Variabel Super Global
echo '----- Variabel Super Global -----<br>';
echo htmlentities($_SERVER["PHP_SELF"]);

// Konstanta
echo '----- Variabel Konstanta -----<br>';
define("PWI", "Permograman Web dan Internet ");
echo 'Hari ini sedang praktikum ' . PWI . '<br />';
$constant_name = "PWI";
echo 'Hari ini sedang praktikum ' . constant($constant_name) . '<br />';
//konstanta bawaan PHP
echo 'File yang sedang diproses "' . __FILE__ . ' pada baris "' .
  __LINE__ . '"<br />';

<!-- Nama Kelompok : Nakama PBP
    Anggota :
    1. Fahrel Gibran Alghany 24060120130106/ 2020
    2. Hanan Nurul Hardyana Zain 24060120140148/ 2020
    3. Muhamad Fiqih Ikhsan 24060120140097/ 2020
    4. Rayhan Illyas Annabil 24060120120004/ 2020
    5. Rif’an Fatoni Febrianto 24060120130073/ 2020
    Kelas : PBP B - Informatika 2020
    Deskripsi: untuk menghubungkan program ke database 
-->
<?php
$db_host = 'localhost';
$db_database = 'bookorama';
$db_username = 'root';
$db_password = '';

//connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
    die("Couldn't connect to the databse: <br />" . $db->connect_error);
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
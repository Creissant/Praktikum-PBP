<!-- 
    Nama Kelompok : Nakama PBP
    Anggota :
    1. Fahrel Gibran Alghany 24060120130106/ 2020
    2. Hanan Nurul Hardyana Zain 24060120140148/ 2020
    3. Muhamad Fiqih Ikhsan 24060120140097/ 2020
    4. Rayhan Illyas Annabil 24060120120004/ 2020
    5. Rif’an Fatoni Febrianto 24060120130073/ 2020
    Kelas : PBP B - Informatika 2020
    File: delete_customer.php
    Deskripsi: untuk menghapus data customer berdasarkan id
-->


<?php

require_once('db_login.php');
$id = $_POST['id']; //mendapatkan cutsomerid yang dilewatkan ke url

//Assign a query
$query = "DELETE FROM customers WHERE customerid=" . $id . " ";
//Execute the query
$result = $db->query($query);
if (!$result) {
    die("Couldn't query the database: <br />" . $db->error . '<br>Query:' . $query);
} else {
    $db->close();
    // header('Location: view_customer.php');
}
?>
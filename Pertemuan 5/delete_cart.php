<!-- 
    Nama Kelompok : Nakama PBP
    Anggota :
    1. Fahrel Gibran Alghany 24060120130106/ 2020
    2. Hanan Nurul Hardyana Zain 24060120140148/ 2020
    3. Muhamad Fiqih Ikhsan 24060120140097/ 2020
    4. Rayhan Illyas Annabil 24060120120004/ 2020
    5. Rif’an Fatoni Febrianto 24060120130073/ 2020
    Kelas : PBP B - Informatika 2020
    File: delete_cart.php
    Deskripsi: untuk menghapus session
-->
<?php

session_start();
if(isset($_SESSION['cart'])){
    //Fungsi unset() dapat digunakan untuk membatalkan setel variabel
    unset($_SESSION['cart']);
}
header('Location: view_books.php');
?>
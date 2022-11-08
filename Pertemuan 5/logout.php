<!-- 
Nama        : Hanan Nurul Hardyana Zain 
NIM         : 24060120140148
Tanggal     : 19 September 2022
Deskripsi   : logout.php untuk logout menghapus session yang dibuat saat login
-->

<?php
session_start();
if (isset($_SESSION['username'])){
    unset($_SESSION['username']);
    session_destroy();
}
header('Location: login.php');
?>

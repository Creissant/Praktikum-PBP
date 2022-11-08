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
require_once('db_login.php');

$id = $_POST['id']; 

//Assign a query
$query = "DELETE FROM customers WHERE customerid=".$id." ";

// //Execute the query
$result = $db->query($query);

if(!$result){
    echo    '<div class="alert alert-danger alert-dismissible">
            <strong>Error!</strong> Could not query the database<br>'.
            $db->error.'<br>query = '.$query.
            '</div>';
}else{
    echo    '<div class="alert alert-success alert-dismissible">
                <strong>Success!</strong> Data has been deleted.<br>
                Id : '.$_POST['id'].'<br>
            </div>';
}
//close db connection
$db->close();

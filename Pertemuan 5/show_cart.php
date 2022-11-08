<!-- 
    Nama Kelompok : Nakama PBP
    Anggota :
    1. Fahrel Gibran Alghany 24060120130106/ 2020
    2. Hanan Nurul Hardyana Zain 24060120140148/ 2020
    3. Muhamad Fiqih Ikhsan 24060120140097/ 2020
    4. Rayhan Illyas Annabil 24060120120004/ 2020
    5. Rif’an Fatoni Febrianto 24060120130073/ 2020
    Kelas : PBP B - Informatika 2020
    File      : show_cart.php
    Deskripsi : untuk menambahkan item ke shopping cart dan menampilkan isi shopping cart
-->
<?php 


session_start();
$id = $_GET['id'];
if($id != ""){
    //jika $_SESSION['cart'] belum ada, maka inisilisasi dengan array kosong
    //$_SESSION['cart'] merupakan array assosiatif
    //indeksnya berisi isbn buku yang dipilih
    //value-nya berisi jumlah (qty) dari buku dengan isbn tersebut
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    //jika $_SESSION['cart'] dengan indeks isbn buku yang dipilih sudah ada, tambahkan value-nya
    // dengan 1, jika belum ada, buat elemen baru dengan indeks tersebut dan set nilainya dengan 1
    if (isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]++;
    } else{
        $_SESSION['cart'][$id] = 1;
    }
}
?>
<!--Menampilkan isi shopping cart-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
  <br>
<div class="container">
    <div class="card">
        <div class="card-header">Shopping Cart</div>
        <div class="card-body">
            <br>
            <table class="table table-striped">
                <tr>
                    <th>ISBN</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Price * Qty</th>
                </tr>
                <?php 
                //include our login information
                require_once('db_login.php');
                $sum_qty = 0; //inisialisasi total item di shopping cart
                $sum_price = 0; //inisialisasi total price di shopping cart
                if (is_array($_SESSION['cart'])){
                    foreach ($_SESSION['cart'] as $id => $quantity){
                        $query = " SELECT * FROM books WHERE isbn='".$id."'";
                        $result = $db->query($query);
                        if (!$result){
                            die("Could not query the database: <br>".$db->error."<br>Query: " .$query);
                        }
                        while ($row = $result->fetch_object()){
                            echo '<tr>';
                            echo '<td>'.$row->isbn.'</td>';
                            echo '<td>'.$row->author.'</td>';
                            echo '<td>'.$row->title.'</td>';
                            echo '<td>'.$row->price.'</td>';
                            echo '<td>'.$quantity.'</td>';
                            $price = $row->price;
                            echo '<td>'.$price*$quantity.'</td>';
                            $sum_price = $sum_price + ($row->price * $quantity);
                            $sum_qty = $sum_qty + $quantity;
                        }
                    }
                    echo '<tr><td></td><td></td><td></td><td></td><td>'.$sum_qty.'</td><td>'.$sum_price.'</td></tr>';
                    $result->free();
                    $db->close();
                } else{
                    echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>';
                } 
                ?>
            </table>
            Total items = <?php echo $sum_qty; ?><br><br>
            <a class="btn btn-primary" href="view_books.php">Continue Shopping</a>
            <a class="btn btn-danger" href="delete_cart.php">Empty Cart</a><br /><br />
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
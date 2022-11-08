<!--
    Nama Kelompok : Nakama PBP
    Anggota :
    1. Fahrel Gibran Alghany 24060120130106/ 2020
    2. Hanan Nurul Hardyana Zain 24060120140148/ 2020
    3. Muhamad Fiqih Ikhsan 24060120140097/ 2020
    4. Rayhan Illyas Annabil 24060120120004/ 2020
    5. Rif’an Fatoni Febrianto 24060120130073/ 2020
    Kelas : PBP B - Informatika 2020
    Nama File : view_books.php
    Deskripisi : file untuk menampilkan data buku
-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
        <div class="container">
                <div class="card mt-4">
                    <div class="card-header">Books Data</div>
                    <div class="card-body">
                        <br>
                        <table class="table table-striped">
                            <tr>
                                <th>ISBN</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>

                            <?php
                            // include our login information
                            require_once('db_login.php');

                            // execute the query
                            $query = " SELECT * FROM books ORDER BY isbn ";
                            $result = $db->query($query);
                            if (!$result){
                                die ("Could not the query the database: <br />" . $db->error ."<br>Query: " . $query);
                            }

                            // fetch and display the results
                            while ($row = $result->fetch_object()){
                                echo '<tr>';
                                echo '<td>' .$row->isbn. '</td>';
                                echo '<td>' .$row->author. '</td>';
                                echo '<td>' .$row->title. '</td>';
                                echo '<td> $'.$row->price.'</td>';
                                echo '<td><a class="btn btn-primary" href="show_cart.php?id='.$row->isbn.'">Add to Cart</a></td>';
                                echo '</tr>';
                            }
                            echo '</table>';
                            echo '<br />';
                            echo 'Total Rows = ' .$result->num_rows;
                            $result->free();
                            $db->close();
                            ?>
                    </div>
                </div>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
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
    Deskripisi : file untuk menampilkan data customer
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">Customers Data</div>
            <div class="card-body">
                <br>
                <a class="btn btn-primary" href="add_customer.php">+ Add Customer Data</a><br /><br />
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    // include our login information
                    session_start(); //inisialisasi session saat ini berdasarkan pengidentifikasi sesi yang diteruskan melalui permintaan GET atau POST
                    require_once('db_login.php'); // memanggil halaman

                    // if(!isset($_SESSION['username'])){
                    //     header('Location: add_customer.php');
                    // }

                    // execute the query
                    $query = " SELECT * FROM customers ORDER BY customerid "; //Klausa ORDER BY digunakan untuk mengurutkan hasil-set dalam urutan menaik atau menurun
                    $result = $db->query($query);
                    if (!$result) {
                        die("Could not the query the database: <br />" . $db->error . "<br>Query: " . $query);
                    }

                    // fetch and display data using foreach
                    $i = 1;
                    ?>
                    <?php foreach ($result as $res) : ?>
                        <tr id=delete<?php echo $res["customerid"]; ?>>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $res["name"]; ?></td>
                            <td><?php echo $res["address"]; ?></td>
                            <td><?php echo $res["city"]; ?></td>
                            <td>
                                <a class="btn btn-warning" href="edit_customer.php?id=<?php echo $res["customerid"]; ?>">Edit</a>
                                <button type="button" onclick="deleteData(<?php echo $res['customerid']; ?>)" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <?php echo 'Total Rows = <span id="total_rows">'   . $result->num_rows . '</span>';
                $result->free();
                $db->close();
                ?>
                <br><br>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
        <div id="add_response"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        function deleteData(id) {
            var conf = confirm("Are you sure, do you really want to delete Customer?");
            if (conf == true) {
                $.ajax({
                    url: "delete_2.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $("#delete" + id).hide('slow');
                    }
                });
                const total_rows = document.getElementById('total_rows').innerHTML;
                document.getElementById('total_rows').innerHTML = total_rows - 1;
            }
        }
    </script>

</body>

</html>
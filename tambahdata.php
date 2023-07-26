<?php

require"connection.php";

if (isset($_POST['add'])) {

    $stmt = $connect->prepare('insert into `book`(`idbuku`, `judul`, `pengarang`, `tahunterbit`, `Isbn`) values(:idbuku,:judul,:pengarang,:tahunterbit,:isbn)');
    $stmt->bindValue('idbuku', $_POST['idbuku']);
    $stmt->bindValue('judul', $_POST['judul']);
    $stmt->bindValue('pengarang', $_POST['pengarang']);
    $stmt->bindValue('tahunterbit', $_POST['tahunterbit']);
    $stmt->bindValue('isbn', $_POST['isbn']);

    $stmt->execute();
    header("location:tambahdata.php");
}
//DELETE

if(isset($_GET['action']) && $_GET['action'] == 'delete') {
$stmt = $connect->prepare('delete from book where idbuku = :idbuku');
$stmt->bindValue('idbuku', $_GET['idbuku']);
$stmt->execute();
}

$stmt = $connect->prepare('select * from book');
$stmt->execute();


?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />


    <style type="text/css">
    td {
        padding: 4px 14px;
    }
    </style>

</head>

<body>

    <div class="col-md-12 container ">
        <form method="post" autocomplete="off">
            <fieldset>
                <a href="index.php">
                    <h1>New Book </h1>
                </a>
                <table cellpadding="2" cellspacing="2">
                    <tr>
                        <td>ID Buku</td>
                        <td><input id="idbuku" type="int" name="idbuku" required></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td><input id="judul" type="text" name="judul" required></td>
                    </tr>
                    <tr>
                        <td>Pengarang</td>
                        <td><input id="pengarang" type="text" name="pengarang" required></td>
                    </tr>
                    <tr>
                        <td>Tahun Terbit</td>
                        <td><input id="tahunterbit" type="text" name="tahunterbit" required></td>
                    </tr>
                    <tr>
                        <td>Isbn</td>
                        <td><input id="isbn" type="text" name="isbn" required></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input class="btn btn-success" type="submit" name="add" value="add"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>

    <!--below is the table where we shell display the data -->
    <div class="container text-center">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Tahun Terbit</th>
                    <th>Isbn</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($book = $stmt->fetch(PDO::FETCH_OBJ)) {?>
                <tr>
                    <td><?php echo $book->idbuku; ?></td>
                    <td><?php echo $book->judul; ?></td>
                    <td><?php echo $book->pengarang; ?></td>
                    <td><?php echo $book->tahunterbit; ?></td>
                    <td><?php echo $book->Isbn; ?></td>
                    <td>
                        <a onclick="return confirm ('Do yuo realy want to delete book?');" class="btn btn-danger"
                            href="tambahdata.php?idbuku=<?php echo $book->idbuku ?>&action=delete">Delete</a>
                        <a class="btn btn-primary" href="edit.php?idbuku=<?php echo $book->idbuku ?>">Edit</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        </script>
    </div>
    <div class="card-footer text-bg-dark p-3 text-center">
        <h6>Copy Right 2023, Andy Mahfudin</h6>
    </div>
</body>

</html>
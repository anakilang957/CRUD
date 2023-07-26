<?php 

require"connection.php";


$stmt = $connect->prepare('select * from book where idbuku = :idbuku');
$stmt->bindValue('idbuku', $_GET['idbuku']);
$stmt->execute();
$book = $stmt->fetch(PDO::FETCH_OBJ);

if(isset($_POST['save'])) {

    //update

    $stmt = $connect->prepare('update book set judul =:judul,pengarang=:pengarang,tahunterbit=:tahunterbit,isbn=:isbn where idbuku =:idbuku');
    $stmt->bindValue('idbuku', $_POST['idbuku']);
    $stmt->bindValue('judul', $_POST['judul']);
    $stmt->bindValue('pengarang', $_POST['pengarang']);
    $stmt->bindValue('tahunterbit', $_POST['tahunterbit']);
    $stmt->bindValue('isbn', $_POST['isbn']);
    $stmt->execute();

    header("location:tambahdata.php");
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>


    <style type="text/css">
    td {
        padding: 4px 14px;
    }
    </style>

</head>

<body class="text-bg-info p-3">

    <div class="col-md-12 ">
        <form method="post" autocomplete="off">
            <fieldset>
                <legend>Edit Book</legend>
                <table cellpadding="2" cellspacing="2">
                    <tr>
                        <td>ID Buku</td>
                        <td><?php echo $book->idbuku; ?>
                            <input type="hidden" name="idbuku" value="<?php echo $book->idbuku; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td><input id="judul" type="text" name="judul" value="<?php echo $book->judul; ?>"></td>
                    </tr>
                    <tr>
                        <td>Pengarang</td>
                        <td><input id="pengarang" type="text" name="pengarang" value="<?php echo $book->pengarang; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tahun Terbit</td>
                        <td><input id="tahunterbit" type="text" name="tahunterbit"
                                value="<?php echo $book->tahunterbit; ?>"></td>
                    </tr>
                    <tr>
                        <td>Isbn</td>
                        <td><input id="isbn" type="text" name="isbn" value="<?php echo $book->Isbn; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input href="tambahdata.php" class="btn btn-primary" type="submit" name="save"
                                value="update"></input></td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
    <br>
    <div class="card-footer text-bg-dark p-3 text-center">
        <h6>Copy Right 2023, Andy Mahfudin</h6>
    </div>
    </br>
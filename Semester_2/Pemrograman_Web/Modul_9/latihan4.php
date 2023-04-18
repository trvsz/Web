<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2 Modul 9</title>
</head>
<body>
    <!-- Form HTML dengan PHP Internal metode Post-->
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        Nama
        <input type="text" name="nama"
            value="<?php
                // isset digunakan untuk mengecek apakah variabel sudah didefinisikan atau belum
                echo (isset($_POST['nama'])) ? $_POST['nama'] : '';
            ?>"
        > <br>
        <input type="submit" value="Submit">
    </form>

    <!-- PHP -->
    <?php
        if (isset($_POST['nama'])) {
            echo $_POST['nama'];
        }
    ?>
</body>
</html>
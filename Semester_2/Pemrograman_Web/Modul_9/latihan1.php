<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1 Modul 9 Metode GET</title>
</head>
<body>
    <!-- Form HTML dengan PHP Internal metode Get-->
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="get">
        Nama
        <input type="text" name="nama"> <br>
        <input type="submit" value="Submit">
    </form>
    
    <!-- PHP -->
    <?php
        if (isset($_GET['nama'])) {
            echo 'Halo, ' . $_GET['nama'];
        }
    ?>
</body>
</html>
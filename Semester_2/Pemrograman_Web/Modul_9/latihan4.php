<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Latihan 3 Modul 9 Nilai Radio Button</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'];?>">
        Jenis Kelamin
        <input type="radio" name="jk" value="Laki-laki"> Laki-laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan <br>
        <input type="submit" value="Submit">
    </form>

    <?php
        if (isset($_POST['jk'])) {
            echo $_POST['jk'];
        }
    ?>
</body>
</html>
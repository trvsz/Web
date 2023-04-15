<!DOCTYPE html>
<html lang="en">
<head> // MASIH ADA BUG
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3 Modul 9 Prefilling Data Radio Button</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        Jenis Kelamin
        <input type="radio" name="jk" value="Pria" checked
            <?php
                if($_POST['jk'] == 'Pria'){
                    echo 'checked="checked"';
                }
            ?>
        > Pria
        <input type="radio" name="jk" value="Wanita"
        <?php
                if($_POST['jk'] == 'Wanita'){
                    echo 'checked="checked"';
                }
            ?>
        > Wanita <br>
        <input type="submit" value="Submit">
    </form>
    <?php
        if (isset($_POST['jk'])) {
            echo $_POST['jk'];
        }
    ?>
</body>
</html>
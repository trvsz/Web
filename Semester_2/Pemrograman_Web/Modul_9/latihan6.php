<!DOCTYPE html>
<html lang="en">
<head> <!-- MASIH ADA BUG -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3 Modul 9 Prefilling Data Radio Button</title>
</head>
<body>
    <!-- Form HTML dengan PHP Internal metode Post -->
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        Jenis Kelamin
        <input type="radio" name="jk" value="Pria" checked
            <?php
                // Jika yang dipilih adalah Pria
                if($_POST['jk'] == 'Pria'){
                    // Maka akan menampilkan checked
                    echo 'checked="checked"';
                }
            ?>
        > Pria
        <input type="radio" name="jk" value="Wanita"
        <?php
                // Jika yang dipilih adalah Wanita
                if($_POST['jk'] == 'Wanita'){
                    // Maka akan menampilkan checked
                    echo 'checked="checked"';
                }
            ?>
        > Wanita <br>
        <!-- Tombol Submit -->
        <input type="submit" value="Submit">
    </form>
    
    <!-- PHP -->
    <?php
        // Jika variabel jk sudah didefinisikan
        if (isset($_POST['jk'])) {
            // Maka akan menampilkan nilai dari variabel jk (checked)
            echo $_POST['jk'];
        }
    ?>
</body>
</html>
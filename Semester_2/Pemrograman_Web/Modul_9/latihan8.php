<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 5 Modul 9 Nilai Check Box</title>
</head>
<body>
    <!-- Form HTML dengan PHP Internal metode Post -->
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        Jenis Kelamin
        <!-- List Hobby (berbentuk Arrays) yang dapat dipilih -->
        <input type="checkbox" name="hobby[]" value="Membaca">Membaca
        <input type="checkbox" name="hobby[]" value="Olahraga">Olahraga
        <input type="checkbox" name="hobby[]" value="Menyanyi">Menyanyi <br>
        <input type="submit" value="Submit">
    </form>

    <!-- PHP -->
    <?php
        // jika variabel hobby sudah didefinisikan
        if (isset($_POST['hobby'])) {
            // setiap masiny-masing nilai variabel array hobby
            foreach ($_POST['hobby'] as $key => $val) {
                // menampilkan nilai dari variabel array hobby dengan key dan value
                echo $key . ' -> ' . $val . '<br>';
            }
        }
    ?>
</body>
</html>
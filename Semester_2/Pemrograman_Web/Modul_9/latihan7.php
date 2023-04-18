<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 4 Modul 9 Seleksi Nilai</title>
</head>
<body>
    <!-- Form HTML dengan PHP Internal metode Post -->
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        Pekerjaan
        <!-- Selection -->
        <select name="job">
            <!-- Opsi Selection -->
            <option value="Mahasiswa">Mahasiswa</option>
            <option value="ABRI">ABRI</option>
            <option value="PNS">PNS</option>
            <option value="Swasta">Swasta</option>
        </select> <br>
        <!-- Tombol Submit -->
        <input type="submit" value="Submit">
    </form>

    <!-- PHP -->
    <?php
        // jika variabel job sudah didefinisikan
        if (isset($_POST['job'])) {
            // menampilkan nilai variabel job
            echo $_POST['job'];
        }
    ?>
</body>
</html>
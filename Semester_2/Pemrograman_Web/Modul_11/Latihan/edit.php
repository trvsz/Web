<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="judul">
        <h1>Edit Data</h1>
    </div>

    <br>

    <a href="latihan.php">Lihat Semua Data</a>

    <br>
    <h3>Edit Data</h3>

    <?php
        include "koneksi.php";
        $id = $_GET['id'];
        $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'") or die(mysqli_error($koneksi));
        $no = 1;
        while($d = mysqli_fetch_array($data)){
    ?>
        <form action="update.php" method="post">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                        <input type="text" name="nama" value="<?php echo $d['nama'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="<?php echo $d['alamat'] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan"></td>
            </table>
        </form>
    <?php } ?>
</body>
</html>
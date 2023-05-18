<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data</title>
</head>
<body>
    <div class="judul">
        <h1>Detail Data</h1>
    </div>
    <br>
    <br>
    <?php
        include "koneksi.php";
        $id = $_GET['id'];
        $query_mysql = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
        $no = 1;
        while($data = mysqli_fetch_array($query_mysql)){
    ?>
        <table>
            <tr>
                <td>NIM</td>
                <td>: <?php echo $d['nim'] ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <?php echo $d['nama'] ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?php echo $d['alamat'] ?></td>
            </tr>
            <tr></tr>
        </table>
    <?php } ?>
    <a href="latihan.php">Kembali Lihat Semua Data</a>
</body>
</html>
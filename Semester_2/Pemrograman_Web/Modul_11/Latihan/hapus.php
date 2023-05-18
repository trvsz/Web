<?php
    include "koneksi.php";
    $nim = $_GET['nim'];
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$nim'") or die(mysqli_error($koneksi));
    header("location:latihan.php?pesan=hapus");
?>
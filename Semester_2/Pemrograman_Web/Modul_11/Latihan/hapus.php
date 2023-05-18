<?php
    include "koneksi.php";
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'") or die(mysqli_error($koneksi));
    header("location:latihan.php?pesan=hapus");
?>
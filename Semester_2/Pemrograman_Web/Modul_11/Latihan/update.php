<?php
    include "koneksi.php";
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', alamat='$alamat' WHERE id='$id'") or die(mysqli_error($koneksi));
    header("location:latihan.php?pesan=update");
?>
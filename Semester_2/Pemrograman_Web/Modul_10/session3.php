<?php
    session_start();
    if (isset($_SESSION['login'])) { // jika sudah login
        unset($_SESSION); // menghapus variabel session
        session_destroy(); // menghapus semua session
        echo "<h1>Anda sudah berhasil LOG OUT</h1>";
        echo "<h2>Klik <a href='session1.php'>di sini</a> untuk LOGIN kembali</h2>";
    }
?>
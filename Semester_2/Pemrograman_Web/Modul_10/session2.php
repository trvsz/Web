<?php
    session_start();
    if (isset($_SESSION['login'])) {
        echo "<h1>Selamat Datang, " . $_SESSION['login'] . "</h1>";
        echo "<h2>Beranda</h2>";
        echo "<p><a href='session3.php'>Log Out</a></p>";
    } else {
        die("Anda belum login! Anda tidak berhak masuk ke halaman ini. Silahkan login <a href='session1.php'>di sini</a>");
    }
?>
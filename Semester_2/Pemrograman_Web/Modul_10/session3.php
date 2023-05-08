<?php
    session_start();
    if (isset($_SESSION['login'])) {
        unset($_SESSION);
        session_destroy();
        echo "<h1>Anda sudah berhasil LOG OUT</h1>";
        echo "<h2>Klik <a href='session1.php'>di sini</a> untuk LOGIN kembali</h2>";
    }
?>
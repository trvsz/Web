<?php
    // set the expiration date to one hour ago
    setcookie("TestCookie1", "", time()-3600); //3600 sec = 1 hour
    setcookie("TestCookie2", "", time()-3600);
    echo "<h1>Cookies berhasil dihapus</h1>";
    echo "<h2>Klik di <a href='cookies2.php'>sini</a> untuk pemeriksaan cookies</h2>";
?>
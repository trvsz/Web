<?php
    $value1 = 'test';
    $value2 = 'another test';
    setcookie("TestCookie1", $value1);
    setcookie("TestCookie2", $value2, time()+3600); // expire in 1 hour
    echo "<h1>Ini halaman set cookie</h1>";
    echo "<h2>Klik di <a href='cookies2.php'>sini</a> untuk pemeriksaan cookies</h2>";
?>
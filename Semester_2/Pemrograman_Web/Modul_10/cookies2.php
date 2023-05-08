<?php
    if (isset($_COOKIE['TestCookie1'])) {
        echo "<h1>Cookie 'TestCookie1' ada</h1><br>Isinya : " . $_COOKIE['TestCookie1'];
    } else {
        echo "<h1>Cookie 'TestCookie1' TIDAK ada.</h1>";
    }

    if (isset($_COOKIE['TestCookie2'])) {
        echo "<h1>Cookie 'TestCookie2' ada</h1><br>Isinya : " . $_COOKIE['TestCookie2'];
    } else {
        echo "<h1>Cookie 'TestCookie2' TIDAK ada.</h1>";
    }

    echo "<h1>Klik di <a href='cookies3.php'>sini</a> untuk menghapus cookies.</h1>";
?>
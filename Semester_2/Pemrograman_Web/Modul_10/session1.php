<?php
    session_start();
    if (isset($_POST['login'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        //periksa login
        if ($user == "abc" && $pass == "123") {
            //menciptakan session
            $_SESSION['login'] = $user;
            //menuju ke halaman pemeriksaan session
            echo "<h1>Anda berhasil LOGIN</h1>";
            echo "<h2>Klik <a href='session2.php'>di sini (session2.php)</a> untuk menuju ke halaman pemeriksaan session";
        }
    } else {
        ?>
        <html>
            <head>
                <title>Login</title>
            </head>
            <body>
                <form action="" method="post">
                    <h2>Login</h2>
                    Username : <input type="text" name="user"><br>
                    Password : <input type="password" name="pass"><br>
                    <input type="submit" name="login" value="Log In">
                </form>
            </body>
        </html>
    <?php
    }
?>
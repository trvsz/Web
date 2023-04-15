<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            if (username == "" || password == "") {
                alert("ID/Username dan Password harus diisi.");
                document.getElementById("username").focus();
                return false;
            }
            if (!/^[a-zA-Z]+$/.test(username) || !/^[a-zA-Z]+$/.test(password)) {
                alert("ID/Username dan Password harus berupa huruf.");
                document.getElementById("username").focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()">
        <input type="text" name="username" id="username" placeholder="Username">
        <input type="password" name="password" id="password" placeholder="Password">
        <input type="submit" value="Login">
    </form>
    
    <?php
        if (isset($_POST['nama']) || isset($_POST['password'])) {
            if ($_POST['username'] === "admin" && $_POST['password'] === "admin") {
                echo "Selamat datang, " . $_POST['username'] . "!";
            } else {
                echo "Login gagal. ID/Username atau Password salah.";
            }
        }
    ?>
</body>
</html>
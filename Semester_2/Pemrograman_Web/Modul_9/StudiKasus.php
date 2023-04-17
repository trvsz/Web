<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
        crossorigin="anonymous">
    </script>
    
    <title>Document</title>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            if (username == "" || password == "") {
                alert("ID/Username dan Password harus diisi.");
                document.getElementById("username").focus();
                document.getElementById("username").select();
                return false;
            }
            if (!/^[a-zA-Z]+$/.test(username) || !/^[a-zA-Z]+$/.test(password)) {
                alert("ID/Username dan Password harus berupa huruf.");
                document.getElementById("username").focus();
                document.getElementById("username").select();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container text-center col-12 col-md-8 col-lg-3">
        <div class="card" style="margin-top: 20%; margin-bottom: 50px;">
            <h1 style="margin-top: 20px; margin-bottom: 15px;">SIGN IN</h1>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()">
                <div class="container text-center">
                    <div>
                        <input class="form-control" type="text" name="username" id="username" placeholder="USERNAME" style="margin-bottom: 10px;">
                    </div>
                    <div>
                        <input class="form-control" type="password" name="password" id="password" placeholder="PASSWORD">
                    </div>
                </div>
                <input type="submit" value="Log In" style="margin-top: 20px; margin-bottom: 30px;">
            </form>
        </div>
    </div>
    
    <?php
        if (isset($_POST['nama']) || isset($_POST['password'])) {
            if ($_POST['username'] === "admin" && $_POST['password'] === "admin") {
                echo "<p align=center> <font color=green size=5px> Selamat Datang, " . $_POST['username'] . "!";
            } else {
                echo "<p align=center> <font color=red size=5px> Login gagal. ID/Username atau Password salah.";
            }
        }
    ?>
</body>
</html>
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
    
    <title>Login Page</title>

    <!-- Script JS -->
    <script>
        // Fungsi untuk validasi form
        function validateForm() {
            // Mengambil nilai dari inputan username dan password
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            // Validasi inputan username dan password
            if (username == "" || password == "") { // Jika username dan password kosong
                alert("ID/Username dan Password harus diisi."); // Munculkan pesan
                document.getElementById("username").focus(); // Fokus ke inputan username
                document.getElementById("username").select(); // Pilih semua teks yang ada di inputan username
                return false; // Menghentikan proses submit
            }
            if (!/^[a-zA-Z]+$/.test(username) || !/^[a-zA-Z]+$/.test(password)) { // Jika username dan password tidak berupa huruf
                alert("ID/Username dan Password harus berupa huruf."); // Munculkan pesan
                document.getElementById("username").focus(); // Fokus ke inputan username
                document.getElementById("username").select(); // Pilih semua teks yang ada di inputan username
                return false; // Menghentikan proses submit
            }
            return true; // Mengembalikan nilai true
        }
    </script>
</head>
<body>
    <!-- Form HTML sederhana -->
    <div class="container text-center col-12 col-md-8 col-lg-3">
        <div class="card" style="margin-top: 20%; margin-bottom: 50px;">
            <h1 style="margin-top: 20px; margin-bottom: 15px;">SIGN IN</h1>
            <!-- Form dikaitkan dengan PHP dan JS sebagai penyaring input maupun hasil dari input-->
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
    
    <!-- PHP -->
    <?php
        // jika form sudah diisi
        if (isset($_POST['nama']) || isset($_POST['password'])) { 
            // jika username dan password sesuai dengan yang ditentukan
            if ($_POST['username'] === "admin" && $_POST['password'] === "admin") {
                // tampilkan pesan login berhasil
                echo "<p align=center> <font color=green size=5px> Selamat Datang, " . $_POST['username'] . "!";
            } else { // jika username dan password tidak sesuai dengan yang ditentukan
                // tampilkan pesan login gagal
                echo "<p align=center> <font color=red size=5px> Login gagal. ID/Username atau Password salah.";
            }
        }
    ?>
</body>
</html>
<!-- PHP -->
<?php
    session_start(); // memulai session
    // jika tombol logout diklik
    if (isset($_POST['logout'])) {
        unset($_SESSION);
        session_destroy();
        echo "<p align=center> <font color=green size=5px> Anda berhasil Log Out.";
        echo "<p align=center> <font color=green si ze=5px> Redirecting to login page...";
        header('Refresh:2 ; URL=StudiKasus.php');
        exit;
    }
    // jika form sudah diisi
    if (isset($_POST['nama']) || isset($_POST['password'])) { 
        // jika username dan password sesuai dengan yang ditentukan
        if ($_POST['username'] === "admin" && $_POST['password'] === "admin") {
            $_SESSION['masuk'] = $_POST['username'];
            // masuk ke halaman login page
            if (isset($_SESSION['masuk'])) { ?>
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
                    <title>Home Page</title>
                </head>
                <body>
                    <!-- Halaman Web Sederhana -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light ms-2 me-2">
                        <a class="navbar-brand" href="#">StudiKasus</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Support</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                            </ul>
                        </div>
                        <form method="post">
                            <input type="submit" name="logout" value="Log Out">
                        </form>
                    </nav>
                </body>
                </html> <?php
            } else { 
                die("Anda belum login! Anda tidak berhak masuk ke halaman ini. Silahkan login <a href='StudiKasus.php'>di sini</a>"); // jika belum login jangan melanjutkan
            }
        } else { // jika username dan password tidak sesuai dengan yang ditentukan
            // tampilkan pesan login gagal
            echo "<p align=center> <font color=red size=5px> Login gagal. ID/Username atau Password salah.";
            echo "<p align=center> <font color=green size=5px> Redirecting to login page...";
            header('Refresh:2 ; URL=StudiKasus.php');
        }
    } else { ?>
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
                        <input type="submit" value="Log In" style="margin-top: 20px; margin-bottom: 30px;" name="masuk">
                    </form>
                </div>
            </div>
        </body>
        </html> <?php
    }
?>
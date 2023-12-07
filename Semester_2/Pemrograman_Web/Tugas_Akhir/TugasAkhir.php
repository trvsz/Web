<?php
    session_start();

    // Deklarasi variabel
    $route = "login_page";
    $message = null;
    $host = "localhost";
    $database = "db_universitas";
    $username = "root";
    $password = "root";
    $connect = mysqli_connect($host, $username, $password, $database);

    // Cek koneksi
    if ($connect -> connect_errno) {
        die("Connection Failed: " . $connect -> connect_errno);
    }

    // Cek session
    if (isset($_SESSION['username'])) {
        $route = "home_page";
    } else {
        $route = "login_page";
    }

    // Routing
    if (isset($_POST['login_submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connect, $query); // Menjalankan query
        
        // Cek username dan password
        if (mysqli_num_rows($result) == 1) { // Jumlah baris yang dihasilkan dari query
            $data = mysqli_fetch_array($result);
            $_SESSION['username'] = $username;
            $route = "home_page";
            $_SESSION['route'] = "home_page";
        } else {
            $message = (object) [
                "type" => "danger",
                "text" => "ID/Username atau Password salah"
            ];
            $route = "login_page";
        }
    }

    // Menuju halaman Register
    if (isset($_POST['register_to'])) {
        $route = "register_page";
    }

    // Register
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $query = "SELECT COUNT(*) AS total FROM tb_user WHERE username = '$username'";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result); // Mengambil data dari database
        $total = $row['total']; // Mengambil data total dari database
        // Cek kesamaan username dalam database
        if ($total > 0) {
            $message = (object) [
                "type" => "danger",
                "text" => "Username sudah ada dalam database. Harap masukkan Username yang berbeda."
            ];
            $route = "register_page";
        // Cek kesamaan password dan confirm password
        } elseif ($password != $confirm_password) {
            $message = (object) [
                "type" => "danger",
                "text" => "Password dan Confirm Password tidak sama. Harap masukkan Password yang sama."
            ];
            $route = "register_page";
        // Jika username dan password sudah benar
        } else {
            $query = "INSERT INTO tb_user (username, password) VALUES ('$username', '$password')";
            $result = mysqli_query($connect, $query);
            // Cek apakah data berhasil ditambahkan
            if ($result) {
                $message = (object) [
                    "type" => "success",
                    "text" => "Akun BERHASIL Dibuat"
                ];
            // Jika data gagal ditambahkan
            } else {
                $message = (object) [
                    "type" => "danger",
                    "text" => "Akun GAGAL Dibuat"
                ];
            }
            $route = "login_page";
        }
    }

    // Menuju halaman Reset Password
    if (isset($_POST['reset_password_to'])) {
        $route = "reset_password_page";
    }

    // Reset Password
    if (isset($_POST['reset_password_submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $query = "SELECT COUNT(*) AS total FROM tb_user WHERE username = '$username'";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
        // Cek kesamaan username dalam database
        if ($total == 0) {
            $message = (object) [
                "type" => "danger",
                "text" => "Username tidak ada dalam database. Harap masukkan Username yang benar."
            ];
            $route = "reset_password_page";
        // Cek kesamaan password dan confirm password
        } elseif ($password != $confirm_password) {
            $message = (object) [
                "type" => "danger",
                "text" => "Password dan Confirm Password tidak sama. Harap masukkan Password yang sama."
            ];
            $route = "reset_password_page";
        // Jika username dan password sudah benar
        } else {
            $query = "UPDATE tb_user SET password = '$password' WHERE username = '$username'";
            $result = mysqli_query($connect, $query);
            // Cek apakah data berhasil diubah
            if ($result) {
                $message = (object) [
                    "type" => "success",
                    "text" => "Password BERHASIL Diubah"
                ];
            // Jika data gagal diubah
            } else {
                $message = (object) [
                    "type" => "danger",
                    "text" => "Password GAGAL Diubah"
                ];
            }
            $route = "login_page";
        }
    }

    // Log Out
    if (isset($_POST['logout'])) {
        session_destroy();
        $route = "login_page";
    }

    // Penambahan Data
    if (isset($_POST['add_data'])) {
        $fakultas = $_POST['fakultas'];
        $prodi = $_POST['prodi'];
        $nama = $_POST['nama'];
        $nip = $_POST['nip'];
        $pendidikan = $_POST['pendidikan'];
        $golongan = $_POST['golongan'];
        $pangkat = $_POST['pangkat'];
        $jabatan = $_POST['jabatan'];
        $status = $_POST['status'];
        $email = $_POST['email'];
    
        // Cek kesamaan NIP dalam database
        $existingNIPQuery = "SELECT COUNT(*) AS total FROM tb_dosen WHERE nip = '$nip'";
        $existingNIPResult = mysqli_query($connect, $existingNIPQuery);
        $rowNIP = mysqli_fetch_assoc($existingNIPResult);
        $totalExistingNIP = $rowNIP['total'];
        // Cek kesamaan Email dalam database
        $existingEmailQuery = "SELECT COUNT(*) AS total FROM tb_dosen WHERE email = '$email'";
        $existingEmailResult = mysqli_query($connect, $existingEmailQuery);
        $rowEmail = mysqli_fetch_assoc($existingEmailResult);
        $totalExistingEmail = $rowEmail['total'];
        // Jika NIP sudah ada dalam database
        if ($totalExistingNIP > 0) {
            $message = (object) [
                "type" => "danger",
                "text" => "NIP sudah ada dalam database. Harap masukkan NIP yang berbeda."
            ];
            $route = "home_page";
        // Jika Email sudah ada dalam database
        } elseif ($totalExistingEmail > 0) {
            $message = (object) [
                "type" => "danger",
                "text" => "Email sudah ada dalam database. Harap masukkan Email yang berbeda."
            ];
            $route = "home_page";
        // Jika NIP dan Email belum ada dalam database
        } else {
            $query = "INSERT INTO tb_dosen (fakultas, prodi, nama, nip, pendidikan, golongan, pangkat, jabatan, status, email) VALUES ('$fakultas', '$prodi', '$nama', '$nip', '$pendidikan', '$golongan', '$pangkat', '$jabatan', '$status', '$email')";
            $result = mysqli_query($connect, $query);
            // Cek apakah data berhasil ditambahkan
            if ($result) {
                $message = (object) [
                    "type" => "success",
                    "text" => "Data BERHASIL Ditambahkan"
                ];
            // Jika data gagal ditambahkan
            } else {
                $message = (object) [
                    "type" => "danger",
                    "text" => "Data GAGAL Ditambahkan"
                ];
            }
            $route = "home_page";
        }
    }

    // Menuju halaman Lihat Data
    if (isset($_POST['view_to'])) {
        $id = $_POST['id'];
        $query = "SELECT * FROM tb_dosen WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($result);
        $route = "view_page";
    }

    // Menuju halaman Edit Data
    if (isset($_POST['edit_to'])) {
        $id = $_POST['id'];
        $query = "SELECT * FROM tb_dosen WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($result);
        $route = "edit_page";
    }

    // Edit Data
    if (isset($_POST['edit_data'])) {
        $fakultas = $_POST['fakultas'];
        $prodi = $_POST['prodi'];
        $nama = $_POST['nama'];
        $nip = $_POST['nip'];
        $pendidikan = $_POST['pendidikan'];
        $golongan = $_POST['golongan'];
        $pangkat = $_POST['pangkat'];
        $jabatan = $_POST['jabatan'];
        $status = $_POST['status'];
        $email = $_POST['email'];
        $query = "UPDATE tb_dosen SET fakultas = '$fakultas', prodi = '$prodi', nama = '$nama', pendidikan = '$pendidikan', golongan = '$golongan', pangkat = '$pangkat', jabatan = '$jabatan', status = '$status', email = '$email' WHERE nip = '$nip'";
        $result = mysqli_query($connect, $query);
        // Cek apakah data berhasil diubah
        if ($result) {
            $message = (object) [
                "type" => "success",
                "text" => "Data BERHASIL Diubah"
            ];
        // Jika data gagal diubah
        } else {
            $message = (object) [
                "type" => "danger",
                "text" => "Data GAGAL Diubah"
            ];
        }
        $route = "home_page";
    }

    // Delete Data
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM tb_dosen WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        // Cek apakah data berhasil dihapus
        if ($result) {
            $message = (object) [
                "type" => "success",
                "text" => "Data BERHASIL Dihapus"
            ];
        // Jika data gagal dihapus
        } else {
            $message = (object) [
                "type" => "danger",
                "text" => "Data GAGAL Dihapus"
            ];
        }
        $route = "home_page";
    }
?>

<!-- Halaman Web Sederhana -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Tugas Akhir" 
        content="Author: Travis Zusa Zuve Saputra, 22537141013, I.1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
        crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="styleTugasAkhir.css">
    
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <!-- Script JS -->
    <script>
        // Pemuatan DataTables setelah HTML dimuat
        $(document).ready(function() {
            $('#data').DataTable({
                responsive: true
            });
        });
        // Validasi Log In
        function validateForm_Login() {
            let username = document.forms["login_form"]["username"].value;
            let password = document.forms["login_form"]["password"].value;
            if (username == "" || password == "") {
                alert("ID/Username dan Password harus diisi."); // Munculkan pesan
                document.getElementById("username").focus(); // Fokus ke inputan username
                document.getElementById("username").select(); // Pilih semua teks yang ada di inputan username
                return false; // Menghentikan proses submit
            }
            if (!/^[a-zA-Z]+$/.test(username) || !/^[a-zA-Z]+$/.test(password)) { 
                alert("ID/Username dan Password harus berupa huruf."); 
                document.getElementById("username").focus(); 
                document.getElementById("username").select(); 
                return false;
            }
            return true;
        }

        // Validasi Register
        function validateForm_Register() {
            let username = document.forms["register_form"]["username"].value;
            let password = document.forms["register_form"]["password"].value;
            let confirm_password = document.forms["register_form"]["confirm_password"].value;
            if (username == "" || password == "" || confirm_password == "") {
                alert("Username dan Password harus diisi."); // Munculkan pesan
                document.getElementById("username").focus(); // Fokus ke inputan username
                document.getElementById("username").select(); // Pilih semua teks yang ada di inputan username
                return false; // Menghentikan proses submit
            }
            if (!/^[a-zA-Z]+$/.test(username) || !/^[a-zA-Z]+$/.test(password) || !/^[a-zA-Z]+$/.test(confirm_password)) { 
                alert("Username dan Password harus berupa huruf."); 
                document.getElementById("username").focus(); 
                document.getElementById("username").select(); 
                return false;
            }
            return true;
        }

        // Validasi Reset Password
        function validateForm_Reset() {
            let username = document.forms["reset_password_form"]["username"].value;
            let password = document.forms["reset_password_form"]["password"].value;
            let confirm_password = document.forms["reset_password_form"]["confirm_password"].value;
            if (username == "" || password == "" || confirm_password == "") {
                alert("Username dan Password harus diisi."); // Munculkan pesan
                document.getElementById("username").focus(); // Fokus ke inputan username
                document.getElementById("username").select(); // Pilih semua teks yang ada di inputan username
                return false; // Menghentikan proses submit
            }
            if (!/^[a-zA-Z]+$/.test(username) || !/^[a-zA-Z]+$/.test(password) || !/^[a-zA-Z]+$/.test(confirm_password)) { 
                alert("Username dan Password harus berupa huruf."); 
                document.getElementById("username").focus(); 
                document.getElementById("username").select(); 
                return false;
            }
            return true;
        }

        // Validasi NIP
        function validateNIP() {
            var nip = document.getElementById("nip").value;
            if (!/^[0-9]+$/.test(nip)) {
                alert("NIP harus berupa ANGKA.");
                document.getElementById("nip").focus();
                document.getElementById("nip").select();
                return false;
            }
            return confirmAdding();
        }

        // Alert Konfirmasi
        function confirmAdding() {
            return confirm("Apakah Anda yakin ingin menambahkan data tersebut?"); // Munculkan pesan konfirmasi
        }
        function confirmEditing() {
            return confirm("Apakah Anda yakin ingin mengubah data tersebut?"); 
        }
        function confirmDeleting() {
            return confirm("Apakah Anda yakin ingin menghapus data tersebut?");
        }
        function confirmLogOut() {
            return confirm("Apakah Anda yakin ingin keluar?"); 
        }

        // Waktu Alert
        setTimeout(function() {
            document.getElementById("alert").style.display = "none";
        }, 3000);

        // Reload halaman ketika ukuran layar berubah
        window.addEventListener('resize', function() {
            location.reload();
        });
    </script>
    <title>Database Dosen</title>
</head>
<body>
    <!-- Alert -->
    <?php if (isset($message)): ?>
        <div id="alert" class="alert <?= $message->type == "success" ? "alert-success" : "alert-danger" ?> alert-fixed-top">
            <?= $message->text ?>
        </div>
    <?php endif; ?>
    <!-- Rute Halaman Web -->
    <?php if ($route == "home_page") : ?>
    <!-- Rute Halaman Home -->
        <nav class="navbar navbar-expand navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">DBU</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav">
                        <a class="nav-link" href="#TabelDosen">Tabel Dosen</a>
                        <a class="nav-link" href="#">Add Data</a>
                    </div>
                </div>
                <form method="post" onsubmit="return confirmLogOut()">
                    <input type="submit" class="btn btn-danger" name="logout" value="Log Out">
                </form>
            </div>
        </nav>
        <div class="container container-add-data">
            <div class="box box-view">
                <h1 class="text-center mt-1 mb-3 me-1 ms-1">
                    Add Data
                </h1>
                <div class="container">
                    <form action="" method="post" onsubmit="return validateNIP()">
                        <table class="w-100 mb-2">
                            <tr>
                                <td>NIP<span style="color: red;">*</span></td>
                                <td><input type="text" class="form-control" name="nip" id="nip" placeholder="Contoh: 22537141013" required></td>
                            </tr>
                            <tr>
                                <td>Nama<span style="color: red;">*</span></td>
                                <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Contoh: Travis Zusa Zuve Saputra" required></td>
                            </tr>
                            <tr>
                                <td>Email<span style="color: red;">*</span></td> 
                                <td><input type="email" class="form-control" name="email" id="email" placeholder="Contoh: traviszusa.2022@student.uny.ac.id" required></td>
                            </tr>
                            <tr>
                                <td>Fakultas</td>
                                <td><input type="text" class="form-control" name="fakultas" id="fakultas" placeholder="Contoh: FT JPTEI"></td>
                            </tr>
                            <tr>
                                <td>Prodi</td>
                                <td><input type="text" class="form-control" name="prodi" id="prodi" placeholder="Contoh: Teknologi Informasi"></td>
                            </tr>
                            <tr>
                                <td>Gelar</td>
                                <td><input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Contoh: S.H., M.H."></td>
                            </tr>
                            <tr>
                                <td>Golongan</td>
                                <td><input type="text" class="form-control" name="golongan" id="golongan" placeholder="Contoh: III/b"></td>
                            </tr>
                            <tr>
                                <td>Pangkat</td>
                                <td><input type="text" class="form-control" name="pangkat" id="pangkat" placeholder="Contoh: Penata Muda Tingkat I"></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td><input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Contoh: Asisten Ahli"></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><input type="text" class="form-control" name="status" id="status" placeholder="Contoh: PNS"></td>
                            </tr>
                        </table>
                        <span style="color: red; font-size: 13px;">* Kolom wajib diisi</span>
                        <div class="container-right">
                            <div class="gap-2 d-md-block mt-2 mb-2">
                                <button class="btn btn-success" type="submit" name="add_data">Add</button>
                                <button class="btn btn-warning" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container container-custom mb-5" id="TabelDosen">
            <div class="box box-table mx-auto">
                <h1 class="text-center mt-1 mb-3 me-1 ms-1">
                    Data Dosen
                </h1>
                <table class="table table-responsive hover order-column row-border cell-border" id="data">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIP</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Action</t>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM tb_dosen";
                            $result = mysqli_query($connect, $query);
                            $no = 1;
                            while ($data = mysqli_fetch_array($result)) :
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $data['nip'] ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td class="text-center"><?= $data['email'] ?></td>
                                <td class="text-center">
                                    <div class="container container-custom">
                                        <div class="d-grid gap-2 d-md-block">
                                            <div class="btn-group">
                                                <div>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                        <button class="btn btn-info w-100" type="submit" name="view_to">View</button>  
                                                    </form>
                                                </div>
                                                <div class="me-1 ms-1">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                        <button class="btn btn-primary w-100" type="submit" name="edit_to">Edit</button>
                                                    </form>
                                                </div>
                                                <div>
                                                    <form action="" method="post" onsubmit="return confirmDeleting()">
                                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                        <button class="btn btn-danger w-100" type="submit" name="delete">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr> 
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php elseif ($route == "login_page"): ?>
        <!-- Rute Halaman Login -->
        <div class="container container-custom text-center">
            <div class="box box-login" style="margin-top: 150px;">
                <h1 class="mt-2 mb-4">LOGIN</h1>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm_Login()" name="login_form">
                    <div class="container text-center pe-3 ps-3 mb-2">
                        <div>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username" style="margin-bottom: 10px;">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                        </div>
                    </div>
                    <input class="btn btn-primary mt-3 mb-2" type="submit" value="Log In" name="login_submit">
                </form>
                <div class="container">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <input class="button" style="border: hidden; background-color: transparent; color: blue; font-size: 12px;" type="submit" value="Forgot Password?" name="reset_password_to">
                    </form>
                </div>
                <div class="container">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <span style="font-size: 12px;">Create Account?</span>
                        <input class="button" style="border: hidden; background-color: transparent; color: blue; font-size: 12px;" type="submit" value="Register" name="register_to">
                    </form>
                </div>
            </div>
        </div>
    <?php elseif ($route == "register_page"): ?>
        <!-- Rute Halaman Registrasi -->
        <div class="container container-custom text-center">
            <div class="box box-login" style="margin-top: 150px;">
                <h1 class="mt-2 mb-4">REGISTER</h1>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm_Register()" name="register_form">
                    <div class="container text-center pe-3 ps-3">
                        <div>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username" style="margin-bottom: 10px;">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" style="margin-bottom: 10px;">
                            <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="container container-custom mt-4 mb-2">
                        <div class="gap-2 d-md-block">
                            <button class="btn btn-primary" type="submit" name="register">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
                <span style="font-size: 12px;">Kembali ke Halaman <a href="" class="text-decoration-none" style="font-size: 12px;">Login</a></span>
            </div>
        </div>
    <?php elseif ($route == "reset_password_page"): ?>
        <!-- Rute Halaman Reset Password -->
        <div class="container container-custom text-center">
            <div class="box box-login" style="margin-top: 150px;">
                <h1 class="mt-2 mb-4">CONFIRM USERNAME</h1>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm_Reset()" name="reset_password_form">
                    <div class="container text-center pe-3 ps-3">
                        <input class="form-control" type="username" name="username" id="username" placeholder="Username" style="margin-bottom: 10px;">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" style="margin-bottom: 10px;">
                        <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                    </div>
                    <div class="container container-custom mt-4 mb-2">
                        <div class="gap-2 d-md-block">
                            <button class="btn btn-primary" type="submit" name="reset_password_submit">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
                <span style="font-size: 12px;">Kembali ke Halaman <a href="" class="text-decoration-none" style="font-size: 12px;">Login</a></span>
            </div>
        </div>
    <?php elseif ($route == "edit_page"): ?>
        <!-- Rute Halaman Edit -->
        <div class="container container-view-edit" style="margin-top: 130px;">
            <div class="box box-view">
                <h1 class="text-center mt-1 mb-3 me-1 ms-1">
                    <?=$data['nama']?>
                </h1>
                <div class="container">
                    <form action="" method="post" onsubmit="return confirmEditing()">
                        <input type="hidden" name="id" value="<?php $data['id'] ?>">
                        <table class="w-100 mb-2">
                            <tr>
                                <td>NIP<span style="color: red;">*</span></td>
                                <td><input type="text" class="form-control" name="nip" id="nip" value="<?= $data['nip'] ?>" placeholder="Contoh: 22537141013" required></td>
                            </tr>
                            <tr>
                                <td>Nama<span style="color: red;">*</span></td>
                                <td><input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama'] ?>" placeholder="Contoh: Travis Zusa Zuve Saputra" required></td>
                            </tr>
                            <tr>
                                <td>Email<span style="color: red;">*</span></td> 
                                <td><input type="email" class="form-control" name="email" id="email" value="<?= $data['email'] ?>" placeholder="Contoh: traviszusa.2022@student.uny.ac.id" required></td>
                            </tr>
                            <tr>
                                <td>Fakultas</td>
                                <td><input type="text" class="form-control" name="fakultas" id="fakultas" value="<?= $data['fakultas'] ?>" placeholder="Contoh: FT JPTEI"></td>
                            </tr>
                            <tr>
                                <td>Prodi</td>
                                <td><input type="text" class="form-control" name="prodi" id="prodi" value="<?= $data['prodi'] ?>" placeholder="Contoh: Teknologi Informasi"></td>
                            </tr>
                            <tr>
                                <td>Gelar</td>
                                <td><input type="text" class="form-control" name="pendidikan" id="pendidikan" value="<?= $data['pendidikan'] ?>" placeholder="Contoh: S.H., M.H."></td>
                            </tr>
                            <tr>
                                <td>Golongan</td>
                                <td><input type="text" class="form-control" name="golongan" id="golongan" value="<?= $data['golongan'] ?>" placeholder="Contoh: III/b"></td>
                            </tr>
                            <tr>
                                <td>Pangkat</td>
                                <td><input type="text" class="form-control" name="pangkat" id="pangkat" value="<?= $data['pangkat'] ?>" placeholder="Contoh: Penata Muda Tingkat I"></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td><input type="text" class="form-control" name="jabatan" id="jabatan" value="<?= $data['jabatan'] ?>" placeholder="Contoh: Asisten Ahli"></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><input type="text" class="form-control" name="status" id="status" value="<?= $data['status'] ?>" placeholder="Contoh: PNS"></td>
                            </tr>
                        </table>
                        <span style="color: red; font-size: 13px;">* Kolom wajib diisi</span>
                        <div class="container-right">
                            <div class="gap-2 d-md-block mt-2 mb-2">
                                <button class="btn btn-success" type="submit" name="edit_data">Edit</button>
                                <a href="" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php elseif($route == "view_page"): ?>
        <!-- Rute Halaman Lihat -->
        <div class="container container-view-edit">
            <div class="box box-view">
                <h1 class="text-center mt-1 mb-3 me-1 ms-1">
                    <?=$data['nama']?><span style="color: red">*</span>
                </h1>
                <div class="container">
                    <form action="" method="post">
                        <table class="w-100 mb-2">
                            <tr>
                                <td>NIP</td>
                                <td><input type="text" class="form-control" name="nip" id="nip" value="<?= $data['nip'] ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama'] ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Email</td> 
                                <td><input type="email" class="form-control" name="email" id="email" value="<?= $data['email'] ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Fakultas</td>
                                <td><input type="text" class="form-control" name="fakultas" id="fakultas" value="<?= $data['fakultas'] ?>" placeholder="Data Kosong" readonly></td>
                            </tr>
                            <tr>
                                <td>Prodi</td>
                                <td><input type="text" class="form-control" name="prodi" id="prodi" value="<?= $data['prodi'] ?>" placeholder="Data Kosong" readonly></td>
                            </tr>
                            <tr>
                                <td>Gelar</td>
                                <td><input type="text" class="form-control" name="pendidikan" id="pendidikan" value="<?= $data['pendidikan'] ?>" placeholder="Data Kosong" readonly></td>
                            </tr>
                            <tr>
                                <td>Golongan</td>
                                <td><input type="text" class="form-control" name="golongan" id="golongan" value="<?= $data['golongan'] ?>" placeholder="Data Kosong" readonly></td>
                            </tr>
                            <tr>
                                <td>Pangkat</td>
                                <td><input type="text" class="form-control" name="pangkat" id="pangkat" value="<?= $data['pangkat'] ?>" placeholder="Data Kosong" readonly></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td><input type="text" class="form-control" name="jabatan" id="jabatan" value="<?= $data['jabatan'] ?>" placeholder="Data Kosong" readonly></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><input type="text" class="form-control" name="status" id="status" value="<?= $data['status'] ?>" placeholder="Data Kosong" readonly></td>
                            </tr>
                        </table>
                        <span style="color: red; font-size: 13px;">* Hanya untuk MELIHAT data, untuk EDIT data silakan klik tombol EDIT</span>
                        <div class="container-right">
                            <div class="gap-2 d-md-block mt-2 mb-2">
                                <a href="" class="btn btn-danger">Kembali</a></td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                    <button class="btn btn-primary" type="submit" name="edit_to">
                                        Edit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>
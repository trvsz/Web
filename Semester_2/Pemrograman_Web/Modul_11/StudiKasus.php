<?php
    session_start();

    // Deklarasi variabel
    $route = "login";
    $message = null;
    $host = "localhost";
    $database = "db_mahasiswa";
    $username = "root";
    $password = "";
    $connect = mysqli_connect($host, $username, $password, $database);

    // Cek koneksi
    if ($connect -> connect_errno) {
        die("Connection Failed: " . $connect -> connect_errno);
    }

    // Cek session
    if (isset($_SESSION['username'])) {
        $route = "home_page";
    } else {
        $route = "login";
    }

    // Routing
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connect, $query);
        
        if (mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_array($result);
            $_SESSION['username'] = $username;
            $route = "home_page";
            $_SESSION['route'] = "home_page";
            
        }
    }

    // Log Out = Session Destroy
    if (isset($_POST['logout'])) {
        session_destroy();
        $route = "login";
    }

    // Penambahan Data
    if (isset($_POST['add_data'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $alamat = $_POST['alamat'];
        $query = "INSERT INTO mahasiswa (nama, nim, alamat) VALUES ('$nama', '$nim', '$alamat')";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $message = (object) [
                "type" => "success",
                "text" => "Data BERHASIL Ditambahkan"
            ];
        } else {
            $message = (object) [
                "type" => "danger",
                "text" => "Data GAGAL Ditambahkan"
            ];
        }
        $route = "home_page";
    }

    // Edit Data
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $query = "SELECT * FROM mahasiswa WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($result);
        $route = "edit";
    }

    // Edit Data (Update Data)
    if (isset($_POST['edit_data'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $alamat = $_POST['alamat'];
        $query = "UPDATE mahasiswa SET nama = '$nama', alamat = '$alamat' WHERE nim = '$nim'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $message = (object) [
                "type" => "success",
                "text" => "Data BERHASIL Diubah"
            ];
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
        $query = "DELETE FROM mahasiswa WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $message = (object) [
                "type" => "success",
                "text" => "Data BERHASIL Dihapus"
            ];
        } else {
            $message = (object) [
                "type" => "danger",
                "text" => "Data GAGAL Dihapus"
            ];
        }
        $route = "home_page";
    }
?>

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
        crossorigin="anonymous"></script>
    
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Script JS -->
    <script>
        // Pemuatan DataTables setelah HTML dimuat
        $(document).ready(function() {
            $('#data').DataTable();
        });
        // Validasi Log In
        function validateForm() {
            let username = document.forms["myForm"]["username"].value;
            let password = document.forms["myForm"]["password"].value;
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
    </script>
    <title>Data Mahasiswa</title>
</head>
<body>
    <!-- Alert -->
    <?php if (isset($message)): ?>
        <div class="alert <?= $message->type == "success" ? "alert-success" : "alert-danger" ?>">
            <?= $message->text ?>
        </div>
    <?php endif; ?>
    <!-- Halaman Web Sederhana -->
    <?php if ($route == "home_page") : ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light ms-2 me-2">
            <a class="navbar-brand" href="#">StudiKasus</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav"></ul>
            </div>
            <form method="post" onsubmit="return confirmLogOut()">
                <input type="submit" class="btn btn-danger" name="logout" value="Log Out">
            </form>
        </nav>
        <div class="card">
            <form action="" method="post" onsubmit="return confirmAdding()">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" required>
                </div>
                <div class="form-group">
                    <label for="nama">NAMA</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="alamat">ALAMAT</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" required>
                </div>
                <div>
                    <button class="btn btn-success" type="submit" name="add_data">Add</button>
                </div>
            </form>
        </div>
        <table class="table table-striped" id="data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM mahasiswa";
                    $result = mysqli_query($connect, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_array($result)) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nim'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['alamat'] ?></td>
                        <td>
                            <div class="d-flex">
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                    <button class="btn btn-primary" type="submit" name="edit">
                                        Edit
                                    </button>
                                </form>
                                <form action="" method="post" onsubmit="return confirmDeleting()">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                    <button class="btn btn-danger" type="submit" name="delete">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr> 
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php elseif ($route == "login"): ?>
        <div class="container text-center col-12 col-md-8 col-lg-3">
            <div class="card" style="margin-top: 20%; margin-bottom: 50px;">
                <h1 style="margin-top: 20px; margin-bottom: 15px;">SIGN IN</h1>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()" name="myForm">
                    <div class="container text-center">
                        <div>
                            <input class="form-control" type="text" name="username" id="username" placeholder="USERNAME" style="margin-bottom: 10px;">
                        </div>
                        <div>
                            <input class="form-control" type="password" name="password" id="password" placeholder="PASSWORD">
                        </div>
                    </div>
                    <input type="submit" value="Log In" style="margin-top: 20px; margin-bottom: 30px;" name="login">
                </form>
            </div>
        </div>
    <?php elseif ($route == "edit"): ?>
        <h1>Edit Data</h1>
        <form action="" method="post" onsubmit="return confirmEditing()">
            <input type="hidden" name="id" value="<?php $data['id'] ?>">
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim" value="<?= $data['nim'] ?>" required>
            </div>
            <div class="form-group">
                <label for="nama">NAMA</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama'] ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">ALAMAT</label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $data['alamat'] ?>" required>
            </div>
            <div>
                <button class="btn btn-success" type="submit" name="edit_data">Edit</button>
                <a href="" class="btn btn-danger">Cancel</a>
        </form>
    <?php endif; ?>
</body>
</html>
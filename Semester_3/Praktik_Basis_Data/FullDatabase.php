<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Database</title>
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
    <link rel="stylesheet" href="styleData.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            new DataTable('table.display');
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="QueryDashboard.php">Dashboard</a>
            <div class="collapse navbar-collapse">
                <li class="nav-item dropdown" style="list-style-type: none;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" style="color: black;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Quick Search by Table
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="#TabelKampus">Tabel Kampus</a></li>
                        <li><a class="dropdown-item" href="#TabelFakultas">Tabel Fakultas</a></li>
                        <li><a class="dropdown-item" href="#TabelJurusan">Tabel Jurusan</a></li>
                        <li><a class="dropdown-item" href="#TabelProdi">Tabel Program Studi</a></li>
                        <li><a class="dropdown-item" href="#TabelMahasiswa">Tabel Mahasiswa</a></li>
                        <li><a class="dropdown-item" href="#TabelMatkul">Tabel Mata Kuliah</a></li>
                        <li><a class="dropdown-item" href="#TabelRS">Tabel Rencana Studi</a></li>
                        <li><a class="dropdown-item" href="#TabelKlub">Tabel Klub</a></li>
                        <li><a class="dropdown-item" href="#TabelSport">Tabel Sport</a></li>
                        <li><a class="dropdown-item" href="#TabelPrasyarat">Tabel Prasyarat</a></li>
                        <li><a class="dropdown-item" href="#TabelDosen">Tabel Dosen</a></li>
                        <li><a class="dropdown-item" href="#TabelPengampu">Tabel Pengampu</a></li>
                        <li><a class="dropdown-item" href="#TabelKomite">Tabel Komite</a></li>
                        <li><a class="dropdown-item" href="#TabelDosenKomite">Tabel Dosen Komite</a></li>
                    </ul>
                </li>
            </div>
            <input type="button" class="btn btn-dark" value="Tampilkan Semua Query" onclick="window.location.href='QueryFull.php'">
        </div>
    </nav>
    <div class="container" style="margin-top: 100px;" id="TabelKampus">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Kampus
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama Kampus</th>
                            <th scope="col" class="text-center">Alamat</th>
                            <th scope="col" class="text-center">Jarak</th>
                            <th scope="col" class="text-center">No Bis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM campus";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['campus_name']; ?></td>
                                    <td><?php echo $row['campus_address']; ?></td>
                                    <td><?php echo $row['distance']; ?></td>
                                    <td><?php echo $row['bus_no']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="TabelFakultas">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Fakultas
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama Fakultas</th>
                            <th scope="col" class="text-center">Nama Dekan</th>
                            <th scope="col" class="text-center">Bangunan Fakultas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM faculty";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['faculty_name']; ?></td>
                                    <td><?php echo $row['dean_name']; ?></td>
                                    <td><?php echo $row['faculty_building']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="TabelJurusan">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Jurusan
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama Jurusan</th>
                            <th scope="col" class="text-center">Nama Kampus</th>
                            <th scope="col" class="text-center">Nama Fakultas</th>
                            <th scope="col" class="text-center">Bangunan Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM school";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['school_name']; ?></td>
                                    <td><?php echo $row['campus_name']; ?></td>
                                    <td><?php echo $row['faculty_name']; ?></td>
                                    <td><?php echo $row['school_building']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="TabelProdi">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Program Studi
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Kode Prodi</th>
                            <th scope="col" class="text-center">Nama Jurusan</th>
                            <th scope="col" class="text-center">Nama Prodi</th>
                            <th scope="col" class="text-center">Level Prodi</th>
                            <th scope="col" class="text-center">Lama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM programme";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['programme_code']; ?></td>
                                    <td><?php echo $row['school_name']; ?></td>
                                    <td><?php echo $row['programme_title']; ?></td>
                                    <td><?php echo $row['programme_level']; ?></td>
                                    <td><?php echo $row['programme_length']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="TabelMahasiswa">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Mahasiswa
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID Mahasiswa</th>
                            <th scope="col" class="text-center">Kode Prodi</th>
                            <th scope="col" class="text-center">Nama Mahasiswa</th>
                            <th scope="col" class="text-center">Tanggal Lahir</th>
                            <th scope="col" class="text-center">Enrolled</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM student";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['student_id']; ?></td>
                                    <td><?php echo $row['programme_code']; ?></td>
                                    <td><?php echo $row['student_name']; ?></td>
                                    <td><?php echo $row['student_birth']; ?></td>
                                    <td><?php echo $row['year_enrolled']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="TabelMatkul">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Mata Kuliah
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Kode Matkul</th>
                            <th scope="col" class="text-center">Kode Prodi</th>
                            <th scope="col" class="text-center">Nama Mata Kuliah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM course";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['course_code']; ?></td>
                                    <td><?php echo $row['programme_code']; ?></td>
                                    <td><?php echo $row['course_title']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="TabelRS">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Rencana Studi
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Kode Matkul</th>
                            <th scope="col" class="text-center">ID Mahasiswa</th>
                            <th scope="col" class="text-center">Tahun Ambil</th>
                            <th scope="col" class="text-center">Semester</th>
                            <th scope="col" class="text-center">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM course_student";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['course_code']; ?></td>
                                    <td><?php echo $row['student_id']; ?></td>
                                    <td><?php echo $row['year_taken']; ?></td>
                                    <td><?php echo $row['semester_taken']; ?></td>
                                    <td><?php echo $row['grade_award']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="TabelKlub">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Klub
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama Klub</th>
                            <th scope="col" class="text-center">Nama Kampus</th>
                            <th scope="col" class="text-center">Bangunan Klub</th>
                            <th scope="col" class="text-center">No Telp Klub</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM club";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['club_name']; ?></td>
                                    <td><?php echo $row['campus_name']; ?></td>
                                    <td><?php echo $row['club_building']; ?></td>
                                    <td><?php echo $row['club_phone']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="TabelSport">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Sport
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama Sport</th>
                            <th scope="col" class="text-center">Nama Klub</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM sport";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['sport_name']; ?></td>
                                    <td><?php echo $row['club_name']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="TabelPrasyarat">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Prasyarat
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Kode Mata Kuliah</th>
                            <th scope="col" class="text-center">Kode Mata Kuliah Prasyarat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM pre_course";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['course_code']; ?></td>
                                    <td><?php echo $row['precourse_code']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="TabelDosen">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Dosen
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID Dosen</th>
                            <th scope="col" class="text-center">Nama Jurusan</th>
                            <th scope="col" class="text-center">ID Pengawas</th>
                            <th scope="col" class="text-center">Nama Dosen</th>
                            <th scope="col" class="text-center">Gelar Dosen</th>
                            <th scope="col" class="text-center">Ruang Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM lecturer";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['staff_id']; ?></td>
                                    <td><?php echo $row['school_name']; ?></td>
                                    <td><?php echo $row['supervisor_id']; ?></td>
                                    <td><?php echo $row['lecturer_name']; ?></td>
                                    <td><?php echo $row['lecturer_title']; ?></td>
                                    <td><?php echo $row['office_room']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="TabelPengampu">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Pengampu
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID Dosen</th>
                            <th scope="col" class="text-center">Kode Matkul</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM lecturer_course";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['staff_id']; ?></td>
                                    <td><?php echo $row['course_code']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="TabelKomite">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Komite
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nama Komite</th>
                            <th scope="col" class="text-center">Nama Fakultas</th>
                            <th scope="col" class="text-center">Frekuensi Rapat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM committee";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['committee_title']; ?></td>
                                    <td><?php echo $row['faculty_name']; ?></td>
                                    <td><?php echo $row['meeting_frequency']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px; margin-bottom: 50px;" id="TabelDosenKomite">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Tabel Dosen Komite
            </h3>
            <div class="container text-center">
                <table class="table table-responsive hover order-column row-border cell-border display">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID Dosen</th>
                            <th scope="col" class="text-center">Nama Komite</th>
                            <th scope="col" class="text-center">Nama Fakultas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT * FROM committee_lecturer";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['staff_id']; ?></td>
                                    <td><?php echo $row['committee_title']; ?></td>
                                    <td><?php echo $row['faculty_name']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
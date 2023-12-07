<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query 01</title>
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
</head>
<body>
    <nav class="navbar navbar-expand navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="QueryDashboard.php">Dashboard</a>
            <div class="collapse navbar-collapse">
                <li class="nav-item dropdown" style="list-style-type: none;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" style="color: black;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Quick Search by Query
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="#Query1">Query 1</a></li>
                        <li><a class="dropdown-item" href="#Query2">Query 2</a></li>
                        <li><a class="dropdown-item" href="#Query3">Query 3</a></li>
                        <li><a class="dropdown-item" href="#Query4">Query 4</a></li>
                        <li><a class="dropdown-item" href="#Query5">Query 5</a></li>
                        <li><a class="dropdown-item" href="#Query6">Query 6</a></li>
                        <li><a class="dropdown-item" href="#Query7">Query 7</a></li>
                        <li><a class="dropdown-item" href="#Query8">Query 8</a></li>
                        <li><a class="dropdown-item" href="#Query9">Query 9</a></li>
                        <li><a class="dropdown-item" href="#Query10">Query 10</a></li>
                    </ul>
                </li>
            </div>
            <input type="button" class="btn btn-dark" value="Tampilkan Database" onclick="window.location.href='FullDatabase.php'">
        </div>
    </nav>
    <div class="container" style="margin-top: 100px;" id="Query1">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Query 1
            </h3>
            <h5 class="text-center mt-1 mb-3">
                Tampilkan semua jurusan yang berlokasi di 'Toronto Campus' dan urutkan berdasar nama jurusan.
            </h5>
            <div class="container text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Jurusan di Toronto Campus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect('localhost', 'root','root', 'db_university') or die('Failed to connect');
                            $query = "SELECT school_name 
                                    FROM school 
                                    WHERE campus_name = 'Toronto Campus' 
                                    ORDER BY school_name";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['school_name']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="Query2">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Query 2
            </h4>
            <h5 class="text-center mt-1 mb-3">
                Tampilkan semua program studi yang ada di 'Science Faculty'.
            </h5>
            <div class="container text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Kode Program Studi di Science Faculty</th>
                            <th scope="col">Nama Program Studi di Science Faculty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect('localhost', 'root','root', 'db_university') or die('Failed to connect');
                            $query = "SELECT programme_code, programme_title FROM programme INNER JOIN school on programme.school_name = school.school_name INNER JOIN faculty ON school.faculty_name = faculty.faculty_name WHERE faculty.faculty_name = 'Science Faculty'";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['programme_code']; ?></td>
                                    <td><?php echo $row['programme_title']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="Query3">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Query 3
            </h3>
            <h5 class="text-center mt-1 mb-3">
                Tampilkan semua nama dosen yang menjadi anggota komite  dan urutkan berdasarkan nama.
            </h5>
            <div class="container text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama Lecturer</th>
                            <th scope="col">ID Lecturer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect('localhost', 'root','root', 'db_university') or die('Failed to connect');
                            $query = "SELECT DISTINCT lecturer.lecturer_name, lecturer.staff_id FROM committee_lecturer INNER JOIN lecturer ON committee_lecturer.staff_id = lecturer.staff_id ORDER BY lecturer.lecturer_name";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['lecturer_name']; ?></td>
                                    <td><?php echo $row['staff_id']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="Query4">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Query 4
            </h3>
            <h5 class="text-center mt-1 mb-3">
                Tampilkan semua nama kaprodi dan nama dosen yang berada di dalam fakultas yang dipimpinnya. Tampilkan berdasarkan urutan nama kaprodi dan nama dosen yang dipimpinnya.
            </h5>
            <div class="container text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama Kepala Program Studi</th>
                            <th scope="col">Nama Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect('localhost', 'root','root', 'db_university') or die('Failed to connect');
                            $query = "SELECT sup.lecturer_name AS kaprodi, lec.lecturer_name AS dosen FROM lecturer sup INNER JOIN lecturer lec ON sup.staff_id = lec.supervisor_id ORDER BY sup.lecturer_name, lec.lecturer_name";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['kaprodi']; ?></td>
                                    <td><?php echo $row['dosen']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="Query5">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Query 5
            </h3>
            <h5 class="text-center mt-1 mb-3">
                Tampilkan semua dosen yang bukan merupakan anggota komite.
            </h5>
            <div class="container text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect('localhost', 'root','root', 'db_university') or die('Failed to connect');
                            $query = "SELECT staff_id, lecturer_name FROM lecturer WHERE staff_id NOT IN (SELECT DISTINCT staff_id FROM committee_lecturer)";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['staff_id']; ?></td>
                                    <td><?php echo $row['lecturer_name']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="Query6">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Query 6
            </h3>
            <h5 class="text-center mt-1 mb-3">
                Tampilkan total jumlah matakuliah untuk setiap program studi.
            </h5>
            <div class="container text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Kode Program Studi</th>
                            <th scope="col">Nama Program Studi</th>
                            <th scope="col">Total Matakuliah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect('localhost', 'root','root', 'db_university') or die('Failed to connect');
                            $query = "SELECT programme_code, programme_title, COUNT(course_code) AS total_course FROM programme LEFT JOIN course USING(programme_code) GROUP BY programme_code";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['programme_code']; ?></td>
                                    <td><?php echo $row['programme_title']; ?></td>
                                    <td><?php echo $row['total_course']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="Query7">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Query 7
            </h3>
            <h5 class="text-center mt-1 mb-3">
                Tampilkan semua dosen beserta matakuliah yang diampunya dan urutkan berdasarkan nama dosen.
            </h5>
            <div class="container text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama Dosen</th>
                            <th scope="col">Nama Mata Kuliah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect('localhost', 'root','root', 'db_university') or die('Failed to connect');
                            $query = "SELECT lecturer.lecturer_name, course.course_title FROM lecturer_course INNER JOIN lecturer ON lecturer_course.staff_id = lecturer.staff_id INNER JOIN course ON lecturer_course.course_code = course.course_code ORDER BY lecturer.lecturer_name";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['lecturer_name']; ?></td>
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
    <div class="container" style="margin-top: 50px;" id="Query8">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Query 8
            </h3>
            <h5 class="text-center mt-1 mb-3">
                Tampilkan semua nama matakuliah dan nama matakuliah yang menjadi matakuliah prasyaratnya.
            </h5>
            <div class="container text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama Mata Kuliah</th>
                            <th scope="col">Nama Mata Kuliah Prasyaratnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect('localhost', 'root','root', 'db_university') or die('Failed to connect');
                            $query = "SELECT c1.course_title AS course_title, c2.course_title AS precourse_title FROM pre_course pc INNER JOIN course c1 ON pc.course_code = c1.course_code INNER JOIN course c2 ON pc.precourse_code = c2.course_code";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['course_title']; ?></td>
                                    <td><?php echo $row['precourse_title']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;" id="Query9">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Query 9
            </h3>
            <h5 class="text-center mt-1 mb-3">
                Tampilkan 5 matakuliah yang memiliki jumlah mahasiswa terbanyak.
            </h5>
            <div class="container text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Kode Mata Kuliah</th>
                            <th scope="col">Nama Mata Kuliah</th>
                            <th scope="col">Jumlah Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $connect = mysqli_connect('localhost', 'root','root', 'db_university') or die('Failed to connect');
                            $query = "SELECT course.course_code, course.course_title, COUNT(course_student.student_id) AS total_student
                                    FROM course_student
                                    INNER JOIN course ON course_student.course_code = course.course_code
                                    GROUP BY course.course_code
                                    ORDER BY total_student DESC
                                    LIMIT 5";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['course_code']; ?></td>
                                    <td><?php echo $row['course_title']; ?></td>
                                    <td><?php echo $row['total_student']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 50px; margin-bottom: 50px;" id="Query10">
        <div class="box-view container">
            <h3 class="text-center mt-1 mb-3 me-1 ms-1">
                Query 10
            </h3>
            <h5 class="text-center mt-1 mb-3">
                Tampilkan matakuliah prasyarat yang tidak diambil oleh mahasiswa yang terdaftar di universitas tahun 2010, tetapi matakuliah tersebut diambil pada tahun berikutnya yaitu 2011.
            </h5>
            <div class="container text-center">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Kode Mata Kuliah (Prasyarat)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('Connect.php');
                            $query = "SELECT DISTINCT student_id, pre_course.precourse_code
                                    FROM course_student
                                    RIGHT JOIN pre_course ON course_student.course_code = pre_course.course_code
                                    WHERE student_id IN (
                                        SELECT student_id
                                        FROM student
                                        WHERE year_enrolled = '2010'
                                    ) AND year_taken = '2011' 
                                    EXCEPT
                                    SELECT student_id, course_code
                                    FROM course_student
                                    WHERE student_id IN (
                                        SELECT student_id
                                        FROM student
                                        WHERE year_enrolled = '2010'
                                    ) AND year_taken = '2010'";
                            $result = mysqli_query($connect, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['student_id']; ?></td>
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
</body>
</html>
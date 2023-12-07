<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query 04</title>
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
            <input type="button" class="btn btn-dark" value="Tampilkan Database" onclick="window.location.href='FullDatabase.php'">
        </div>
    </nav>
    <div class="container container-custom">
        <div class="box-view container">
            <h1 class="text-center mt-1 mb-3 me-1 ms-1">
                Query 4
            </h1>
            <h5 class="text-center mt-1 mb-3">
                Tampilkan semua nama kaprodi dan nama dosen yang berada di dalam program studi yang dipimpinnya. Tampilkan berdasarkan urutan nama kaprodi dan nama dosen yang dipimpinnya.
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
                            include('Connect.php');
                            $query = "SELECT sup.lecturer_name AS kaprodi, lec.lecturer_name AS dosen 
                                    FROM lecturer sup 
                                    INNER JOIN lecturer lec ON sup.staff_id = lec.supervisor_id 
                                    ORDER BY sup.lecturer_name, lec.lecturer_name";
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
            <div class="container container-right">
                <div class="gap-2 d-md-block mt-2 mb-2">
                    <a href="Query03.php" class="btn btn-danger">Prev Query</a>
                    <a href="Query05.php" class="btn btn-primary">Next Query</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
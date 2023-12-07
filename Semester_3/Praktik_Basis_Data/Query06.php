<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query 06</title>
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
                Query 6
            </h1>
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
                            include('Connect.php');
                            $query = "SELECT programme_code, programme_title, COUNT(course_code) AS total_course 
                                    FROM programme 
                                    LEFT JOIN course USING(programme_code) 
                                    GROUP BY programme_code";
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
            <div class="container container-right">
                <div class="gap-2 d-md-block mt-2 mb-2">
                    <a href="Query05.php" class="btn btn-danger">Prev Query</a>
                    <a href="Query07.php" class="btn btn-primary">Next Query</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
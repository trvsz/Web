<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            <a class="navbar-brand" href="#">Dashboard</a>
            <input type="button" class="btn btn-dark" value="Tampilkan Database" onclick="window.location.href='FullDatabase.php'">
        </div>
    </nav>
    <div class="container container-custom">
        <div class="box box-select container">
            <h1 class="text-center mt-1 mb-3 me-1 ms-1">
                Pemilihan Query
            </h1>
            <div class="container text-center">
                <div class="gap-2 d-grid d-md-block mt-2 mb-2" style="color: red;">
                    <input class="btn btn-success btn-lg mb-2 " type="button" value="Query 1" onclick="window.location.href='Query01.php'">
                    <input class="btn btn-success btn-lg mb-2" type="button" value="Query 2" onclick="window.location.href='Query02.php'">
                    <input class="btn btn-success btn-lg mb-2" type="button" value="Query 3" onclick="window.location.href='Query03.php'">
                    <input class="btn btn-success btn-lg mb-2" type="button" value="Query 4" onclick="window.location.href='Query04.php'">
                    <input class="btn btn-success btn-lg mb-2" type="button" value="Query 5" onclick="window.location.href='Query05.php'">
                    <input class="btn btn-success btn-lg mb-2" type="button" value="Query 6" onclick="window.location.href='Query06.php'">
                    <input class="btn btn-success btn-lg mb-2" type="button" value="Query 7" onclick="window.location.href='Query07.php'">
                    <input class="btn btn-success btn-lg mb-2" type="button" value="Query 8" onclick="window.location.href='Query08.php'">
                    <input class="btn btn-success btn-lg mb-2" type="button" value="Query 9" onclick="window.location.href='Query09.php'">
                    <input class="btn btn-success btn-lg mb-2" type="button" value="Query 10" onclick="window.location.href='Query10.php'">
                    <input class="btn btn-dark btn-lg mb-2" type="button" value="Tampilkan Semua Query" onclick="window.location.href='QueryFull.php'">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
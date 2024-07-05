<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beasiswa Unggul</title>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link href="image/logo beasiswa.png" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #00008B;">
        <div class="container-fluid">
        <a style="font-family: verdana;" class="navbar-brand text-white" href="">
                <img src="image/logo fix.png" width="55"> BEASISWA <b class="text-white">UNGGUL</b>
            </a>
            <a style="font-family:math" class="nav-link active text-white" aria-current="page" href="admin.php">
            <button type="button" class="btn text-warning">HOME</button>
            </a>
            <a style="font-family:math" class="nav-link active text-white" aria-current="page" href="hasil2.php">
            <button type="button" class="btn text-warning">DATA</button>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a style="font-family:math;" class="nav-link active text-white" aria-current="page" href="logout.php">
                            <button type="button" class="btn btn-outline-danger" onclick="return confirm('apakah anda yakin ingin keluar?')"><i class="bi bi-box-arrow-in-left"></i>LOGOUT</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- main content-->

<!-- Main Content -->
<div class="p-5 mb-4 mt-4 text-center rounded-3">
<div class="container-fluid py-5">
    <h1 class="display-4 fw-bold text-primary" style="font-family:verdana"><span>Selamat Datang, <?php echo $_SESSION['username']; ?>!</span> </h1>
    <p class="col-md- mb-4 fs-2 text-center" style="font-family:courier">Terima kasih telah bergabung. Silahkan segera proses daftar beasiswa para pendaftar.</p>
    <a href="hasil2.php" class="btn btn-info btn-lg fw-bold text-white"><i class="bi bi-bar-chart-line-fill"></i> DATA BEASISWA</a>
</div>
</div>

<footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
<!-- Copyright -->
<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    <b>© 2024 Copyright
</div>
<!-- Copyright -->
</footer>
</body>
</html>
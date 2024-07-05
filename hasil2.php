    <?php
    session_start();

    if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
        header("Location: login.php");
        exit();
    }
    ?>

    <?php
    $host = 'localhost';
    $dbname = 'scholarshipregistration';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nameFilter = "";
        if (isset($_GET['name']) && !empty($_GET['name'])) {
            $nameFilter = $_GET['name'];
            $stmt = $conn->prepare("SELECT * FROM data_beasiswa WHERE nama LIKE :name");
            $stmt->bindValue(':name', '%' . $nameFilter . '%');
        } else {
        $stmt = $conn->prepare("SELECT * FROM data_beasiswa");
        }
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beasiswa Unggul</title>
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
    <?php if (isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success_message'];
                unset($_SESSION['success_message']);
                ?>
            </div>
        <?php endif; ?>
        <div class="container mt-5 mb-6">
    <h2 class="text-center fw-bold" style="font-family:math">Data Pendaftaran Beasiswa</h2>
    <br>

    <div>
        <form action="" method="GET">
            <div class="row float-end">
                <div class="col-lg-9">
                    <input type="text" placeholder="Cari disini" name="name" class="form-control" value="<?php echo htmlspecialchars($nameFilter); ?>" value="<?php echo htmlspecialchars($nameFilter); ?>">
                </div>
                <div class="col-lg-3 text-start">
                    <button type="submit" class="btn btn-primary col-lg-12"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <?php if (count($result) == 0): ?>
        <div class="alert alert-warning mt-5 fw-bold" role="alert">
            Data tidak ditemukan.
        </div>
    <?php else: ?>
        <table class="table table-striped table-hover table-bordered border-light mt-5">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor</th>
                    <th>Semester</th>
                    <th>IPK</th>
                    <th>Pilihan Beasiswa</th>
                    <th>Berkas</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $i = 1; // inisialisasi nomor tabel
                foreach ($result as $row): ?>
                <tr class="text-center">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['nomor']); ?></td>
                    <td><?php echo htmlspecialchars($row['semester']); ?></td>
                    <td><?php echo htmlspecialchars($row['nilai']); ?></td>
                    <td><?php echo htmlspecialchars($row['pilih_beasiswa']); ?></td>
                    <td>
                    <a href="<?php echo htmlspecialchars($row['berkas']); ?>" download>
                        <button type="button" class="btn btn-outline-primary">
                            <i class="fa fa-download"></i> Download 
                        </button>
                    </a>
                </td>
                    <td>
                        <form method="POST" action="hapus.php" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                            <a href="edit.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                            <a href="tanggapan.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-warning"><i class="bi bi-clipboard-check-fill"></i></a>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
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

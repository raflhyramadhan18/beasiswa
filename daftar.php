<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
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
    <style>
        .card-container {
            padding: 50px 0;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            text-align: left;
        }
        .card img {
            width: 50px;
            margin-bottom: 20px;
        }
    </style>
    <script>
        function validateIPK(input) {
            if (input.value > 4.00) {
                input.value = 4.00;
            }
        }

        function showSuccessMessage() {
            alert("Data berhasil disimpan!");
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #00008B;">
        <div class="container-fluid">
        <a style="font-family: verdana;" class="navbar-brand text-white" href="">
                <img src="image/logo fix.png" width="55"> BEASISWA <b class="text-white">UNGGUL</b>
            </a>
            <a style="font-family:math" class="nav-link active text-white" aria-current="page" href="user.php">
            <button type="button" class="btn btn- text-warning">HOME</button>
            </a>
            <a style="font-family:math" class="nav-link active text-white" aria-current="page" href="daftar.php">
            <button type="button" class=" btn btn- text-warning">DAFTAR</button>
            </a>
            <a style="font-family:math" class="nav-link active text-white" aria-current="page" href="hasil.php">
            <button type="button" class="btn btn- text-warning">HASIL</button>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a style="font-family:math;" class="nav-link active text-white" aria-current="page" href="logout.php">
                            <button type="button" class="btn btn-outline-danger" onclick="return confirm('apakah anda yakin ingin keluar?')"><i class="bi bi-box-arrow-in-left"></i> LOGOUT</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- main content-->

    <h2 class="text-center my-3 fw-bold" style="font-family:math">Daftar Beasiswa</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-sm-5 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body mt-2 mb-2">
                    <form action="simpan.php" method="post" enctype="multipart/form-data" onsubmit="showSuccessMessage()">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Nama</label>
                            </div>
                            <div class="col">
                                <input type="text" name="nama" required class="form-control" id="Input1" placeholder="Masukan Nama">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Email</label>
                            </div>
                            <div class="col">
                                <input type="email" name="email" required class="form-control" id="Input1" placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">No. Hp</label>
                            </div>
                            <div class="col">
                                <input type="number" name="nomor" required class="form-control" id="Input1" placeholder="Masukan No. HP">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Semester saat ini</label>
                            </div>
                            <div class="col">
                                <select class="form-select" name="semester" aria-label="Default select example" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Semester 1">Semester 1</option>
                                    <option value="Semester 2">Semester 2</option>
                                    <option value="Semester 3">Semester 3</option>
                                    <option value="Semester 4">Semester 4</option>
                                    <option value="Semester 5">Semester 5</option>
                                    <option value="Semester 6">Semester 6</option>
                                    <option value="Semester 7">Semester 7</option>
                                    <option value="Semester 8">Semester 8</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">IPK Terakhir</label>
                            </div>
                            <div class="col">
                                <input type="number" step="0.01" max="4.00" name="nilai" required class="form-control" id="Input1" placeholder="Masukan IPK" oninput="validateIPK(this)">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Pilihan Beasiswa</label>
                            </div>
                            <div class="col">
                                <select class="form-select" name="pilihan_beasiswa" required aria-label="Default select example">
                                    <option disabled selected>Pilih Beasiswa</option>
                                    <option value="Akademik">Akademik</option>
                                    <option value="Non Akademik">Non Akademik</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Upload Berkas Syarat</label>
                        </div>
                        <div class="col">
                            <input class="form-control" name="berkas" required type="file" id="formFileMultiple" accept=".jpg, .jpeg, .png, .gif, .pdf, .doc, .docx">
                            <span id="fileError" class="text-danger"></span>
                        </div>
                    </div>
                    <script>
                        document.getElementById('formFileMultiple').addEventListener('change', function() {
                            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.pdf|\.doc|\.docx)$/i;
                            var fileInput = document.getElementById('formFileMultiple');
                            var filePath = fileInput.value;
                            var fileExt = filePath.substr(filePath.lastIndexOf('.')).toLowerCase();

                            if (!allowedExtensions.exec(filePath)) {
                                document.getElementById('fileError').innerHTML = 'Maaf, hanya berkas dengan format JPG, JPEG, PNG, GIF, PDF, dan Word yang diizinkan.';
                                fileInput.value = '';
                                return false;
                            } else {
                                document.getElementById('fileError').innerHTML = '';
                            }
                        });
                    </script>

                        <div class="row mb-3 text-end">
                            <div class="col">
                            <button type="button" class="btn btn-success btn-md"  onclick="history.back(-1)"><span class="bi bi-arrow-left-square-fill"></span> Kembali</button>
                            <button type="submit" class="btn btn-primary" onclick="return confirm('apakah data yang anda masukkan sudah benar?')"> <span class="bi bi-floppy-fill"></span> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
<!-- Copyright -->
<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    <b>© 2024 Beasiswa Unggul
</div>
<!-- Copyright -->
</footer>
<script>
        const urlParams = new URLSearchParams(window.location.search);
        const message = urlParams.get('message');

        if (message === 'registered') {
            alert('Maaf Anda sudah mendaftar sebelumnya.');
        }
    </script>
</body>
</html>

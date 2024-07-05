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
        .content-section {
            background-color: #00008B;
            color: white;
            padding: 50px 0;
        }
        .content-section .text-content {
            padding-right: 30px;
        }
        .content-section .btn {
            background-color: white;
            color: #00008B;
            border: none;
        }
        .content-section .btn:hover {
            background-color: #e9ecef;
        }
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
            text-align: center;
        }
        .card img {
            width: 50px;
            margin-bottom: 20px;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 40px 0;
        }
        .footer a {
            color: #00008B;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .social-icons a {
            margin-right: 15px;
            color: #6c757d;
        }
        .social-icons a:hover {
            color: #00008B;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #00008B;">
        <div class="container-fluid">
            <a style="font-family: verdana;" class="navbar-brand text-white" href="index.php">
                <img src="image/logo fix.png" width="55"> BEASISWA <b class="text-white">UNGGUL</b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a style="font-family:math;" class="nav-link active text-white" aria-current="page" href="login.php">
                            <button type="button" class="btn btn-outline-light"><i class="bi bi-box-arrow-in-right"></i> LOGIN</button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid content-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-content" style="font-family: times-new-roman;" >
                    <h1><b>Beasiswa Unggul</h1></b>
                    <h4>Mencapai masa depan yang gemilang bersama Beasiswa Unggul dengan menjadi individu yang cerdas dan kompetitif Serta berahlakul karimah.</h4>
                    <br>
                    <a href="#tentang"><button class="btn btn-lg"><b>Tentang Kami</button></b></a>
                    <div class="spinner-grow text-primary" role="status">
                 <span class="visually-hidden">Loading...</span>
                </div>
                </div>
                <div class="col-md-6">
                    <img src="image/logo fix.png" alt="Beasiswa Unggulan" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <section class="section" id="tentang">
    <div class="container card-container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="font-family: serif;">
                        <!-- <img src="image/logo beasiswa.png" alt=""> -->
                        <i class="bi bi-person-arms-up fa-5x"></i>
                        <h3 class="card-title">Tujuan</h3>
                        <p class="card-text">Mendukung pendidikan tinggi untuk mahasiswa berprestasi dari latar belakang ekonomi yang kurang mampu.
                Mendorong pengembangan potensi dan keterampilan mahasiswa melalui berbagai pelatihan.
                Meningkatkan kualitas sumber daya manusia di Indonesia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="font-family: serif;">
                    <i class="bi bi-filter-square-fill fa-5x"></i>
                        <h3 class="card-title">Tentang Kami</h3>
                        <p class="card-text"> Beasiswa Unggul hadir untuk membantu Anda mencapai masa depan yang gemilang. 
                        Melalui program beasiswa ini, kami bertekad untuk membentuk individu yang cerdas dan kompetitif, siap menghadapi tantangan global dan menjadi pemimpin masa depan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body"style="font-family: serif;">
                    <i class="bi bi-book-half fa-5x"></i>
                        <h3 class="card-title">Ketentuan</h3>
                        <p class="card-text">
                        Warga Negara Indonesia (WNI),
                        Terdaftar sebagai mahasiswa aktif di perguruan tinggi di Indonesia.
                        <br>
                        Memiliki IPK minimal 3.5 pada skala 4.0.
                        Berprestasi dalam bidang akademik maupun non-akademik.
                        Aktif dalam kegiatan organisasi atau sosial.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="font-family: serif;">
                    <i class="bi bi-graph-up-arrow fa-5x"></i>
                        <h3 class="card-title">Keunggulan</h3>
                        <p class="card-text">Dukungan Finansial Penuh,
                        Pendidikan Berkualitas tinggi,
                        Pengembangan Potensi diri,
                        Kesempatan Magang dan Kerja,
                        Pembinaan dan Mentoring,
                        Akses ke Pendidikan Terbaik,
                        Dukungan Kinerja Yang Baik Dan
                        <br>
                        Jaringan Profesional.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <footer class="footer" style="font-family:helvetica;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <h5><b>Beasiswa Unggul</b></h5>
                    <p>Beasiswa Pendidikan Unggul<br>
                    Jalan Gatot Subroto, Gedebage, Jawa Barat 40395<br>
                    Email : beasiswa.unggul@beasiswa.co.id<br>
                    </p>
                    <p>Mencapai masa depan yang gemilang bersama Beasiswa Unggul dengan menjadi individu yang cerdas dan kompetitif</p>
                </div>
                <div class="col-md-15 text-center social-icons">
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">
                    <p>&copy; 2024 Copyright </p>
                </div>
            </div>
        </div>
    </footer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
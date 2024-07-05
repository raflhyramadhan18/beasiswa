<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scholarshipregistration";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Memeriksa apakah formulir telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor = $_POST['nomor'];
    $semester = $_POST['semester'];
    $nilai = $_POST['nilai'];
    $pilihan_beasiswa = $_POST['pilihan_beasiswa'];

    // Memproses file yang diunggah
    $berkas = $_FILES['berkas']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($berkas);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Memeriksa jenis berkas
    $allowedTypes = array("jpg", "jpeg", "png", "gif", "pdf", "doc", "docx");
    if (!in_array($fileType, $allowedTypes)) {
        echo "Maaf, hanya berkas dengan format JPG, JPEG, PNG, GIF, PDF, dan Word yang diizinkan.";
        $uploadOk = 0;
    }

    // Memeriksa apakah direktori tujuan ada, jika tidak, buat direktori tersebut
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Memeriksa apakah uploadOk adalah 0 karena kesalahan
    if ($uploadOk == 0) {
        echo "Maaf, berkas Anda tidak dapat diunggah.";
    } else {
        // Memindahkan file yang diunggah ke direktori tujuan
        if (move_uploaded_file($_FILES['berkas']['tmp_name'], $target_file)) {
            // Menyimpan data ke dalam database

            $userID = $_SESSION['user_id'];

            // Memeriksa apakah pengguna sudah terdaftar sebelumnya
            $check_stmt = $conn->prepare("SELECT * FROM data_beasiswa WHERE user_id = ?");
            $check_stmt->bind_param("i", $userID);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            if ($check_result->num_rows > 0) {
                // Pengguna sudah mendaftar sebelumnya, kirimkan sinyal ke halaman daftar.php
                header("Location: daftar.php?message=registered");
                exit();
            } else {
                // Insert data into database
                $sql = "INSERT INTO data_beasiswa (user_id, nama, email, nomor, semester, nilai, pilih_beasiswa, berkas) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("issssdss", $userID, $nama, $email, $nomor, $semester, $nilai, $pilihan_beasiswa, $target_file);

                if ($stmt->execute()) {
                    header("Location: hasil.php");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $stmt->close();
            }
            $check_stmt->close();
        } else {
            echo "Terjadi kesalahan saat mengunggah berkas.";
        }
    }
}

$conn->close();
?>

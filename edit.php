<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$host = 'localhost';
$dbname = 'scholarshipregistration';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $stmt = $conn->prepare("SELECT * FROM data_beasiswa WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $user_id = $_POST['user_id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $nomor = $_POST['nomor'];
        $semester = $_POST['semester'];
        $nilai = $_POST['nilai'];
        $pilih_beasiswa = $_POST['pilih_beasiswa'];
        // Disini Anda dapat menambahkan validasi dan sanitasi data sesuai kebutuhan

        $stmt = $conn->prepare("UPDATE data_beasiswa SET nama = :nama, email = :email, nomor = :nomor, semester = :semester, nilai = :nilai, pilih_beasiswa = :pilih_beasiswa WHERE user_id = :user_id");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nomor', $nomor);
        $stmt->bindParam(':semester', $semester);
        $stmt->bindParam(':nilai', $nilai);
        $stmt->bindParam(':pilih_beasiswa', $pilih_beasiswa);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $_SESSION['success_message'] = "<strong>Data berhasil diperbarui.</strong>";
        header("Location: hasil2.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Beasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Data Beasiswa</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($result['user_id']); ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($result['nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($result['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="nomor" class="form-label">Nomor</label>
                <input type="text" class="form-control" id="nomor" name="nomor" value="<?php echo htmlspecialchars($result['nomor']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <select class="form-control" id="semester" name="semester" required>
                    <option value="1" <?php echo $result['semester'] == 1 ? 'selected' : ''; ?>>Semester 1</option>
                    <option value="2" <?php echo $result['semester'] == 2 ? 'selected' : ''; ?>>Semester 2</option>
                    <option value="3" <?php echo $result['semester'] == 3 ? 'selected' : ''; ?>>Semester 3</option>
                    <option value="4" <?php echo $result['semester'] == 4 ? 'selected' : ''; ?>>Semester 4</option>
                    <option value="5" <?php echo $result['semester'] == 5 ? 'selected' : ''; ?>>Semester 5</option>
                    <option value="6" <?php echo $result['semester'] == 6 ? 'selected' : ''; ?>>Semester 6</option>
                    <option value="7" <?php echo $result['semester'] == 7 ? 'selected' : ''; ?>>Semester 7</option>
                    <option value="8" <?php echo $result['semester'] == 8 ? 'selected' : ''; ?>>Semester 8</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">IPK</label>
                <input type="number" class="form-control" id="nilai" name="nilai" value="<?php echo htmlspecialchars($result['nilai']); ?>" step="0.01" min="0" max="4.0" required>
            </div>
            <div class="mb-3">
                <label for="pilih_beasiswa" class="form-label">Pilihan Beasiswa</label>
                <select class="form-control" id="pilih_beasiswa" name="pilih_beasiswa" required>
                    <option value="Akademik" <?php echo $result['pilih_beasiswa'] == 'Akademik' ? 'selected' : ''; ?>>Akademik</option>
                    <option value="Non Akademik" <?php echo $result['pilih_beasiswa'] == 'Non Akademik' ? 'selected' : ''; ?>>Non Akademik</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="proses" <?php echo $result['status'] == 'proses' ? 'selected' : ''; ?>>Proses</option>
                    <option value="diterima" <?php echo $result['status'] == 'diterima' ? 'selected' : ''; ?>>Diterima</option>
                    <option value="ditolak" <?php echo $result['status'] == 'ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                </select>
            </div>
            <button type="button" class="btn btn-success btn-md"  onclick="history.back(-1)"><span class="bi bi-arrow-left-square-fill"></span> Kembali</button>
            <button type="submit" class="btn btn-primary" name="submit"><span class="bi bi-floppy-fill"></span> Simpan</button>
        </form>
    </div>
</body>
</html>

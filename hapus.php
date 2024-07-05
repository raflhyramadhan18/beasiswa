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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = $_POST['user_id'];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("DELETE FROM data_beasiswa WHERE user_id = :userID");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();


        $_SESSION['success_message'] = "<strong>Data berhasil dihapus.</strong>";
        header("Location: hasil2.php");
        exit();

        header("Location: hasil2.php");
        exit();
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

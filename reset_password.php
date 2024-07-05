<?php
include 'koneksi.php';

$response = array('status' => '', 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "UPDATE users SET password='$password' WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
        $response['status'] = 'success';
        $response['message'] = 'Password Berhasil Diganti';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Password Gagal Diperbaharui: ' . $conn->error;
    }

    $conn->close();
    echo json_encode($response);
    exit();
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to left, #2eaafa, #1f2f98, #00FA9A);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
            width: 100%;
            max-width: 400px;
            font-weight: bold;
        }
        .login-container h1 {
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
        }
        .form-control:focus {
            box-shadow: none;
        }
        .alert {
            display: none;
        }
        .btn {
            border-radius: 20px;
        }
        .form-control {
            border-radius: 20px;
        }
        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>RESET PASSWORD</h1>
        <div id="error-message" class="alert alert-danger"></div>
        <div id="success-message" class="alert alert-success"></div>
        <form id="resetForm" method="post" action="reset_password.php">
            <div class="mb-3">
                <label for="username" class="form-label"><i class="bi bi-person-fill"></i> Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $_GET['username']; ?>" placeholder="Masukkan Username" readonly required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><i class="bi bi-lock-fill"></i> Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                    <button class="btn btn-outline-secondary" type="button" id="showPassword">
                        <i class="bi bi-eye-fill" id="toggleIcon"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100"><b>Reset Password</b></button>
            <div class="mt-3">
                <a href="forgot_password.php"><button type="button" class="btn btn-success w-100"><b>Kembali</b></button></a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        document.getElementById('resetForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = this;
            var formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    showSuccessMessage(data.message);
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 1000);
                } else {
                    showErrorMessage(data.message);
                }
            })
            .catch(error => {
                showErrorMessage('Error processing request: ' + error.message);
            });
        }); 
    </script>
</body>
</html>

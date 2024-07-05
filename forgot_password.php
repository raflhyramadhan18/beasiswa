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
            text-align: center;
            font-weight: bold;
        }
        .login-container h1 {
            margin-bottom: 20px;
            font-weight: bold;
        }
        .form-control:focus {
            box-shadow: none;
        }
        .alert {
            display: none;
        }
        .btn{
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>FORGOT PASSWORD</h1>
        <div id="error-message" class="alert alert-danger"></div>
        <div id="success-message" class="alert alert-success"></div>
        <form id="loginForm" method="get" action="reset_password.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
            </div>
            <button type="submit" class="btn btn-primary w-100"><b>Selanjutnya</button>
            <div class="mt-3">
                <a href="login.php"><button type="button" class="btn btn-success w-100"><b>Kembali</button></a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
        
</body>
</html>

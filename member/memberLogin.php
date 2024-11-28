<?php
include('../dbConnection.php');
session_start();
if (!isset($_SESSION['is_login'])) {
    if (isset($_REQUEST['mEmail'])) {
        $mEmail = mysqli_real_escape_string($conn, trim($_REQUEST['mEmail']));
        $mPassword = mysqli_real_escape_string($conn, trim($_REQUEST['mPassword']));
        $sql = "SELECT m_email, m_password FROM memberlogin_tb WHERE m_email='" . $mEmail . "' AND m_password='" . $mPassword . "' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $_SESSION['is_login'] = true;
            $_SESSION['mEmail'] = $mEmail;
            echo "<script> location.href='memberProfile.php'; </script>";
            exit;
        } else {
            $msg = '<div class="alert alert-danger mt-3" role="alert">Invalid Email or Password. Please try again.</div>';
        }
    }
} else {
    echo "<script> location.href='memberProfile.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <style>
        body {
            background: linear-gradient(to right, #e66465, #9198e5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: #fff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
        }

        .login-header {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .login-form .form-control {
            border-radius: 10px;
            height: 50px;
            font-size: 1rem;
        }

        .btn-primary {
            border-radius: 10px;
            background: #0069d9;
            border: none;
            height: 50px;
            font-size: 1.1rem;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .back-home {
            text-align: center;
            margin-top: 20px;
        }

        .back-home a {
            display: inline-block;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background: #6c757d;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .back-home a:hover {
            background: #5a6268;
        }

        .form-text {
            font-size: 0.85rem;
        }
    </style>
    <title>Login | PROFITNESS GYM</title>
</head>

<body>
    <div class="login-card">
        <div class="login-header">PROFITNESS GYM - Member Login</div>
        <form action="" method="POST" class="login-form">
            <div class="form-group">
                <label for="email" class="font-weight-bold"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="mEmail" class="form-control" placeholder="Enter your email" required>
                <small class="form-text text-muted">We'll never share your email with anyone.</small>
            </div>
            <div class="form-group">
                <label for="password" class="font-weight-bold"><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="mPassword" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block font-weight-bold">Login</button>
            <?php if (isset($msg)) {
                echo $msg;
            } ?>
        </form>
        <div class="back-home">
            <a href="../index.php"><i class="fas fa-home"></i> Back to Home</a>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>

<?php
include('dbConnection.php');
// Register starts here
if (isset($_REQUEST['mSignup'])) {
    // Checking for Empty Fields
    if (empty($_REQUEST['mName']) || empty($_REQUEST['mEmail']) || empty($_REQUEST['mPassword'])) {
        $regmsg = '<div class="alert alert-warning mt-2" role="alert">All Fields are Required</div>';
    } else {
        $sql = "SELECT m_email FROM memberlogin_tb WHERE m_email='" . $_REQUEST['mEmail'] . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $regmsg = '<div class="alert alert-warning mt-2" role="alert">Email ID Already Registered</div>';
        } else {
            // Assigning User Values to Variable
            $mName = $_REQUEST['mName'];
            $mEmail = $_REQUEST['mEmail'];
            $mPassword = $_REQUEST['mPassword'];
            $sql = "INSERT INTO memberlogin_tb(m_name, m_email, m_password) VALUES ('$mName','$mEmail', '$mPassword')";
            if ($conn->query($sql) == true) {
                $regmsg = '<div class="alert alert-success mt-2" role="alert">Account Successfully Created</div>';
            } else {
                $regmsg = '<div class="alert alert-danger mt-2" role="alert">Unable to Create Account</div>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(to right, #74ebd5, #9face6);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .registration-card {
            background: #fff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        .registration-header {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .registration-form .form-control {
            border-radius: 10px;
            height: 50px;
            font-size: 1rem;
        }

        .btn-success {
            border-radius: 10px;
            background: #28a745;
            border: none;
            height: 50px;
            font-size: 1.1rem;
            transition: background 0.3s ease;
        }

        .btn-success:hover {
            background: #218838;
        }

        .btn-info {
            border-radius: 10px;
            background: #17a2b8;
            border: none;
            height: 50px;
            font-size: 1.1rem;
            margin-top: 10px;
            transition: background 0.3s ease;
        }

        .btn-info:hover {
            background: #117a8b;
        }

        .form-text {
            font-size: 0.85rem;
        }

        em {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="registration-card">
        <div class="registration-header">PROFITNESS GYM - Create an Account</div>
        <?php if (isset($regmsg)) {
            echo $regmsg;
        } ?>
        <form action="" method="POST" class="registration-form">
            <div class="form-group">
                <label for="name" class="font-weight-bold"><i class="fas fa-user"></i> User Name</label>
                <input type="text" name="mName" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email" class="font-weight-bold"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="mEmail" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password" class="font-weight-bold"><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="mPassword" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" name="mSignup" class="btn btn-success btn-block font-weight-bold">Sign Up</button>
            <em>By clicking Sign Up, you agree to our Terms, Data Policy, and Cookie Policy.</em>
            <div class="text-center">
                <a href="./member/memberLogin.php" class="btn btn-info btn-block font-weight-bold"><i class="fas fa-sign-in-alt"></i> Login</a>
                <small class="form-text">Please login here after signing up.</small>
            </div>
        </form>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>

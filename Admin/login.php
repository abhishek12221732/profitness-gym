<?php
include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_adminlogin'])){
  if(isset($_REQUEST['aEmail'])){
    $aEmail = mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
    $aPassword = mysqli_real_escape_string($conn,trim($_REQUEST['aPassword']));
    $sql = "SELECT a_email, a_password FROM adminlogin_tb WHERE a_email='".$aEmail."' AND a_password='".$aPassword."' limit 1";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
      $_SESSION['is_adminlogin'] = true;
      $_SESSION['aEmail'] = $aEmail;
      // Redirecting to Dashboard page on Correct Email and Pass
      echo "<script> location.href='dashboard.php'; </script>";
      exit;
    } else {
      $msg = '<div class="alert alert-danger mt-2" role="alert">Invalid Email or Password!</div>';
    }
  }
} else {
  echo "<script> location.href='dashboard.php'; </script>";
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
    /* Custom Styling */
    body {
      background: linear-gradient(135deg, #007bff, #00c6ff);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .custom-margin {
      margin-top: 10vh;
    }
    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      padding: 20px;
    }
    .login-card {
      background-color: white;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      padding: 40px;
      width: 100%;
      max-width: 400px;
      animation: slideIn 1s ease-out;
    }
    @keyframes slideIn {
      from {
        transform: translateY(-100%);
      }
      to {
        transform: translateY(0);
      }
    }
    .login-card h2 {
      text-align: center;
      color: #007bff;
      font-weight: 600;
      font-size: 30px;
    }
    .login-card .form-group {
      margin-bottom: 20px;
    }
    .login-card .form-control {
      border-radius: 50px;
      padding: 15px;
      border: 2px solid #007bff;
    }
    .login-card .form-control:focus {
      border-color: #00c6ff;
    }
    .login-card button {
      border-radius: 50px;
      background-color: #007bff;
      color: white;
      border: none;
      font-weight: 600;
      padding: 10px;
      width: 100%;
      transition: background-color 0.3s ease;
    }
    .login-card button:hover {
      background-color: #0056b3;
    }
    .footer-btn {
      text-align: center;
      margin-top: 20px;
    }
    .footer-btn a {
      color: #007bff;
      font-weight: bold;
    }
    .footer-btn a:hover {
      color: #0056b3;
    }
    .alert {
      border-radius: 5px;
    }
  </style>

  <title>Admin Login</title>
</head>

<body>

  <div class="login-container">
    <div class="login-card">
      <h2>Admin Login</h2>
      <?php if(isset($msg)) { echo $msg; } ?>
      <form action="" method="POST">
        <div class="form-group">
          <i class="fas fa-user"></i>
          <label for="aEmail" class="pl-2 font-weight-bold">Email</label>
          <input type="email" name="aEmail" id="aEmail" class="form-control" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
          <i class="fas fa-key"></i>
          <label for="aPassword" class="pl-2 font-weight-bold">Password</label>
          <input type="password" name="aPassword" id="aPassword" class="form-control" placeholder="Enter Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
      <div class="footer-btn">
        <a href="../index.php" class="btn btn-outline-secondary btn-sm">Back to Home</a>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>
</html>

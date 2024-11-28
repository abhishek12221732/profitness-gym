<?php
define('TITLE', 'Contact us');
define('PAGE', 'contact');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='login.php'; </script>";
}
?>

<div class="container my-5">
    <!-- Page Heading -->
    <div class="text-center mb-4">
        <h2 class="text-primary">Contact Gym Member</h2>
        <p class="text-muted">We'd love to hear from you. Please fill out the form below.</p>
    </div>

    <!-- Contact Form -->
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <form action="" method="POST">
                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="Name" class="form-control" placeholder="Your full name" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="Email" class="form-control" placeholder="Your email address" required>
                </div>

                <!-- Message -->
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" name="Message" class="form-control" rows="5" placeholder="Enter your message here..." required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" name="Login" class="btn btn-primary btn-lg px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
// PHPMailer Configuration
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/Exception.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/PHPMailer.php');

if (isset($_POST['Login'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'abhishek91272@gmail.com';
        $mail->Password   = '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('abhishek91272@gmail.com', 'Profitness');
        $mail->addAddress('iamabhishek2301@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Profitness Gym';
        $mail->Body    = "Name: $name <br> Email: $email <br> Message: $message";

        $mail->send();
        echo "<div class='alert alert-success text-center mt-4'>Message has been sent successfully.</div>";
    } catch (Exception $e) {
        echo "<div class='alert alert-danger text-center mt-4'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
    }
}
?>

<?php
include('includes/footer.php'); 
?>

<?php
define('TITLE', 'Member Profile');
define('PAGE', 'memberProfile');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();

if ($_SESSION['is_login']) {
    $mEmail = $_SESSION['mEmail'];
} else {
    echo "<script> location.href='memberLogin.php'; </script>";
}

$sql = "SELECT * FROM memberlogin_tb WHERE m_email='$mEmail'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $mName = $row["m_name"];
}

if (isset($_REQUEST['nameupdate'])) {
    if ($_REQUEST['mName'] == "") {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Please fill all fields</div>';
    } else {
        $mName = $_REQUEST["mName"];
        $sql = "UPDATE memberlogin_tb SET m_name = '$mName' WHERE m_email = '$mEmail'";
        if ($conn->query($sql) == TRUE) {
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Profile updated successfully</div>';
        } else {
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to update profile</div>';
        }
    }
}
?>
<!--  Start Profile Form -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 jumbotron shadow-sm rounded">
            <h3 class="text-center text-dark mb-4">Update Profile Information</h3>
            <form method="POST" class="mx-5">
                <div class="form-group">
                    <label for="inputEmail" class="font-weight-bold">Email</label>
                    <input type="email" class="form-control text-dark" id="inputEmail" value="<?php echo $mEmail ?>" readonly>
                    <small class="form-text text-muted">Note: You cannot change your email address.</small>
                </div>
                <div class="form-group">
                    <label for="inputName" class="font-weight-bold">Name</label>
                    <input type="text" class="form-control" id="inputName" name="mName" value="<?php echo $mName ?>" required>
                </div>
                <button type="submit" class="btn btn-success btn-block shadow-sm font-weight-bold" name="nameupdate">Update Profile</button>
                <?php if (isset($passmsg)) { echo $passmsg; } ?>
            </form>
        </div>
    </div>
</div>
<!-- End Profile Form -->

<?php
include('includes/footer.php'); 
?>

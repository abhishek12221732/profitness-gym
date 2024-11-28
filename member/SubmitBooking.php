<?php
// Define constants
define('TITLE', 'Submit Booking');
define('PAGE', 'SubmitBooking');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['is_login'])) {
    echo "<script> location.href='memberLogin.php'; </script>";
    exit();
}

$mEmail = $_SESSION['mEmail'];

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Process booking form submission
if (isset($_POST['Submitbooking'])) {
    // Validate CSRF token
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('<div class="alert alert-danger">Invalid CSRF token.</div>');
    }

    // Sanitize inputs
    $mname = htmlspecialchars(trim($_POST['membername']));
    $memail = htmlspecialchars(trim($_POST['memberemail']));
    $mmobile = htmlspecialchars(trim($_POST['membermobile']));
    $btype = htmlspecialchars(trim($_POST['bookingtype']));
    $madd1 = htmlspecialchars(trim($_POST['memberadd1']));
    $bdate = htmlspecialchars(trim($_POST['bookingdate']));

    // Check for empty fields
    if (empty($mname) || empty($memail) || empty($mmobile) || empty($btype) || empty($bdate)) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">All fields are required.</div>';
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO submitbookingt_tb (member_name, member_email, member_mobile, member_add1, booking_type, member_date) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $mname, $memail, $mmobile, $madd1, $btype, $bdate);

        if ($stmt->execute()) {
            $genid = $stmt->insert_id;
            $_SESSION['myid'] = $genid;

            // Success message
            $msg = '<div class="alert alert-success" role="alert">Booking made successfully. Your booking ID is ' . $genid . '</div>';
        } else {
            // Error message
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to make booking. Please try again.</div>';
        }

        $stmt->close();
    }
}
?>

<div class="col-sm-6 mt-5 mx-auto jumbotron">
    <h3 class="text-center"><b><u>Make Booking</u></b></h3>
    <form action="SubmitBooking.php" method="POST" class="mx-3">
        <?php if (isset($msg)) echo $msg; ?>
        <div class="form-group">
            <label for="inputName">Full Name</label>
            <input type="text" class="form-control" id="inputName" name="membername" placeholder="Enter name" required>
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="memberemail" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="inputbookingtype">Booking Type</label>
            <select class="form-control" id="inputbookingtype" name="bookingtype" required>
                <option value="">Select list</option>
                <option value="Yoga class">Yoga class</option>
                <option value="Zumba class">Zumba class</option>
                <option value="Cardio class">Cardio class</option>
                <option value="Weight lifting">Weight lifting</option>
                <option value="Endurance Training">Endurance Training</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputMobile">Mobile</label>
            <input type="text" class="form-control" id="inputMobile" name="membermobile" placeholder="Add Phone Number" maxlength="10" onkeypress="isInputNumber(event)" required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" name="memberadd1" placeholder="Add address">
        </div>
        <div class="form-group">
            <label for="inputDate">Date</label>
            <input type="date" class="form-control" id="inputDate" name="bookingdate" required>
        </div>
        <!-- CSRF Token -->
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit" class="btn btn-primary btn-block" name="Submitbooking">Submit</button>
    </form>
</div>

<!-- Only Number for input fields -->
<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>

<?php
include('includes/footer.php'); 
$conn->close();
?>

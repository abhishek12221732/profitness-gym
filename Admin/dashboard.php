<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='login.php'; </script>";
}

$sql = "SELECT * FROM memberLogin_tb";
$result = $conn->query($sql);
$totalMembers = $result->num_rows;

$sql = "SELECT * FROM tbl_events";
$result = $conn->query($sql);
$totalSchedules = $result->num_rows;

$sql = "SELECT * FROM submitbookingt_tb";
$result = $conn->query($sql);
$totalBookings = $result->num_rows;
?>

<div class="container" style="max-width: 1080px;">
    <!-- Greeting -->
    <div class="text-center my-3">
        <h4 class="text-primary">Welcome, Admin!</h4>
        <p class="small text-muted">Here's a quick overview of the system's activities.</p>
    </div>

    <!-- Cards Section -->
    <div class="row text-center">
        <div class="col-4 mt-2">
            <div class="card shadow-sm border-secondary" style="max-width: 14rem;">
                <div class="card-body bg-secondary text-white p-3">
                    <i class="fas fa-calendar-alt fa-2x"></i>
                    <p class="small mt-2 mb-1">Schedules</p>
                    <h5><?php echo $totalSchedules; ?></h5>
                    <a href="view schedule.php" class="btn btn-sm btn-light">Info</a>
                </div>
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="card shadow-sm border-success" style="max-width: 14rem;">
                <div class="card-body bg-success text-white p-3">
                    <i class="fas fa-users fa-2x"></i>
                    <p class="small mt-2 mb-1">Members</p>
                    <h5><?php echo $totalMembers; ?></h5>
                    <a href="member.php" class="btn btn-sm btn-light">Info</a>
                </div>
            </div>
        </div>
        <div class="col-4 mt-2">
            <div class="card shadow-sm border-info" style="max-width: 14rem;">
                <div class="card-body bg-info text-white p-3">
                    <i class="fas fa-book fa-2x"></i>
                    <p class="small mt-2 mb-1">Bookings</p>
                    <h5><?php echo $totalBookings; ?></h5>
                    <a href="bookings.php" class="btn btn-sm btn-light">Info</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="my-4 text-center">
        <h6 class="text-primary">Activity Overview</h6>
        <div class="row justify-content-center">
            <div class="col-6">
                <canvas id="activityChart" style="max-height: 200px;"></canvas>
            </div>
            <div class="col-6">
                <canvas id="memberChart" style="max-height: 200px;"></canvas>
            </div>
        </div>
    </div>

    <!-- Members Table -->
    <div class="my-4">
        <h6 class="text-primary text-center">Registered Members</h6>
        <div class="table-responsive">
            <?php
            $sql = "SELECT * FROM memberLogin_tb";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo '<table class="table table-bordered table-sm table-hover">
                    <thead class="table-secondary small">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["m_login_id"] . '</td>';
                    echo '<td>' . $row["m_name"] . '</td>';
                    echo '<td>' . $row["m_email"] . '</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo '<p class="text-danger text-center small">No registered members found.</p>';
            }
            ?>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const activityData = [<?php echo $totalSchedules; ?>, <?php echo $totalMembers; ?>, <?php echo $totalBookings; ?>];

    const ctx1 = document.getElementById('activityChart').getContext('2d');
    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Schedules', 'Members', 'Bookings'],
            datasets: [{
                data: activityData,
                backgroundColor: ['#6c757d', '#28a745', '#17a2b8']
            }]
        },
        options: {
            maintainAspectRatio: false
        }
    });

    const ctx2 = document.getElementById('memberChart').getContext('2d');
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Members Joined',
                data: [12, 19, 3, 5, 2, 3],
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                tension: 0.4
            }]
        },
        options: {
            maintainAspectRatio: false
        }
    });
</script>

<?php
include('includes/footer.php'); 
?>

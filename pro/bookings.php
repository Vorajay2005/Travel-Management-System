<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: signin.php");
    exit();
}
require 'db.php';


$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn, $sql);
?>

<?php include 'header.php'; ?>

<div class="container">
    <h2>All Bookings</h2>
    <div style="margin-bottom: 20px;">
    <a href="create_booking.php" class="btn btn-success">Create New Booking</a>
    
</div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Package ID</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Comment</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['package_id']; ?></td>
                    <td><?php echo $row['from_date']; ?></td>
                    <td><?php echo $row['to_date']; ?></td>
                    <td><?php echo htmlspecialchars($row['comment']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody> 
    </table>
</div>

<?php include 'footer.php'; ?>

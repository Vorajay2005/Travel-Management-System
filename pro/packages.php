<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: signin.php");
    exit();
}
require 'db.php';

$active_result = mysqli_query($conn, "SELECT * FROM packages WHERE status = 'active'");
$all_result = mysqli_query($conn, "SELECT * FROM packages");
?>

<?php include 'header.php'; ?>

<div class="container">
    <h2>Travel Packages</h2>

    <div style="margin-bottom: 20px;">
        <a href="create_package.php" class="btn btn-success">Create New Package</a>
        <a href="bookings.php" class="btn btn-info">Go to Bookings</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Type</th>
                <th>INR</th>
                <th>USD</th>
                <th>Status</th>
                <th>Action</th> 
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($all_result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo ($row['package_name']); ?></td>
                    <td><?php echo ($row['package_location']); ?></td>
                    <td><?php echo ($row['package_type']); ?></td>
                    <td>₹<?php echo $row['package_price_ind']; ?></td>
                    <td>$<?php echo $row['package_price_usa']; ?></td>
                    <td><?php echo ($row['status']); ?></td>
                    <td>
                        <a href="view_package.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-xs">View</a>
                        <a href="edit_package.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-xs">Edit</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>

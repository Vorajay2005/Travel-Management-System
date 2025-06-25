<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: signin.php");
    exit();
}
require 'db.php';

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<?php include 'header.php'; ?>

<div class="container">
    <h2>All Users</h2>

    <div style="margin-bottom: 20px;">
        <a href="signup.php" class="btn btn-success">Add User</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Mobile</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo ($row['name']); ?></td>
                    <td><?php echo ($row['mobile']); ?></td>
                    <td><?php echo ($row['email']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>

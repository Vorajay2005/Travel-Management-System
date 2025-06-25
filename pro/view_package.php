<?php
session_start();
require 'db.php';


if (!isset($_GET['id'])) {
    header("Location: packages.php");
    exit();
}

$id = intval($_GET['id']); 


$sql = "SELECT * FROM packages WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    $error = "Package not found.";
} else {
    $package = mysqli_fetch_assoc($result);
}
?>

<?php include 'header.php'; ?>

<div class="container">
    <h2>Package Details</h2>

    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php else: ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><?php echo htmlspecialchars($package['package_name']); ?></strong>
            </div>
            <div class="panel-body">
                <p><strong>Location:</strong> <?php echo htmlspecialchars($package['package_location']); ?></p>
                <p><strong>Type:</strong> <?php echo htmlspecialchars($package['package_type']); ?></p>
                <p><strong>Features:</strong> <?php echo htmlspecialchars($package['package_features']); ?></p>
                <p><strong>Details:</strong> <?php echo htmlspecialchars($package['package_details']); ?></p>
                <p><strong>Price (INR):</strong> ₹<?php echo $package['package_price_ind']; ?></p>
                <p><strong>Price (USD):</strong> $<?php echo $package['package_price_usa']; ?></p>
                <p><strong>Status:</strong> <?php echo htmlspecialchars($package['status']); ?></p>
                <a href="packages.php" class="btn btn-default">Back to Packages</a>
            </div>
        </div>
    <?php endif; ?>
</div>

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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['package_name'];
    $location = $_POST['package_location'];
    $type = $_POST['package_type'];
    $features = $_POST['package_features'];
    $details = $_POST['package_details'];
    $price_inr = $_POST['package_price_ind'];
    $price_usd = $_POST['package_price_usa'];
    $status = $_POST['status'];

    $update_sql = "UPDATE packages SET 
        package_name = '$name',
        package_location = '$location',
        package_type = '$type',
        package_features = '$features',
        package_details = '$details',
        package_price_ind = '$price_inr',
        package_price_usa = '$price_usd',
        status = '$status'
        WHERE id = $id";

    if (mysqli_query($conn, $update_sql)) {
        header("Location: packages.php");
        exit();
    } else {
        $error = "Failed to update package.";
    }
}
?>

<?php include 'header.php'; ?>
<div class="container">
    <h2>Edit Package</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        <div class="row">
            <div class="form-group col-sm-3">
                <label>Package Name</label>
                <input type="text" name="package_name" class="form-control" value="<?php echo htmlspecialchars($package['package_name']); ?>" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Location</label>
                <input type="text" name="package_location" class="form-control" value="<?php echo htmlspecialchars($package['package_location']); ?>" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Type</label>
                <input type="text" name="package_type" class="form-control" value="<?php echo htmlspecialchars($package['package_type']); ?>" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Features</label>
                <input type="text" name="package_features" class="form-control" value="<?php echo htmlspecialchars($package['package_features']); ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label>Details</label>
                <textarea name="package_details" class="form-control" required><?php echo htmlspecialchars($package['package_details']); ?></textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-4">
                <label>Price (INR)</label>
                <input type="number" name="package_price_ind" class="form-control" value="<?php echo $package['package_price_ind']; ?>" required>
            </div>
            <div class="form-group col-sm-4">
                <label>Price (USD)</label>
                <input type="number" name="package_price_usa" class="form-control" value="<?php echo $package['package_price_usa']; ?>" required>
            </div>
            <div class="form-group col-sm-4">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="active" <?php if($package['status'] === 'active') echo 'selected'; ?>>Active</option>
                    <option value="inactive" <?php if($package['status'] === 'inactive') echo 'selected'; ?>>Inactive</option>
                </select>
            </div>
        </div>

        <button class="btn btn-primary">Update Package</button>
        <a href="packages.php" class="btn btn-default">Cancel</a>
    </form>
</div>
<?php include 'footer.php'; ?>

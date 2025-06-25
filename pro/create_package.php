<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['package_name'];
    $location = $_POST['package_location'];
    $type = $_POST['package_type'];
    $features = $_POST['package_features'];
    $details = $_POST['package_details'];
    $price_inr = $_POST['package_price_ind'];
    $price_usd = $_POST['package_price_usa'];
    $status = $_POST['status'];

    $sql = "INSERT INTO packages (package_name, package_location, package_type, package_features, package_details, package_price_ind, package_price_usa, status)
            VALUES ('$name', '$location', '$type', '$features', '$details', '$price_inr', '$price_usd', '$status')";

    if (mysqli_query($conn, $sql)) {
        header("Location: packages.php");
        exit();
    } else {
        $error = "Failed to create package.";
    }
}
?>

<?php include 'header.php'; ?>
<div class="container">
    <h2>Create New Package</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <div class="row">
            <div class="form-group col-sm-3">
                <label>Package Name</label>
                <input type="text" name="package_name" class="form-control" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Location</label>
                <input type="text" name="package_location" class="form-control" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Type</label>
                <input type="text" name="package_type" class="form-control" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Features</label>
                <input type="text" name="package_features" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label>Details</label>
                <textarea name="package_details" class="form-control" required></textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-4">
                <label>Price (INR)</label>
                <input type="number" name="package_price_ind" class="form-control" required>
            </div>
            <div class="form-group col-sm-4">
                <label>Price (USD)</label>
                <input type="number" name="package_price_usa" class="form-control" required>
            </div>
            <div class="form-group col-sm-4">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>

        <button class="btn btn-primary">Create Package</button>
    </form>
</div>
<?php include 'footer.php'; ?>

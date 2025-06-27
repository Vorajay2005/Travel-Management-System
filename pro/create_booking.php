<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['package_id'];
    $from_d = $_POST['from_date'];
    $to_d = $_POST['to_date'];
    $com = $_POST['comment'];
    $status = $_POST['status'];
   

    $sql = "INSERT INTO bookings (package_id, from_date, to_date, comments, status)
            VALUES ('$id', '$from_d', '$to_d', '$com','$status')";

    if (mysqli_query($conn, $sql)) {
        header("Location: bookings.php");
        exit();
    } else {
        $error = "Failed to create booking.";
    }
}
?>

<?php include 'header.php'; ?>
<div class="container">
    <h2>Create New Booking</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
       
        <div class="row">
            <div class="form-group col-sm-6">
                <label>Package Id</label>
                <input type="text" name="package_id" class="form-control" required>
            </div>
            <div class="form-group col-sm-6">
                <label>Comment</label>
                <input type="text" name="comment" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label>Status</label>
                <input type="text" name="status" class="form-control" required>
            </div>
        </div>

       
        <div class="row">
            <div class="form-group col-sm-6">
                <label>From Date</label>
                <input type="text" name="from_date" class="form-control" required>
            </div>
            <div class="form-group col-sm-6">
                <label>To Date</label>
                <input type="text" name="to_date" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <button type="submit" class="btn btn-primary">Create Booking</button>
            </div>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>

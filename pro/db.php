<?php
$conn = mysqli_connect("localhost", "root", "", "tourmanagementsystem");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

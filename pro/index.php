<?php
session_start();
if (isset($_SESSION['registered'])) {
    echo "<script>alert('Registered successfully');</script>";
    unset($_SESSION['registered']);
}
?>


<?php include 'header.php'; ?>


<div class="hero-image" style="width: 100%; height: 90vh; background: url('assets/b.jpg') no-repeat center center; background-size: cover;"></div>

<?php include 'footer.php'; ?>

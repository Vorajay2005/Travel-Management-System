<?php
session_start(); 
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['fullname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, mobile, email, password) VALUES ('$name', '$mobile', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['registered'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Registration failed.";
    }
}
?>

<?php include 'header.php'; ?>
<div class="container">
    <h2>Register</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="fullname" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="mobile" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary">Register</button>
    </form>
</div>
<?php include 'footer.php'; ?>

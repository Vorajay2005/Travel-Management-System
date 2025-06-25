<?php 
if (session_status() === PHP_SESSION_NONE) 
{ session_start(); } 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Travel System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body { margin: 0; padding: 0; }
        .navbar-brand { font-size: 24px; }
        footer { background: #333; color: #fff; text-align: center; padding: 10px 0; }
    </style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Travel System</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php">Home</a></li>
      <?php if(isset($_SESSION['user'])): ?>
        <li><a href="users.php">Users</a></li>
      <?php endif; ?>
      <li><a href="packages.php">Packages</a></li>
      <li><a href="bookings.php">Bookings</a></li>
      <li><a href="about.php">About</a></li>
      <?php if(isset($_SESSION['user'])): ?>
        <li><a href="logout.php">Logout</a></li>
      <?php else: ?>
        <li><a href="signin.php">Sign In</a></li>
        <li><a href="signup.php">Sign Up</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

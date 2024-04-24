<?php
session_start(); // Start the session

// Check if 'email' is set in the session
if (!isset($_SESSION['email'])) {
    header("location:login.php"); // Redirect to login page if 'email' is not set
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard page</title>
</head>
<body>
<h4>Dashboard Page</h4>
<p>This is <?php echo $_SESSION['email']; ?></p> <!-- Display the email stored in the session -->
</body>
</html>

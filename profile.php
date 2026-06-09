<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>

<h2>User Profile</h2>

<p><strong>Name:</strong> <?php echo $_SESSION['fullname']; ?></p>
<p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>

<a href="logout.php">Logout</a>

</body>
</html>
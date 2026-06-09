<?php
session_start();

if(!isset($_SESSION['admin_id']))
{
    header("Location: login.php");
    exit();
}
?>

<h1>Welcome Admin</h1>

<p><?php echo $_SESSION['admin_name']; ?></p>

<a href="logout.php">Logout</a>
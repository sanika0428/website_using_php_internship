<?php
include "../db.php";

$id=$_GET['id'];

$result=mysqli_query($conn,
"SELECT * FROM categories WHERE id='$id'");

$row=mysqli_fetch_assoc($result);
?>

<h2>Category Details</h2>

<p>ID: <?php echo $row['id']; ?></p>

<p>Name: <?php echo $row['category_name']; ?></p>

<p>Parent ID: <?php echo $row['parent_id']; ?></p>
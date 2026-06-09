<?php
include "../db.php";

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM products WHERE id='$id'");

$row = mysqli_fetch_assoc($result);
?>

<h2>Product Details</h2>

<img src="../uploads/<?php echo $row['image']; ?>"
width="200">

<p>Title: <?php echo $row['title']; ?></p>

<p>Price: <?php echo $row['price']; ?></p>

<p>Description: <?php echo $row['description']; ?></p>
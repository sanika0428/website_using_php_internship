<?php
include "../db.php";

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM orders WHERE id='$id'");

$row = mysqli_fetch_assoc($result);
?>

<h1>Order Details</h1>

<p>
Order ID:
<?php echo $row['id']; ?>
</p>

<p>
Customer Name:
<?php echo $row['customer_name']; ?>
</p>

<p>
Customer Email:
<?php echo $row['customer_email']; ?>
</p>

<p>
Date:
<?php echo $row['order_date']; ?>
</p>
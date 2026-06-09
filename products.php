<?php
include "db.php";

$result = mysqli_query($conn,"SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>NGO Campaigns</title>
</head>
<body>

<h2>Our Campaigns</h2>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div style="border:1px solid black;padding:10px;margin:10px;">

<img src="uploads/<?php echo $row['image']; ?>"
width="150">

<h3><?php echo $row['title']; ?></h3>

<p>
Donation Amount:
₹<?php echo $row['price']; ?>
</p>

<p>
<?php echo $row['description']; ?>
</p>

<a href="single_product.php?id=<?php echo $row['id']; ?>">
View Product
</a>

</div>

<?php } ?>

</body>
</html>
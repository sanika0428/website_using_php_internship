<?php
session_start();
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM products WHERE id='$id'");

$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Product Details</title>
</head>
<body>

<h2><?php echo $product['title']; ?></h2>

<img src="uploads/<?php echo $product['image']; ?>"
width="250">

<p>
Price: ₹<?php echo $product['price']; ?>
</p>

<p>
<?php echo $product['description']; ?>
</p>

<form action="cart.php" method="POST">

<input type="hidden"
name="product_id"
value="<?php echo $product['id']; ?>">

<label>Quantity:</label>

<input type="number"
name="quantity"
value="1"
min="1">

<br><br>

<button type="submit" name="add_to_cart">
Add To Cart
</button>

</form>

</body>
</html>
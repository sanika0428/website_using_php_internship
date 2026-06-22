<?php
session_start();
include "db.php";

if(isset($_POST['add_to_cart']))
{
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $_SESSION['cart'][$product_id] = $quantity;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Cart</title>
</head>
<body>

<h2>Shopping Cart</h2>

<?php

if(isset($_SESSION['cart']))
{
    foreach($_SESSION['cart'] as $product_id => $quantity)
    {
        $result = mysqli_query($conn,
        "SELECT * FROM products WHERE id='$product_id'");

        $product = mysqli_fetch_assoc($result);

        echo "<hr>";

        echo "<h3>".$product['title']."</h3>";

        echo "<p>Price: ₹".$product['price']."</p>";

        echo "<p>Quantity: ".$quantity."</p>";

        echo "<p>Total: ₹".
        ($product['price'] * $quantity).
        "</p>";
    }
}
else
{
    echo "Cart is Empty";
}
?>

<br><br>

<a href="products.php">Back To Products</a>

<br><br>

<a href="checkout.php">
<button>Proceed to Checkout</button>
</a>

</body>
</html>
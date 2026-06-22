<?php
session_start();

unset($_SESSION['cart']);

echo "<h1>Payment Successful!</h1>";
echo "<h3>Thank you for your order.</h3>";

echo "<br><a href='products.php'>Continue Shopping</a>";
?>
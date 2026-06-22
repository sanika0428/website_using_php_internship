<?php
session_start();
include "db.php";
require "send_mail.php";

$message = "";

if(isset($_POST['place_order']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO orders (customer_name, customer_email)
            VALUES ('$name','$email')";

    if(mysqli_query($conn, $sql))
    {
        // Send Email
        sendMail($email, $name);

        // Empty Cart
        unset($_SESSION['cart']);

        $message = "Order Placed Successfully!";
    }
    else
    {
        $message = mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>

<h2>Checkout</h2>

<?php
if($message!="")
{
    echo "<h3>$message</h3>";
}
?>

<form method="POST">

<label>Name</label>
<br><br>

<input type="text"
name="name"
required>

<br><br>

<label>Email</label>
<br><br>

<input type="email"
name="email"
required>

<br><br>

<input type="submit"
name="place_order"
value="Place Order">

</form>

<br><br>

<a href="cart.php">Back to Cart</a>

</body>
</html>
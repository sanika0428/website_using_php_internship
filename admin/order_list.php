<?php
include "../db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order List</title>
</head>
<body>

<h1>Order List</h1>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Customer Name</th>
    <th>Email</th>
    <th>Date</th>
    <th>Action</th>
</tr>

<?php

$result = mysqli_query($conn, "SELECT * FROM orders");

while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['customer_name']; ?></td>
    <td><?php echo $row['customer_email']; ?></td>
    <td><?php echo $row['order_date']; ?></td>

    <td>
        <a href="view_order.php?id=<?php echo $row['id']; ?>">
            View
        </a>
    </td>
</tr>

<?php
}
?>

</table>

</body>
</html>
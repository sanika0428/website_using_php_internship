<?php
include "../db.php";

$sql = "SELECT products.*, categories.category_name
FROM products
LEFT JOIN categories
ON products.category_id = categories.id";

$result = mysqli_query($conn,$sql);
?>

<h2>Product List</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Image</th>
    <th>Title</th>
    <th>Price</th>
    <th>Category</th>
    <th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td>
<img src="../uploads/<?php echo $row['image']; ?>"
width="100">
</td>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['price']; ?></td>

<td><?php echo $row['category_name']; ?></td>

<td>
<a href="view_product.php?id=<?php echo $row['id']; ?>">View</a>

<a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a>

<a href="delete_product.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>

</tr>

<?php } ?>

</table>
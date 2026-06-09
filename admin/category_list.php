<?php
include "../db.php";

$result = mysqli_query($conn,"SELECT * FROM categories");
?>

<h2>Category List</h2>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Category</th>
    <th>Parent ID</th>
    <th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['category_name']; ?></td>
    <td><?php echo $row['parent_id']; ?></td>

    <td>
        <a href="view_category.php?id=<?php echo $row['id']; ?>">View</a>

        <a href="edit_category.php?id=<?php echo $row['id']; ?>">Edit</a>

        <a href="delete_category.php?id=<?php echo $row['id']; ?>">Delete</a>
    </td>
</tr>

<?php } ?>

</table>
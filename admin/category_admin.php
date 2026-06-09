<?php
include "../db.php";

if(isset($_POST['save']))
{
    $category_name = $_POST['category_name'];
    $parent_id = $_POST['parent_id'];

    $sql = "INSERT INTO categories(category_name,parent_id)
            VALUES('$category_name','$parent_id')";

    mysqli_query($conn,$sql);
    echo "Category Added Successfully";
}
?>

<form method="POST">

Category Name:
<input type="text" name="category_name" required>

<br><br>

Parent Category:

<select name="parent_id">

<option value="0">Main Category</option>

<?php

$result = mysqli_query($conn,"SELECT * FROM categories");

while($row=mysqli_fetch_assoc($result))
{
?>

<option value="<?php echo $row['id']; ?>">
<?php echo $row['category_name']; ?>
</option>

<?php } ?>

</select>

<br><br>

<button name="save">Save Category</button>

</form>
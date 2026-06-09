<?php
include "../db.php";

if(isset($_POST['save']))
{
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];

    $image = $_FILES['image']['name'];

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "../uploads/".$image
    );

    $sql = "INSERT INTO products
    (category_id,title,price,description,image)

    VALUES

    ('$category_id','$title','$price',
    '$description','$image')";

    mysqli_query($conn,$sql);

    echo "Product Added Successfully";
}
?>

<form method="POST" enctype="multipart/form-data">

Title:
<input type="text" name="title">

<br><br>

Price:
<input type="text" name="price">

<br><br>

Description:

<textarea name="description"></textarea>

<br><br>

Category:

<select name="category_id">

<?php

$result=mysqli_query($conn,
"SELECT * FROM categories");

while($row=mysqli_fetch_assoc($result))
{
?>

<option value="<?php echo $row['id']; ?>">
<?php echo $row['category_name']; ?>
</option>

<?php } ?>

</select>

<br><br>

Image:

<input type="file" name="image">

<br><br>

<button name="save">Save Product</button>

</form>
<?php

include "../db.php";

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM products WHERE id='$id'");

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    mysqli_query($conn,
    "UPDATE products
    SET title='$title',
    price='$price',
    description='$description'
    WHERE id='$id'");

    header("Location: product_list.php");
}
?>

<form method="POST">

Title<br>
<input type="text"
name="title"
value="<?php echo $row['title']; ?>">

<br><br>

Price<br>
<input type="text"
name="price"
value="<?php echo $row['price']; ?>">

<br><br>

Description<br>
<textarea name="description"><?php echo $row['description']; ?></textarea>

<br><br>

<button name="update">Update Product</button>

</form>
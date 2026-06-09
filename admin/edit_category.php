<?php

include "../db.php";

$id=$_GET['id'];

$result=mysqli_query($conn,
"SELECT * FROM categories WHERE id='$id'");

$row=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $category_name=$_POST['category_name'];

    mysqli_query($conn,
    "UPDATE categories
    SET category_name='$category_name'
    WHERE id='$id'");

    header("Location: category_list.php");
}
?>

<form method="POST">

Category Name

<input type="text"
name="category_name"
value="<?php echo $row['category_name']; ?>">

<button name="update">
Update
</button>

</form>
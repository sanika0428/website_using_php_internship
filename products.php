<?php
include "db.php";

// Search and Filter values
$search = "";
$category = "";

// Base query
$sql = "SELECT * FROM products WHERE 1";

// Search
if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = $_GET['search'];
    $sql .= " AND title LIKE '%$search%'";
}

// Category Filter
if(isset($_GET['category']) && $_GET['category'] != "")
{
    $category = $_GET['category'];
    $sql .= " AND category_id='$category'";
}

// Execute query
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>

    <style>
        body{
            font-family: Arial;
            margin:20px;
        }

        .product{
            border:1px solid #ccc;
            padding:15px;
            margin-bottom:20px;
            width:300px;
        }

        img{
            width:200px;
            height:200px;
            object-fit:cover;
        }

        input,select{
            padding:8px;
            margin:5px;
        }

        button{
            padding:8px 15px;
        }
    </style>

</head>

<body>

<h2>Our Products</h2>

<!-- Search + Filter Form -->

<form method="GET">

<input type="text"
name="search"
placeholder="Search Product"
value="<?php echo $search; ?>">

<select name="category">

<option value="">All Categories</option>

<?php

$cat_query = mysqli_query($conn,"SELECT * FROM categories");

while($cat = mysqli_fetch_assoc($cat_query))
{

?>

<option value="<?php echo $cat['id']; ?>"

<?php
if($category == $cat['id'])
{
    echo "selected";
}
?>

>

<?php echo $cat['category_name']; ?>

</option>

<?php

}

?>

</select>

<button type="submit">

Search / Filter

</button>

</form>

<hr>

<?php

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

?>

<div class="product">

<img src="uploads/<?php echo $row['image']; ?>">

<h3>

<?php echo $row['title']; ?>

</h3>

<p>

<strong>Price :</strong>

₹<?php echo $row['price']; ?>

</p>

<p>

<?php echo $row['description']; ?>

</p>

<a href="single_product.php?id=<?php echo $row['id']; ?>">

<button>

View Product

</button>

</a>

</div>

<?php

}

}
else
{

echo "<h3>No Products Found</h3>";

}

?>

</body>

</html>
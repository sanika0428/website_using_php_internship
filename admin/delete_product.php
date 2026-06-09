<?php

include "../db.php";

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM products WHERE id='$id'");

header("Location: product_list.php");
exit();

?><?php

include "../db.php";

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM products WHERE id='$id'");

header("Location: product_list.php");
exit();

?>
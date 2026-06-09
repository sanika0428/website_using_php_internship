<?php
include 'db.php';

if(isset($_POST['reset'])){

    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    $sql = "UPDATE users
            SET password='$newpassword'
            WHERE email='$email'";

    if(mysqli_query($conn,$sql)){
        echo "Password Updated Successfully";
    }else{
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
</head>
<body>

<h2>Reset Password</h2>

<form method="POST">

<input type="email" name="email" placeholder="Email" required><br><br>

<input type="password" name="password" placeholder="New Password" required><br><br>

<button type="submit" name="reset">Reset Password</button>

</form>

</body>
</html>
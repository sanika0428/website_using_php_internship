<?php
session_start();
include 'db.php';

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['id'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['email'] = $user['email'];

        header("Location: profile.php");
        exit();
    }
    else
    {
        $error = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Hope Foundation</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
            text-align:center;
            padding-top:50px;
        }

        .container{
            width:350px;
            margin:auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.2);
        }

        input{
            width:90%;
            padding:10px;
            margin:10px 0;
        }

        button{
            background:#28a745;
            color:white;
            border:none;
            padding:10px 20px;
            cursor:pointer;
        }

        a{
            text-decoration:none;
        }

        .error{
            color:red;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Login</h2>

    <?php
    if(isset($error))
    {
        echo "<p class='error'>$error</p>";
    }
    ?>

    <form method="POST">

        <input type="email" name="email" placeholder="Enter Email" required>

        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit" name="login">Login</button>

    </form>

    <br>

    <a href="forgot_password.php">Forgot Password?</a>

    <br><br>

    <a href="register.php">Create New Account</a>

</div>

</body>
</html>
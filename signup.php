<?php
if(isset($_POST['submit'])){
    include "connection.php";
    $username=mysqli_real_escape_string($conn,$_POST['user']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['pass']);
    $cpassword=mysqli_real_escape_string($conn,$_POST['cpass']);

    $sql="select * from users where username='$username'";
    $result=mysqli_query($conn,$sql);
    $count_user=mysqli_num_rows($result);

    $sql="select * from users where email='$email'";
    $result=mysqli_query($conn,$sql);
    $count_user=mysqli_num_rows($result);

    if($count_user==0){
        if($password==$cpassword){
            $hash=password_hash($password, PASSWORD_DEFAULT);
            $sql="insert into users(username,email,password) values('$username','$email','$hash')";
            $result = mysqli_query($conn,$sql);
            echo "<script>alert('Signup Successful!')</script>";
            echo "<script>window.location.href='login.php';</script>";
        }
        else
        {
            echo "<script>alert('passwords do not match!!!')</script>";
            echo "<script>window.location.href='signup.php';</script>";
        }

    }
    else{
        echo"<script>alert('user already exists!!!')</script>";
        echo "<script>window.location.href='login.php';</script>";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Traffic Signal Detector</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            text-decoration:none;
            border:none;
            outline:none;
            scroll-behavior:smooth;
            font-family: 'Poppins',sans-serif;

        }
        #form {
            width: 400px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        :root{
            --bg-color:#1f242d !important;
            --second-bg-color:#323946 !important;
        }

        body{
            background:var(--bg-color) !important;
            color:var(--text-color) !important;
        }
    </style>
  </head>
  <body>
  <?php
    include "navbar.php";
  ?>
    <div id="form">
        <h1>Signup Form</h1>
        <form name="form" action="signup.php" method="post">
            <label>Enter Username</label>
            <input type="text" id="user" name="user" required><br><br>
            <label>Enter Email</label>
            <input type="email" id="email" name="email" required><br><br>
            <label>Enter Password</label>
            <input type="password" id="pass" name="pass" required><br><br>
            <label>Retype Password</label>
            <input type="password" id="cpass" name="cpass" required><br><br>
            <input type="submit" id="btn" value="Signup" name="submit">
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
  </body>

</html>
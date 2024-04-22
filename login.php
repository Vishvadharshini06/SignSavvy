<?php
if(isset($_POST['submit'])){
    include "connection.php";
    $username=mysqli_real_escape_string($conn,$_POST['user']);
    $password=mysqli_real_escape_string($conn,$_POST['pass']);

    $sql="select * from users where username='$username' or email='$username'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

    if($row)
    {
        if(password_verify($password,$row['password'])){
            // header("Location: signdetection file path");
        }
        else{
            echo "<script>alert('password incorrect')</script>";
        }
    }
    else{
        echo '<script>alert("Invalid username or password!!")
        window.location.href="login.php"</script>';
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignSavvy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       :root{
            --bg-color:#1f242d !important;
            --second-bg-color:#323946 !important;
        }

        body{
            background:var(--bg-color) !important;
            color:var(--text-color) !important;
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
    </style>
  </head>
  <body>
  <?php
    include "navbar.php";
  ?>
    <div id="form">
        <h1>Login Form</h1>
        <form name="form" action="login.php" method="post">
            <label>Enter Username/Email</label>
            <input type="text" id="user" name="user" required><br><br>
            <label>Enter Password</label>
            <input type="password" id="pass" name="pass" required><br><br>
            <input type="submit" id="btn" value="Login" name="submit">
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php
include "connect.php";

if (isset($_POST['submit'])){   
    $user_name=$_POST['user_name'];
    $email=$_POST['email'];

    $sql="insert into`users` (user_name, email) values('$user_name','$email')";
    $result=mysqli_query($con, $sql);
    
    if(!$result){
        die(mysqli_error($con));
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" <title>
    <title> Users </title>
</head>

<body>

    <div class="container my-5">
        <form method="POST">

            <div class="form-group">
            <label>user_name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="user_name" autocomplete="off">
            </div>

            <div class="form-group">
            <label>email</label>
            <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>
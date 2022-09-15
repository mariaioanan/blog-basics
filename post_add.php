<?php 
include "connect.php";

if (isset($_POST['submit'])){   
    $title=$_POST['title'];
    $description=$_POST['description'];

    $sql="insert into`posts` (title, description) values('$title','$description')";
    $result=mysqli_query($con, $sql);

    if(!$result){
        die(mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" <title>
    <title>posts_add</title>
</head>
<body>

<div class="container my-5">
        <form method="POST" >

            <div class="form-group">
            <label>title</label>
            <input type="text" class="form-control" placeholder="Enter your title" name="title" autocomplete="off">
            </div>

            <div class="form-group">
            <label>description</label>
            <input type="text" class="form-control" placeholder="Enter your description" name="description" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>

            <a href="posts.php">view all posts</a>

        </form>
        <div class="prev-comments"> 
            <div class="single-item">

            </div>
        </div>
    </div>

</body>
</html>

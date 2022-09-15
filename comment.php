<?php
include 'connect.php';

if (isset($_POST['submit'])){   
    $user_name=$_POST['user_name'];
    $email=$_POST['email'];
    $comment=$_POST['comment'];
    $post_id = $_POST['post_id'];
  
    $sql="insert into`comments` (user_name,email,comment,posts_id) values('$user_name','$email','$comment','$post_id')";
    $result=mysqli_query($con, $sql);

    $user_name=$_POST['user_name'];
    $email=$_POST['email'];
    $comment=$_POST['comment'];

    // header('Location:../posts.php?id=5');
     //action="posts.php">

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
    <title> comment </title>
</head>

<body>
<header>
    <div class="container my-5">
        <form method="POST" class="form" action="comment.php">

            <div class="form-group">
            <label>user_name</label>
            <input type="text" class="form-control" placeholder="Enter your username" name="user_name" autocomplete="off">
            </div>

            <div class="form-group">
            <label>email</label>
            <input type="text" class="form-control" placeholder="Enter your email" name="email" autocomplete="off">
            </div>

            <div class="form-group">
            <label>Comment</label>
            <input type="text" class="form-control" placeholder="Enter your comments" name="comment" autocomplete="off">
            </div>

            <input hidden value='<?php echo $_GET["post_id"] ?>' name="post_id">

            <div class="btn btn-primary">
            <button type="submit" class="btn btn-primary" name="submit">Post comment</button>
            <a href="posts.php" >view all posts</a>
            
</div>
        </form>
    </div>

</body>

</html>
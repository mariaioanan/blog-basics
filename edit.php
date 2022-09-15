
<?php
include 'connect.php';
$post_id=$_GET['editpost_id'];

if (isset($_POST['submit'])){   
    $title=$_POST['title'];
    $description=$_POST['description'];
    
    $sql= "update `posts`
            set title='{$title}', description ='{$description}'
            where id=".$post_id;
    
    $result=mysqli_query($con, $sql);

    if(!$result){
        die(mysqli_error($con));
    }
}



$sql="select title, description from `posts` where id=".$post_id;
$result=mysqli_query($con, $sql);
$row_posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edit</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" </head>

<form method="POST" action="">
 <div class="form-group">
 <label>title</label>
 <input type="text" class="form-control" placeholder="Enter your title" name="title" value="<?php echo $row_posts[0]['title']; ?>" autocomplete="off">
 </div>

 <div class="form-group">
 <label>description</label>
 <input type="text" class="form-control" placeholder="Enter your comment" name="description" value="<?php echo $row_posts[0]['description']; ?>" autocomplete="off">
 </div>
 <div class="btn btn-primary">
            <button type="submit" class="btn btn-primary" name="submit">update post</button>
            <a href="posts.php" >view all posts</a>
 </div>
</form>
 <?php

?>

</head>






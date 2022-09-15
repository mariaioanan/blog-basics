<?php
include 'connect.php';
if(isset($_GET['comment_id'])){
    $comment_id=$_GET['comment_id'];
if (isset($_POST['submit'])) {
    $comment=$_POST['comment'];
    $curent_post_comment_sql="update `comments`
                              set comment='{$comment}'
                              where id=".$comment_id;
                              
    $result_comments=mysqli_query($con, $curent_post_comment_sql);
    if (!$result_comments) {
        die(mysqli_error($con));
    }
}
}
$curent_post_comment_sql= "select id, comment from`comments` where id=".$comment_id;
$result_comments = mysqli_query($con, $curent_post_comment_sql); 
if (!$result_comments) {
    die(mysqli_error($con));
}
$row_comments = mysqli_fetch_all($result_comments, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edit_comment</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" </head>

<form method="POST" action="">
 <div class="form-group">
 <label>comment</label>
 <input type="text" class="form-control" placeholder="Enter your comment" name="comment" value="<?php echo $row_comments[0]['comment']; ?>" autocomplete="off">
 </div>

 <div class="btn btn-primary">
            <button type="submit" class="btn btn-primary" name="submit">update post</button>
            <a href="posts.php" >view all posts</a>
 </div>
</form>

</head>

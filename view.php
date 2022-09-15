<?php
include 'connect.php';

if(isset($_GET['viewpost_id']))
{
    $post_id=$_GET['viewpost_id'];
    $curent_post_sql = "select id, title, description from`posts` where id=".$post_id;
    $curent_post = mysqli_query($con, $curent_post_sql);

    $curent_post_comment_sql= "select id, user_name, created_at, comment, email,posts_id from`comments` where posts_id=".$post_id;

    $curent_post_comment = mysqli_query($con, $curent_post_comment_sql);

    $row_posts = mysqli_fetch_all($curent_post, MYSQLI_ASSOC);
    $row_comments = mysqli_fetch_all($curent_post_comment, MYSQLI_ASSOC);
    

}else{
    echo "Try again";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>view</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" </head>

<?php

 //echo $curent_post . " " .  $curent_post_comment;


echo  $row_posts[0]['id']."\n";
echo  $row_posts[0]['title']."\n";
echo  $row_posts[0]['description']."\n";

echo "<button class='btn btn-primary'><a href='comment.php?post_id=" . $post_id . "' class='text-light'>add comment</a></button>";
echo "<button class='btn btn-primary'><a href='edit.php?editpost_id=" . $post_id . "' class='text-light'>edit</a></button>".'<br>';
// echo  $row_comments[0]['user_name'];
// echo  $row_comments[0]['created_at'];  
// echo  $row_comments[0]['comment'];
// echo  $row_comments[0]['email'];
// echo  $row_comments[0]['posts_id'];

$i=0;
$j=0;    
while( $i < count($row_comments)){
    
    foreach($row_comments[$i] as $key => $row_comment){
       $id= $row_comments[$i]['id'];
        echo $key;
        echo ": ";
        echo $row_comment;
        echo '<br>';

    } 
    
    $i++ ;
    echo '<form method="POST" action="edit_comment.php?comment_id=' . $id . '&post_id=' . $post_id .'"> 
    <button class="btn btn-primary" type="submit">edit</button>
    </form>';

    echo '<form method="POST" action="delete_comment.php?id='. $id .'"> 
    <button class="btn btn-danger" type="submit">Delete</button>
    </form>';

    echo "<button class='btn btn-primary'><a href='commentToComment.php?post_id=" . $post_id ."&parent_comment_id=". $id ."' class='text-light'>add comment</a></button>";

}
 


?>

</head>



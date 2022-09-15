<?php
include 'connect.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $curent_post_comment_sql="DELETE from `comments` where id='$id'";
    $result_comments=mysqli_query($con, $curent_post_comment_sql);
    if (!$result_comments) {
        die(mysqli_error($con));
      } 
}


?>
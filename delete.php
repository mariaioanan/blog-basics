<?php
include 'connect.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql_comments="DELETE from `comments` where posts_id='$id'";
    $result_comments=mysqli_query($con, $sql_comments);
    if (!$result_comments) {
        die(mysqli_error($con));
      } 
    $sql="DELETE from `posts` where id='$id'";
    $result=mysqli_query($con, $sql); 
    if (!$result) {
        die(mysqli_error($con));
      } 
}


?>
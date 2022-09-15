<?php 
//var_dump('test');
//if(isset($_GET['post_id'])){
    $id=$_GET['id'];
    $sql="comment from 'posts' where id=$id";
    $result=mysqli_query($con, $sql);
    if($result){
        echo "Comment successfull";
       // header('location:display.php');
    }else{
        die(mysqli_error($con));
    }


?>
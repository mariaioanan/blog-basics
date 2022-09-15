<?php
//functioneaza, ramane asa 

$con=new mysqli('localhost', 'root', 'root', 'blog');

if (!$con){
    die(mysqli_error($con));
}
?>
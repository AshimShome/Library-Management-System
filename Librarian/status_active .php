<?php

require_once"../dbConnection.php";

$id=$_GET['id'];

 $result=mysqli_query($conn,"UPDATE `students` SET `status`='1'WHERE`id`='$id'");
 
header('location:students.php');

?>
<?php
require_once"../dbConnection.php";

if(isset($_GET['book_delete_id'])){
	$id=$_GET['book_delete_id'];
	$result=mysqli_query($conn,"DELETE FROM `books` WHERE `id`='$id'");
	if($result){
		header('location:manageBook.php');
}
		
	
}

?>
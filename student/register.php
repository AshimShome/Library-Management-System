<?php
session_start();
if(isset($_SESSION['student_login'])){
	
header('location:index.php');
}
  require_once"../dbConnection.php";
  
  if(isset($_POST['student_register'])){
	 $fname=$_POST['fname']; 
	 $lname=$_POST['lname']; 
	 $roll=$_POST['roll']; 
	 $reg=$_POST['reg']; 
	 $username=$_POST['username']; 
	 $email=$_POST['email']; 
	 $phone=$_POST['phone']; 
	 $pass=$_POST['pass'];
	 
	 //$pass_hash=password_hash($pass,PASSWORD_DEFAULT);
	 
	 $input_error=array();
	 if(empty($fname)){
		 $input_error['fname']="Frist Name is Required!";
	 }
	 if(empty($lname)){
		 $input_error['lname']="Last Name is Required!";
	 }
	 if(empty($roll)){
		 $input_error['roll']="Roll is Required!";
	 }
	 if(empty($reg)){
		 $input_error['reg']="Registration is Required!";
	 }
	 if(empty($username)){
		 $input_error['username']="User Name is Required!";
	 }
	 if(empty($email)){
		 $input_error['email']="Email address is Required!";
	 }
	 if(empty($phone)){
		 $input_error['phone']="Phone number is Required!";
	 }
	 if(empty($pass)){
		 $input_error['pass']="Password is Required!";
	 }
	 
	 if(count($input_error)==0){
		 
		 $email_ck= mysqli_query($conn,"SELECT * FROM `students` WHERE `email`='$email'");
		 if(mysqli_num_rows($email_ck)==0){
			 
			 	 $roll_ck= mysqli_query($conn,"SELECT * FROM `students` WHERE `roll`='$roll'");
		 if(mysqli_num_rows($roll_ck)==0){
			 
			 	 	 $reg_ck= mysqli_query($conn,"SELECT * FROM `students` WHERE `reg`='$reg'");
		 if(mysqli_num_rows($reg_ck)==0){
			 
			if(strlen($pass)>5){
				
					$result=mysqli_query($conn,"INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `username`, `email`, `pass`, `phone`, `photo`, `status`) 
	                    VALUES (' $fname',' $lname','$roll',' $reg','$username','$email',' $pass','$phone','image','0')");
		 if($result){
			 
			 $success="Successfully registration";
		 }else{
			  $error="Something went wrong!";
		 }
			
				
			} else{ $pas_error ="Password minimam 6 characters";}
			 
			 
		 }else{ $reg_exits="This registration number already exists!";}
			 
			 
		 }else{$Roll_exits="This Roll number already exists!";}
			 
		 }else{ $email_exits="This email already exists!";}
		 
		
	 }
	 
	 
  }
	 
?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Student Registration</title>
 
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assect/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assect/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assect/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assect/stylesheets/css/style.css">
</head>

<body>
<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">LSM</h1>
			
			<?php 
			if(isset($success)){
				?>
				<div class="alert alert-success " role="alert">
				<?php echo $success;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
		         </button>
		         </div>
		    <?php
			}
		       ?>
			   
			   <?php 
			if(isset($error)){
				?>
				<div class="alert alert-danger " role="alert">
				<?php echo $error;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
		         </button>
		         </div>
		    <?php
			}
		       ?>
			   
			    
			   
			      <?php 
			if(isset($email_exits)){
				?>
				<div class="alert alert-danger " role="alert">
				<?php echo $email_exits;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
		         </button>
		         </div>
		    <?php
			}
		       ?>
			   
			      <?php 
			if(isset($Roll_exits)){
				?>
				<div class="alert alert-danger " role="alert">
				<?php echo $Roll_exits;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
		         </button>
		         </div>
		    <?php
			}
		       ?>
			   
			      <?php 
			if(isset($reg_exits)){
				?>
				<div class="alert alert-danger " role="alert">
				<?php echo $reg_exits;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
		         </button>
		         </div>
		    <?php
			}
		       ?>
			   
			    <?php 
			if(isset($pas_error)){
				?>
				<div class="alert alert-danger " role="alert">
				<?php echo $pas_error;?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
		         </button>
		         </div>
		    <?php
			}
		       ?>
				
			
  
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="fname" placeholder="Frist Name" value="<?php if(isset($fname)){echo $fname;} ?>">
                                <i class="fa fa-user"></i>
                            </span>
							
							<?php
							if(isset($input_error['fname'])){
								echo '<span>'.$input_error['fname'].'</span>';
							}
							?>
							
                        </div>
						 <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name"value="<?php if(isset($lname)){echo $lname;} ?>">
                                <i class="fa fa-user"></i>
                            </span>
							<?php
							if(isset($input_error['lname'])){
								echo '<span>'.$input_error['lname'].'</span>';
							}
							?>
                        </div>
						
						   <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="roll" pattern="[0-9]{6}" placeholder="Roll Number"value="<?php if(isset($roll)){echo $roll;} ?>">
                                <i class="fa fa-user"></i>
                            </span>
							<?php
							if(isset($input_error['roll'])){
								echo '<span>'.$input_error['roll'].'</span>';
							}
							?>
                        </div>
						 <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="reg" pattern="[0-9]{6}" placeholder="Registration Number"value="<?php if(isset($reg)){echo $reg;} ?>">
                                <i class="fa fa-user"></i>
                            </span>
							<?php
							if(isset($input_error['reg'])){
								echo '<span>'.$input_error['reg'].'</span>';
							}
							?>
                        </div>
						 <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="username" placeholder="User name"value="<?php if(isset($username)){echo $username;} ?>">
                                <i class="fa fa-user"></i>
                            </span>
							<?php
							if(isset($input_error['username'])){
								echo '<span>'.$input_error['username'].'</span>';
							}
							?>
                        </div>
						
						
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" name="email" placeholder="Email"value="<?php if(isset($email)){echo $email;} ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
							<?php
							if(isset($input_error['email'])){
								echo '<span>'.$input_error['email'].'</span>';
							}
							?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="pass" placeholder="Password"value="<?php if(isset($pass)){echo $pass;} ?>">
                                <i class="fa fa-key"></i>
                            </span>
							<?php
							if(isset($input_error['pass'])){
								echo '<span>'.$input_error['pass'].'</span>';
							}
							?>
                        </div>
                       
					    <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="phone"pattern="[0-9]{11}" placeholder="01*********"value="<?php if(isset($phone)){echo $phone;} ?>">
                                <i class="fa fa-user"></i>
                            </span>
							
							<?php
							if(isset($input_error['phone'])){
								echo '<span class="input-error">'.$input_error['phone'].'</span>';
							}
							?>
							
                        </div>
					   
					   
					   

                        <div class="form-group">
                            <input type="submit" name="student_register" value="Register" class="btn btn-primary btn-block">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="login.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assect/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assect/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assect/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assect/javascripts/template-script.min.js"></script>
<script src="../assect/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


</html>

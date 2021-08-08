<?php
session_start();
if(isset($_SESSION['liberian_login'])){
	
header('location:index.php');
}
 require_once"../dbConnection.php";
 if(isset($_POST['submit'])){
	 
	 $email=$_POST['email'];
	 $pass=$_POST['pass'];
	
	 $result=mysqli_query($conn,"SELECT * FROM `students` WHERE `email`='$email'OR `username`='$email'");
	 
	 if(mysqli_num_rows( $result)==1){
		 $row=mysqli_fetch_assoc($result);
		 	
			 if($pass==$row['pass']){			 

		   $_SESSION['liberian_login']=$email;
		   $_SESSION['liberian_userName']=$row['username'];
		   
				header('location:index.php');
			
		 }else{ $pas_error="Password invalit!";}
			

		 
	 }else{ $error="Email or User name invalit!";}
	  
	 
 }

?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>
    
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
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">LSM</h1>
		   <?php 
			if(isset($status_error)){
				?>
				<div class="alert alert-danger " role="alert">
				<?php echo $status_error;?>
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
        </div>
		
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="email" placeholder="Email / User Name"value="<?php if(isset($email)){echo $email;} ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" name="pass" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
						
						<input type="submit" value="Sign in" name="submit"class="btn btn-primary btn-block">
                           
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

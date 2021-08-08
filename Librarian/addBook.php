   <?php
   session_start();
      require_once"header.php";
	  
	  if(isset($_POST['saveBook'])){
		  
		  $bookName=$_POST['bookName'];
		  $book_author_name=$_POST['book_author_name'];
		  $book_purchase_date=$_POST['book_purchase_date'];
		  
		  $book_price=$_POST['book_price'];
		  
		  $book_qty=$_POST['book_qty'];
		  $available_qty=$_POST['available_qty'];
		 $libraian_name=$_SESSION['liberian_userName'];
		 
		  $book_image=explode('.',$_FILES['book_image']['name']);
		   $exm=end( $book_image);
		   
		   $book_image=$bookName.'.'.$exm;
		   
		   $result= mysqli_query($conn,"INSERT INTO `books`(`book_name`,`book_image`,`book_author_name`,`book_purchase_date`,`book_price`,`book_qty`,
		   `available_qti`, `libraian_name`) VALUES ('$bookName','$book_image','$book_author_name','$book_purchase_date','$book_price',
		   '$book_qty','$available_qty','$libraian_name')");
		   
		   if( $result){
			   move_uploaded_file($_FILES['book_image']['tmp_name'],'../images/books/'.$book_image);
			   $success="Successfully data inserted";
		   }else{ 
		   $error="Data can not inserted!";
		   }
								
	  }					

   ?>
  
								
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
		                  <li><a href="javascript:avoid()">Add Book</a></li>

                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
				
				
				<div class="col-sm-6 col-sm-offset-3">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12 ">
								
								
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                        <h5 class="mb-lg">Add Book</h5>
										
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
										
                                        <div class="form-group">
                                            <label for="Book Name" class="col-sm-4 control-label">Book Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="bookName" placeholder="Book Name"required value="<?=isset($bookName)?$bookName:'' ?>">
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="Book Name" class="col-sm-4 control-label">Book Image</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" name="book_image" placeholder="Book Image"required value="<?=isset($book_image)?$book_image:'' ?>">
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="Book Name" class="col-sm-4 control-label">Book Author Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="book_author_name" placeholder="Book Author Name"required value="<?=isset($book_author_name)?$book_author_name:'' ?>">
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="Book Name" class="col-sm-4 control-label">Book Purchase Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" name="book_purchase_date" placeholder="Book Purchase Date"required value="<?=isset($book_purchase_date)?$book_purchase_date:'' ?>">
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="Book Name" class="col-sm-4 control-label">Book Price</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="book_price" placeholder="Book Price"required value="<?=isset($book_price)?$book_price:'' ?>">
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="Book Name" class="col-sm-4 control-label">Book Quentity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="book_qty" placeholder="Book Quentity"required value="<?=isset($book_qty)?$book_qty:'' ?>">
                                            </div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="Book Name" class="col-sm-4 control-label">Available Quentity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="available_qty" placeholder="Available Quentity"required value="<?=isset($available_qty)?$available_qty:'' ?>">
                                            </div>
                                        </div>
										
										
										
										
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <button name="saveBook" type="submit" class="btn btn-primary"><i class="fa fa-save " ></i>Save Book</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
				</div>
				
	<?php
      require_once"footer.php";

   ?>
       
				
			
               
				</div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        
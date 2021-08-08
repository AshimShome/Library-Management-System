   <?php
      require_once"header.php";
	  
	  if(isset($_POST['save_issue_book'])){
		  
		  		  //$student_name=$_POST['student_name'];
		  $student_id=$_POST['student_id'];
		  $book_id=$_POST['book_id'];
		  
		  $book_issue_date=$_POST['book_issue_date'];
		 
          
		  $result= mysqli_query($conn,"INSERT INTO `issuebook`(`student_id`, `book_id`, `book_issue_date`) VALUES (' $student_id','$book_id','$book_issue_date')");
		       

		 if($result){
		 mysqli_query($conn,"UPDATE `books` SET `available_qti`=`available_qti`-1 WHERE `id`='$book_id'");

			  ?>
			  <script type="text/javascript">
			  alert("Book issued successfully");
			  </script>
			  
			  <?php
		  }else{
			  ?>
		  <script type="text/javascript">
			  alert("Book not issued !");
			  </script>
		 <?php
		  }
	  }
	  

   ?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
							 <li><a href="javascript:avoid()">Issue Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
				
				
				
				<div class="col-sm-6 col-sm-offset-3">
                
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline"method="post"action="">
                                        
                                        <div class="form-group">
										
                                            <select class="form-control"name="student_id">
											<option value="">Select</option>
											<?php
									            $result= mysqli_query($conn,"SELECT * FROM `students` WHERE `status`='1'");
									            while($row=mysqli_fetch_assoc($result)){
									           
									             ?>
												 
											<option value="<?=$row['id']?>"><?=ucwords($row['fname'].$row['lname']).'-'.'Roll'.'('.$row['roll'].')'?></option>
												<?php } ?>
											</select>
                                        </div>
                                       
                                        <div class="form-group">
                                         <button type="submit" name ="Searcs" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
							
							<?php
							    if(isset($_POST['Searcs'])){
									
									
									$id=($_POST['student_id']);
									 $result= mysqli_query($conn,"SELECT * FROM `students` WHERE`id`='$id'AND`status`='1'");
									 $row=mysqli_fetch_assoc($result);
									 ?>
									
									
									<div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post"action="">

                                        <div class="form-group">
                                            <label for="student_name">Student Name</label>
                                            <input type="text" class="form-control" name="student_name" readonly value="<?=ucwords($row['fname'].$row['lname'])?>">
                                            <input type="hidden"  name="student_id"  value="<?=$row['id']?>">
                                        </div>
										
										  <div class="form-group">
                                            <label for="book_name">Book Name</label>
                                              <select class="form-control"name="book_id">
											<option value="">Select</option>
											<?php
									            $result= mysqli_query($conn,"SELECT * FROM `books` WHERE `available_qti`>0");
									            while($row=mysqli_fetch_assoc($result)){
									           
									             ?>
												 
											<option value="<?=$row['id']?>"><?=$row['book_name']?></option>
												<?php } ?>
											</select>
                                           
                                        </div>
										
										<div class="form-group">
                                            <label for="student_name">Book Issue Date</label>
                                            <input type="text" class="form-control" name="book_issue_date" readonly value="<?=date('d-M-Y')?>">
                                        </div>
										
                                        
                                        <div class="form-group">
                                            <button type="submit" name="save_issue_book"class="btn btn-primary">Save Issue Book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
									
								
							
							<?php
								}
							?>
							
							
                        </div>
                    </div>
                </div>
				
				
				
				
				
				
				
				
	<?php
      require_once"footer.php";

   ?>
       </div>
				
				
				
				
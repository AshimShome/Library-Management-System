   <?php
   
      require_once"header.php";

   ?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
							<li><a href="javascript:avoid()">Return Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
				
				<div class="col-sm-12">
                  
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Phone</th>
                                        <th>Book Name</th>
										<th>Book Image</th>
                                        <th>Book Issue Date</th>
										<th>Return Book</th>
										
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php
									$result= mysqli_query($conn,"SELECT `issuebook`.`id`,`issuebook`.`book_id`,`issuebook`.`book_issue_date`, `students`.`fname`,`students`.`lname`,`students`.
									`roll`,`students`.`phone`,`books`.`book_name`,`books`.`book_image`FROM`issuebook`INNER JOIN `students`ON `issuebook`.
								`student_id`=`students`.`id`INNER JOIN `books`ON `books`.`id`=`issuebook`.`book_id` WHERE `issuebook`.`book_return_date`=''");
									while($row=mysqli_fetch_assoc($result)){
										
									?>
                                    <tr>
                                        <td><?=$row['fname'].$row['lname'] ?> </td>
                                        <td><?=$row['roll']?></td>
                                      
                                        <td><?=$row['phone']?></td>
										  <td><?=$row['book_name']?></td>
										<td><img src="../images/books/<?=$row['book_image']?>" style ="width:50px"alt=""></td>
                                        <td><?=$row['book_issue_date']?></td>
										<td><a href="returnBook.php?id=<?=$row['id']?>&book_id=<?=$row['book_id']?>">Return Book</a></td>
                                        
									
									
										</td>
                                    </tr>
									<?php }?>
                                  
                              
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				
				<?php
				if(isset($_GET['id'])){
					$id=$_GET['id'];
					$book_id=$_GET['book_id'];
					$date=date('d-M-Y');
					
					$result= mysqli_query($conn,"UPDATE `issuebook`SET`book_return_date`='$date'WHERE `id`='$id'");

					 if($result){
				    mysqli_query($conn,"UPDATE `books` SET `available_qti`=`available_qti`+1 WHERE `id`='$book_id'");

			  ?>
			  <script type="text/javascript">
			
			  alert("Book Return successfully");
			     javascript:history.go(-1);
			  </script>
			  
			  <?php
		  }else{
			  ?>
		  <script type="text/javascript">
			  alert("Something went wrong!");
			  </script>
		 <?php
		  }
	  
				} 
				
				?>
				
				
	<?php
      require_once"footer.php";

   ?>
       
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        
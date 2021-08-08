   <?php
   
      require_once"header.php";

   ?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
				
				
				<div class="col-sm-12">
                  
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Book Issue Date</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php
									$student_id=($_SESSION['student_id']);
									  
									 // SELECT `issuebook`.`book_issue_date`,`books`.`book_name`,`books`.`book_image`  FROM `books`INNER JOIN `issuebook`ON`issuebook`.`book_id`=`books`.`id`
									  
									 $result=mysqli_query($conn,"SELECT `issuebook`.`book_issue_date`,`books`.`book_name`,`books`.`book_image` 
									 FROM `books`INNER JOIN `issuebook`ON`issuebook`.`book_id`=`books`.`id`WHERE `issuebook`.`student_id`='$student_id'");
									  $row=mysqli_fetch_assoc($result);
									  
									?>
									<td><?=$row['book_name']?></td>
									
									<td><img src="../images/books/<?=$row['book_image']?>" style ="widtht:100px;height:100px;"alt=""></td>
									<td><?=$row['book_issue_date']?></td> 
									
									
									
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				
				
				
	<?php
      require_once"footer.php";

   ?>
       
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        
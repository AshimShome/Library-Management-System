   <?php
      require_once"header.php";

   ?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid()">Students</a></li>
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
                                        <th>Reg. No</th>
                                        <th>User Name</th>
										<th>Email</th>
                                        <th>Phone</th>
										<th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php
									$result= mysqli_query($conn,"SELECT * FROM `students`");
									while($row=mysqli_fetch_assoc($result)){
									?>
                                    <tr>
                                        <td><?=$row['fname'].$row['lname'] ?> </td>
                                        <td><?=$row['roll']?></td>
                                        <td><?=$row['reg']?></td>
                                        <td><?=$row['username']?></td>
                                        <td><?=$row['email']?></td>
                                        <td><?=$row['phone']?></td>
										<td><img src="<?=$row['photo']?> alt="""></td>
                                        <td><?=$row['status']==1?'Active':'Inactive'?></td>
                                        <td>
										<?php 
										    if($row['status']==1){
												?>
												<a href="status_inactive.php?id=<?=$row['id']?>" class="btn btn-primary"><i class="fa fa-arrow-up"></i></a>

												<?php
												
											}else{
												
												?>
												<a href="status_active .php?id=<?=$row['id']?>" class="btn btn-warning"><i class="fa fa-arrow-down"></i></a>
												<?php
											}
										?>
									
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
      require_once"footer.php";

   ?>
       
				
			
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        
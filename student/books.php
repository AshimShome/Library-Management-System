<?php
      require_once"header.php";

   ?>
   
   
   
   
   <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="test.php">Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
				
				
				<div class="col-sm-12">
				<div class="panel">
                            <div class="panel-content">
                                <form method="post" action="">
                                    <div class="row pt-md">
                                        <div class="form-group col-sm-9 col-lg-10">
                                                <span class="input-with-icon">
                                            <input type="text" class="form-control" name="srcBookNAme" required placeholder="Search">
                                            <i class="fa fa-search"></i>
                                        </span>
                                        </div>
                                        <div class="form-group col-sm-3  col-lg-2 ">
                                            <button type="submit" name="SearchBook"class="btn btn-primary btn-block">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
				</div>
				
				<?php
				if(isset($_POST['SearchBook'])){
					
					$srcBookNAme=$_POST['srcBookNAme'];
					?>
					
					
						<div class="col-sm-12">
					<div class="panel">
					<div class="panel-content">
					<div class="row">
					<?php
					 $result=mysqli_query($conn,"SELECT * FROM `books` WHERE `book_name`LIKE'%$srcBookNAme%'");
					 $tmp=mysqli_num_rows($result);
					 if($tmp>0){
						  while($row=mysqli_fetch_assoc($result)){
						?>
						<div class="col-sm-3 col-md-2">
					
					 <img src="../images/books/<?=$row['book_image']?>" style="width:100%;height:150px;"alt="">
					 <p><?=$row['book_name']?></p>
					 <span><b>Available :<?=$row['available_qti']?></b></span>
					</div>

						<?php
						  }
					 }else{echo "<h1>Book Not Found !</h1>";}
					 
					 
					 
					?>
					
					
					</div>
					
					
					</div>
					</div>
					
					</div>
					
					<?php
				}else{
					?>
					
					
					
					<div class="col-sm-12">
					<div class="panel">
					<div class="panel-content">
					<div class="row">
					<?php
					 $result=mysqli_query($conn,"SELECT * FROM `books`");
					  while($row=mysqli_fetch_assoc($result)){
					?>
					<div class="col-sm-3 col-md-2">
					
					 <img src="../images/books/<?=$row['book_image']?>"  style="width:100%;height:150px;"alt="">
					 <p><?=$row['book_name']?></p>
					 <span><b>Available :<?=$row['available_qti']?></b></span>
					</div>
					<?php
					  }
					?>
					</div>
					
					
					</div>
					</div>
					
					</div>
					
					
					
				<?php
					
				}
				
				?>
					
   
   
   
   <?php
      require_once"footer.php";

   ?>
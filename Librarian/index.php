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
				
				<div class="row">
				
				<?php
				$students= mysqli_query($conn,"SELECT * FROM `students`");
				$student_count=mysqli_num_rows($students);
				
				?>
               
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="students.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?=$student_count;?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Student</h4>
                                </div>
                            </a>
                        </div>
                    </div>
					
					
						<?php
				$libraian= mysqli_query($conn,"SELECT * FROM `libraian`");
				$libraian_count=mysqli_num_rows($libraian);
				
				?>
               
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?=$libraian_count;?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Libraian</h4>
                                </div>
                            </a>
                        </div>
                    </div>
					
                <?php
				$books= mysqli_query($conn,"SELECT * FROM `books`");
				$books_count=mysqli_num_rows($books);
				$books_qty= mysqli_query($conn,"SELECT SUM(`book_qty`)AS totalBook FROM `books`");
				$qty=mysqli_fetch_assoc($books_qty);
				
				$books_a_qty= mysqli_query($conn,"SELECT SUM(`available_qti`)AS aBook FROM `books`");
				$qty_a=mysqli_fetch_assoc($books_a_qty);
				
				?>
               
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="manageBook.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-book"></i> <?=$books_count.'('.$qty['totalBook'].'-'.$qty_a['aBook'].')'?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Books</h4>
                                </div>
                            </a>
                        </div>
                    </div>
					
                  
                </div>
				
	<?php
      require_once"footer.php";

   ?>
       
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        
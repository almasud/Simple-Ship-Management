<?php 

	include('admin/db_connect.php');

			include('header_start.php');
			
				include('function.php');
						
			include('header_end.php');
						
									
	?>
	<div class="row-fluid">
			<!-- block -->
		<div class="block">
			 <div class="navbar navbar-inner block-header">
				<div class="muted pull-left">
					<a href="index.php">Home</a>&nbsp;>>
					<?php 
						if(isset($_GET['page'])){
						
							$page_name = $_GET['page']; 
							
							$results = mysqli_query($con,"SELECT * FROM post WHERE page = '$page_name' ");
							$count = mysqli_num_rows ($results);
							?>
							<a href="#">
							<?php echo $page_name ?>&nbsp;&nbsp;
							<?php if(isset($_GET['old']))
							{
								echo'<a href="'.$_SERVER["PHP_SELF"].'?page='.$page_name.'">
								View from Newer
								</a>';
							}
							else{
								
								echo'<a href="'.$_SERVER["PHP_SELF"].'?page='.$page_name.'&&old">
								View from older</a>';
							
							}?>
							</a>
						
						<?php
						}else if(isset($_GET['category'])){
							
							$category = $_GET['category']; 
							
							$results = mysqli_query($con,"SELECT * FROM post WHERE category = '$category' ");
							$count = mysqli_num_rows ($results);
							?>
							<a href="#">
							<?php echo $category ?>&nbsp;&nbsp;
							<?php if(isset($_GET['old']))
							{
								echo'<a href="'.$_SERVER["PHP_SELF"].'?category='.$category.'">
								View from Newer
								</a>';
							}
							else{
								
								echo'<a href="'.$_SERVER["PHP_SELF"].'?category='.$category.'&&old">
								View from older</a>';
							
							}?>
							</a>
						<?php 
						}else{
						
							$results = mysqli_query($con,"SELECT * FROM post ");
							$count = mysqli_num_rows ($results);
							?>
							<a href="#">
								View all post&nbsp;&nbsp;
							<?php if(isset($_GET['old']))
							{
								echo'<a href="view_all_post.php">
								View from Newer
								</a>';
							}
							else{
								
								echo'<a href="view_all_post.php?old">
								View from older</a>';
							
							}?>
							</a>
						<?php 
						}
					
					?>	
				</div>
				<div class="pull-right">
					<span class="badge badge-info"><?php echo $count; ?></span>
				</div>
				</div>
				<div class="block-content collapse in">
					<div class="span12">
						<?php if(isset($_GET['old'])){ 
						
							$table = "post";
							$limit = 5;
							$order_col = "pid";
							$order = "ASC";
							$visible_page = 5;
							
							post ($con,$table,$limit,$order_col,$order,$visible_page);
																	
					}else
					{	 
						$table = "post";
						$limit = 5;
						$order_col = "pid";
						$order = "DESC";
						$visible_page = 5;
						
						post ($con,$table,$limit,$order_col,$order,$visible_page);
												
												
						
				} ?>
					</div>
			</div>
		</div>
	</div>			 
	<?php			
				include('footerwidget.php'); 

			include('footer.php'); 

?>
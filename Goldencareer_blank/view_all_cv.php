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
								<a href="view_all_cv.php?ok">View all C.V</a>
                            </div>
                         </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									
									<?php $table = "cv";
										$limit = 5;
										$order_col = "id";
										$order = "DESC";
										$visible_page = 5;
										
										cv($con,$table,$limit,$order_col,$order,$visible_page);
										
									?>
							
								</div>
						</div>
					</div>
				</div>
				
	<?php			
				include('footerwidget.php'); 

			include('footer.php'); 

?>
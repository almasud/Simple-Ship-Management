<?php
						
		?>
									
					<div class="row-fluid">
						<div class="span12">
							<!-- block -->
							<div class="block">
								<div class="navbar navbar-inner block-header">
									<?php 
										$results = mysqli_query($con,"SELECT * FROM comment");
										$count = mysqli_num_rows ($results);
									?>
									<div class="muted pull-left">View Comment&nbsp;&nbsp;<?php if($count > $item_per_page) { if(isset($_GET['old'])){echo'<a href="view_all_comment.php">View from Newer</a>';}else{echo'<a href="view_all_comment.php?old">View from older</a>';}}?></div>
									<div class="pull-right"><span class="badge badge-info"><?php echo $count; ?></span>

									</div>
								</div>
								<div class="block-content collapse in">
										<?php if(isset($_GET['old'])){
				
										$table = "comment";
										$limit = 5;
										$order_col = "cid";
										$order = "ASC";
										$visible_page = 5;
										
										comment($con,$table,$limit,$order_col,$order,$visible_page);
											
								 }else{
										
										$table = "comment";
										$limit = 5;
										$order_col = "cid";
										$order = "DESC";
										$visible_page = 5;
										
										comment($con,$table,$limit,$order_col,$order,$visible_page);
										
										?>
										
										
									
								<?php } ?>
								</div>
							</div>
							<!-- /block -->
						</div>
					</div>
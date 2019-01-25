<?php 
 
		
		
	include('admin/db_connect.php');

			include('header_start.php');
				include ('function.php');
			include('header_end.php');
		
?>
		
	<div class="row-fluid">
		<!-- block -->
		<div class="block">
			<div class="navbar navbar-inner block-header">
				<div class="muted pull-left">View Details</div>
			</div>
				<div class="block-content collapse in">
					<div class="span12">
						<div class="post_area">
							<div class="post">
								<div class="container">
									<div class="row">
										<div class="col-md-1"></div>
										<div class="col-md-10">
						
						<?php post_details ($con); ?>
							
						
								</div>
								<div class="col-md-1"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<?php		include('footerwidget.php'); 

			include('footer.php'); 
?>
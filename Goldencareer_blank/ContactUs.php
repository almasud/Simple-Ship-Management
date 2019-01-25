<?php 

	include('admin/db_connect.php');

			include('header_start.php'); 
			include('header_end.php'); ?>
		
<div class="row-fluid">
<!-- block -->
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left">
				<a href="index.php">Home</a>&nbsp;>>
				<a href="ContactUs.php?ok">Contact Us</a>
			</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
				<div class="container">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<?php
								if(isset($_GET['msg1'])){
								
									$alert = "success";
									 
									echo '<div class="alert alert-'.$alert.'">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<h4>Success</h4>
									'.$_GET['msg1'].'</div> ';
									}
									else if(isset($_GET['msg0'])){
								
									$alert = "danger";
									 
									echo '<div class="alert alert-'.$alert.'">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<h4>Erorr:</h4>
									'.$_GET['msg0'].'</div> ';
									}
									else{}
							?>
							<div class="jumbotron">
								<form role="form" action="<?php echo htmlspecialchars("ContactUs_action.php");?>" method="POST">
									<div class="row">
										<div class="col-md-6">
										  <div class="form-group">
											<label for="exampleInputName">Name</label>
											<input type="text" name="name" class="" id="exampleInputFirstName" placeholder="Enter your Name"><span class="requiredsign">*</span>
										  </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
										  <div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<input type="email" name="email" class="" id="exampleInputEmail1" placeholder="Enter your email address"><span class="requiredsign">*</span>
										  </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
										  <div class="form-group">
											<label for="exampleInputSubject">Subject</label>
											<input type="text" name="subject" class="" id="exampleInputLastName" placeholder="Enter subject"><span class="requiredsign">*</span>
										  </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="control-group">
												<label for="exampleInputMessage">Message</label>
													<textarea class="" rows="3" placeholder="Enter your message here" name="details"></textarea><span class="requiredsign">*</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<button type="submit" name="submit" class="btn btn-success">Submit</button>
											<button type="reset" class="btn btn-danger">Clear</button>
										</div>
									</div>
								</form>
								
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
									
				
				
						 
                                
                            
                            
									
							
										
											
										
									
							
		
				 
	<?php			
				include('footerwidget.php'); 

			include('footer.php'); 

?>
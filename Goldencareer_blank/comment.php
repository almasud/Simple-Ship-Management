<?php 

	include('admin/db_connect.php');

			include('header_start.php'); 
			include('header_end.php'); 

	if(isset($_GET['pid'])){

			$pid = $_GET['pid'];
							
			$query = "SELECT * FROM post WHERE pid = $pid";
			$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
			
			$row = mysqli_fetch_array($result);
			
			$title = $row['title'];
			$content = $row['content'];
			$category = $row['category'];
			$page = $row['page'];
			$photo = $row['photo'];
			$post_bid = $row['bid'];
			$datetime = $row['datetime'];
			//This is for blogger information							
				$table = "userform";
				$sql = "SELECT * FROM $table WHERE bid = $post_bid";
				$output=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
				$data = mysqli_fetch_array($output);
				$first_name = $data['first_name'];
				$last_name = $data['last_name'];
				$role = $data['role'];

	?>			
<div class="row-fluid">
<!-- block -->
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left">
				Add a comment
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
								<?php
 
									if(isset($_GET['msg'])){
									 
									echo "<p style='color:red;font-size:12px;'>".$_GET['msg']."</p>"; 

									  }
								?>
								<form role="form" action="<?php echo htmlspecialchars("comment_action.php?pid=".$pid."") ?>" method="POST">
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
											<div class="control-group">
												<label for="exampleInputMessage">Comment</label>
													<textarea class="" rows="3" placeholder="Enter your Comment here" name="details"></textarea><span class="requiredsign">*</span>
											</div>
										</div>
									</div>
									<input type="hidden" name="post_bid" value="<?php echo $post_bid; ?>" />
									<div class="row">
										<div class="col-md-6">
											<button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
									
<?php } else{echo 'There are an error occurd.please try agin.';} ?>					
				
						 
                                
                            
                            
									
							
										
											
										
									
							
		
				 
	<?php			
				include('footerwidget.php'); 

			include('footer.php'); 

?>
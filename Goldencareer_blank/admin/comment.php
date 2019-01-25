<?php 
session_start();
	
	include('db_connect.php');
	
	if(isset($_SESSION['emailid']))
	{ 
		if($_SESSION['emailid']=='')
		{
		header("location:admin_signin.php?msg0=<b>Please login first</b>");
		}
		
		$table = "userform";

	$query="SELECT * From $table WHERE email = '".$_SESSION['emailid']."' && role='admin' && status='active'";

	$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
	$data = mysqli_fetch_array($result);
		$a = $data['email'];
		$b = $data['password'];
		$fname = $data['first_name'];
		$lname = $data['last_name'];
		
		
			include('header_start.php');
				include('admin_function.php');
					
			include('header_end.php');
				
				
	 
				include('container_header.php'); 

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
							
										
						<form role="form" action="<?php echo htmlspecialchars("comment_action.php?pid=".$pid."") ?>" method="POST">
							
								<div class="col-md-6">
									<div class="control-group">
										<label for="exampleInputMessage">Comment</label>
											<textarea class="" rows="3" placeholder="Enter your Comment here" name="details"></textarea><span class="requiredsign">*</span>
									</div>
								</div>
								<input type="hidden" name="post_bid" value="<?php echo $post_bid; ?>" />
								<div class="col-md-6">
									<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								</div>
							
						</form>
											
										
									
									
								
							
						</div>
					</div>
				</div>
			</div>
												
			<?php } else{echo 'There are a error.please try agin.';} 					
		 
			include('container_footer.php'); 
					
				

			include('footer.php'); 
		
		
	}
		else{
			header("location:admin_signin.php?msg0=<b>Please login first.</b>");
		}
			
?>
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
			include('header_end.php');

				include('container_header.php');?>
				
<?php 

	if(isset($_GET['bid'])){
						
		$bid = $_GET['bid'];
							
							
	?>
						
<div class="row-fluid">
<!-- block -->
	<div class="block">
		<div class="navbar navbar-inner block-header">
			<div class="muted pull-left">
				Edit your profile
			</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
						
				<form role="form" action="<?php echo htmlspecialchars("admin_editprofile_action.php")?>" method="POST" enctype="multipart/form-data">
					
						<div class="col-md-6">
						  <div class="form-group">
							<label for="exampleInputFirstName">First Name</label>
							<input type="text" name="fname" class="form-control" id="exampleInputFirstName" value="<?php echo $fname;?>" placeholder="Enter First Name"><span class="requiredsign">*</span>
						  </div>
						</div>
					
					
						<div class="col-md-6">
						  <div class="form-group">
							<label for="exampleInputLastName">Last Name</label>
							<input type="text" name="lname" class="form-control" id="exampleInputLastName" value="<?php echo $lname;?>" placeholder="Enter Last Name">
						  </div>
						</div>
					
					
						<div class="col-md-6">
						  <div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $a;?>" placeholder="Enter email"><span class="requiredsign">*</span>
						  </div>
						</div>
						
						<div class="control-group">
							<label for="exampleInputFile">Choose Photo</label>
							<input type="file" id="exampleInputFile" name="photo">
						</div>
					
					
						<div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputPassword1">New Password</label>
							<input type="password" name="password" class="form-control" id="exampleInputPassword1" value="" placeholder="Password">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputRePassword">Old Password</label>
							<input type="password" name="old-password" class="form-control" id="exampleInputRePassword" placeholder="Old Password"><span class="requiredsign">*</span>
							</div>
						</div>
					
					
						<div class="col-md-6">
							<button type="submit" name="submit" class="btn btn-success">Submit</button>
							<button type="reset" class="btn btn-danger">Clear</button>
						</div>
					
				</form>
							
						
			</div>
		</div>
	</div>
</div>

				<?php	
						}
						
					
					?>


				
				
		<?php		include('container_footer.php'); 
					
				

			include('footer.php'); 
		
		
	}
		else{
			header("location:admin_signin.php?msg0=<b>Please login first.</b>");
		}
			
?>
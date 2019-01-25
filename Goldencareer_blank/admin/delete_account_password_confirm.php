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
				Security check for account deletion.
			</div>
		</div>
		<div class="block-content collapse in">
			<div class="span12">
						
				<form role="form" action="<?php echo htmlspecialchars("delete_account_password_confirm_action.php");?>" method="POST" enctype="multipart/form-data">
						
						<div class="col-md-6">
							<div class="form-group">
							<label for="exampleInputRePassword">For Security Reason.Please Type Your Old Password</label>
							<input type="password" name="password" class="form-control" id="exampleInputRePassword" placeholder="Your Password"><span class="requiredsign">*</span>
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
		
				include('container_footer.php'); 
					
				

			include('footer.php'); 
		
		
	}
		else{
			header("location:admin_signin.php?msg0=<b>Please login first.</b>");
		}
			
?>
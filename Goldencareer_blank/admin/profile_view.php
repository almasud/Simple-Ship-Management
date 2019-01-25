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
		$photo = $data['photo'];
		
		
			include('header_start.php');
			include('header_end.php');

				include('container_header.php'); ?>
				
<div class="row-fluid">
		<!-- block -->
	<div class="block">
		 <div class="navbar navbar-inner block-header">
				<div class="muted pull-left">Profile View</div>
			</div>
			<div class="block-content collapse in">
				<div class="span12">
					
					
				  <div class="thumbnail" style="text-align:center;">
						<?php if($photo !=null || $photo !=""){ 
					echo '	<div class="profile_photo">
								<img src="images/upload/'.$photo.'" alt="profile photo" class="img-thumbnail">
							</div>'; }else{echo 'No profile photo yet.';} ?>
					  <div class="caption">
						
						<p style="font-size:14px;color:#3071A9;"><?php
						echo'
							Name:'.$fname.' '.$lname.'<br/>
							E-mail:'.$_SESSION['emailid'].'<br/>
							Role:'.$data['role'].'<br/>
							Access Area:'.$data['accessarea'].'<br/>
							Status:'.$data['status'].'<br/>
							Join:'.$data['datetime'].'';
							?>
						</p>
						<a href="admin_editprofile.php?bid=<?php echo $data['bid']; ?>" class="btn btn-primary">Edit</a>
						&nbsp;<a href="delete_account_confirm.php?bid=<?php echo $data['bid']; ?>" class="btn btn-danger">Delete account</a>
					  </div>
					</div>
						
					
				</div>
		</div>
	</div>
</div>
				
		<?php		include('container_footer.php'); 
					
				

			include('footer.php'); 
		
		
	}
		else{
			header("location:admin_signin.php?msg0=<b>Please login first.</b>");
		}
			
?>
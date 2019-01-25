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
				
				
	 
				include('container_header.php'); ?>
				
				<div class="row-fluid">
                        <!-- block -->
                    <div class="block">
						 <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Delete Option</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								<?php
								
								if(isset($_GET['sliderid'])){
									
									$sliderid = $_GET['sliderid'];
								
								
								?>
									
									<p>Are you sure delete this photo?</p>
										
											<a class="btn btn-danger btn-sm" role="button" href="delete_slider_action.php?sliderid=<?php echo $sliderid; ?>"><span class="glyphicon glyphicon-plus"></span>Yes</a>
										
										
										
										
											<a class="btn btn-success btn-sm" role="button" href="slider_option.php"><span class="glyphicon glyphicon-eye-open"></span>No</a>
										
										
									<?php  
									
										}
										
										?>
									
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
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
                                <div class="muted pull-left">Message Details</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									
									
									<?php 
										if(isset($_GET['mid'])){
										
											$mid = $_GET['mid'];
										
											$query = "SELECT * FROM message WHERE mid = $mid";
											$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
											
											$row = mysqli_fetch_array($result);
											
											$subject = $row['subject'];
											$details = $row['details'];
											$sender_name = $row['name'];
											$sender_email = $row['email'];
											$datetime = $row['datetime'];
																		
																		
											  echo '<div class="blog-post">
														<a href=""><h3 class="blog-post-title">'.$subject.'</h3></a>
														<p class="blog-post-meta">
															<a href="delete_message_confirm.php?mid='.$mid.'">Delete</a>
														</p>
														<p class="blog-post-meta">
															'.$datetime.' by
															<a href="#">'.$sender_name.'</a>
														</p>
														 <div class="postdetails">
															<p id="content">
																'.$details.'
															</p>
														</div>
													
													</div>';
									
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
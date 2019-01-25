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
                                <div class="muted pull-left">Comment Details</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									
									
									<?php 
										if(isset($_GET['cid'])){
										
											$cid = $_GET['cid'];
										
											$query = "SELECT * FROM comment WHERE cid = $cid";
											$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
											
											$row = mysqli_fetch_array($result);
											
											$comment_pid = $row['pid'];
											$comment = $row['content'];
											$sender_name = $row['name'];
											$sender_email = $row['email'];
											$datetime = $row['datetime'];
											$cid = $row['cid'];
																		
																		
											  echo '<div class="blog-post">
														<p class="blog-post-meta">
															<a href="delete_comment_confirm.php?cid='.$cid.'">Delete</a>
														</p>
														<p class="blog-post-meta">
															'.$datetime.' by
															<a href="#">'.$sender_name.'</a>
														</p>
														 <div class="postdetails">
															<p id="content">
																'.$comment.'
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
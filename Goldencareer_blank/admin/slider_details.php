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
                                <div class="muted pull-left">Slider Details</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									
									
									<?php 
										if(isset($_GET['sliderid'])){
										
											$sliderid = $_GET['sliderid'];
										
											$query = "SELECT * FROM slider WHERE sid = $sliderid";
											$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
											
											$row = mysqli_fetch_array($result);
											
											$title = $row['title'];
											$subtitle = $row['subtitle'];
											$photo_link = $row['link'];
											$photo_name = $row['photo'];
											$sliderid = $row['sid'];
											$photo_bid = $row['bid'];
											$datetime = $row['datetime'];
																		
												$table = "userform";
												$sql = "SELECT first_name,last_name FROM $table WHERE bid = $photo_bid";
												$output=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
												$data = mysqli_fetch_array($output);
												$first_name = $data['first_name'];
												$last_name = $data['last_name'];
																		
											  echo '<div class="blog-post">
														<a href=""><h2 class="blog-post-title">'.$title.'</h2></a>';
														if($subtitle != "" || $subtitle != null){
														echo '<h3 class="blog-post-title">'.$subtitle.'</h3>';
														}
														if($photo_link != "" || $photo_link != null){
														echo '<p>Photo link is &nbsp;<a href="$photo_link">'.$photo_link.'</a></p>';
														}
												echo'	<p class="blog-post-meta">
															<a href="edit_slider.php?sliderid='.$sliderid.'">Edit</a>&nbsp;
															<a href="delete_slider_confirm.php?sliderid='.$sliderid.'">Delete</a>
														</p>
														<p class="blog-post-meta">
															'.$datetime.' by
															<a href="#">'.$first_name.' '.$last_name.'</a>
														</p>';
														 if($photo_name !=null || $photo_name !=""){ 
														echo '<div class="photo">
															<img src="images/slider/data1/images/'.$photo_name.'" alt="Slider Image" class="img-thumbnail">
														</div>'; }
													echo'
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
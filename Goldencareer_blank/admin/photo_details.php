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
                                <div class="muted pull-left">Photo Details</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									
									
									<?php 
										if(isset($_GET['photoid'])){
										
											$photoid = $_GET['photoid'];
										
											$query = "SELECT * FROM photogallery WHERE photoid = $photoid";
											$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
											
											$row = mysqli_fetch_array($result);
											
											$title = $row['title'];
											$name = $row['name'];
											$type = $row['type'];
											$size = $row['size'];
											$photo_bid = $row['bid'];
											$datetime = $row['datetime'];
																		
												$table = "userform";
												$sql = "SELECT first_name,last_name FROM $table WHERE bid = $photo_bid";
												$output=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
												$data = mysqli_fetch_array($output);
												$first_name = $data['first_name'];
												$last_name = $data['last_name'];
																		
											  echo '<div class="blog-post">
														<a href=""><h2 class="blog-post-title">'.$title.'</h2></a>
														<p class="blog-post-meta">
															<a href="edit_photo.php?photoid='.$photoid.'">Edit</a>&nbsp;
															<a href="delete_photo_confirm.php?photoid='.$photoid.'">Delete</a>
														</p>
														<p class="blog-post-meta">
															'.$datetime.' by
															<a href="#">'.$first_name.' '.$last_name.'</a>
														</p>';
														 if($name !=null || $name !=""){ 
														echo '<div class="photo">
															<img src="images/albums/Photogallery/'.$name.'" alt="Gallery Image" class="img-thumbnail">
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
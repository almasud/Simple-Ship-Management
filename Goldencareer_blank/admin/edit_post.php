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
											
							?>				
				
						<div class="row-fluid">
							<!-- block -->
							<div class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left">Edit post</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<form class="form-horizontal" action="edit_post_action.php?pid=<?php echo "$pid"; ?>" method="post" enctype="multipart/form-data">
										  <fieldset>
											<legend>Post form</legend>
			   
											  <div class="control-group">
											
												<label for="exampleInputTitle">Title</label>
												<input type="text" class="form-control" id="exampleInputTitle" name="title" value="<?php echo "$title"; ?>" placeholder="Enter Title"><span class="requiredsign">*</span>
											  </div>
											
										
												<div class="control-group">
													<label for="exampleInputPhoto">Choose Photo</label>
													<input type="file" id="exampleInputFile" name="photo">
												</div>
										
										
												<div class="control-group">
													<label for="exampleInputDetails">Details</label>
														<textarea class="form-control" rows="3"  placeholder="Enter Deatails here" name="details"><?php echo "$content"; ?></textarea><span class="requiredsign">*</span>
												</div>
										
										
												<div class="control-group">
													<label for="exampleInputCategory">Choose category</label>
													<select id="category" name="category" value="'.$category.'">
														<option selected="selected" value="-1">Select one</option>
														<option value="AboutUs" <?php if(isset($category) && $category=="AboutUs") echo "selected";?>>About Us</option>
														<option value="Service" <?php if(isset($category) && $category=="Service") echo "selected";?>>Service</option>
														<option value="OurQuality" <?php if(isset($category) && $category=="OurQuality") echo "selected";?>>Our Quality</option>
														<option value="OurStory" <?php if(isset($category) && $category=="OurStory") echo "selected";?>>Our Story</option>
														<option value="Vacancies" <?php if(isset($category) && $category=="Vacancies") echo "selected";?>>Vacancies</option>
														<option value="ContactUs" <?php if(isset($category) && $category=="ContactUs") echo "selected";?>>Contact Us</option>
														<option value="C.V" <?php if(isset($category) && $category=="C.V") echo "selected";?>>C.V</option>
													</select><span class="requiredsign">*</span>
												</div>
												
												<div class="control-group">
													<label for="exampleInputPage">Choose page</label>
													<select name="page" id="page" value="<?php echo $page;?>" <?php if(isset($page) && $page=="$page") echo "selected";?>></select><span class="requiredsign">*</span>
												</div>
										
										
											
												<div class="control-group">
													
													  <button type="submit" class="btn btn-success" name="submit">Submit</button>
													
													

													  <button type="reset" class="btn btn-danger">Clear</button>
												</div>
										
									
											</fieldset>
										</form>

									</div>
								</div>
							</div>
							<!-- /block -->
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
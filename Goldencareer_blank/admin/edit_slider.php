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
				?>
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit your photo in slider</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="edit_slider_action.php?sliderid=<?php echo $sliderid; ?>" method="post" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Edit slider photo</legend>
										
											 <div class="control-group">
										
												<label for="exampleInputTitle">Title</label>
												<input type="text" class="form-control" id="" name="title" value="<?php echo $title; ?>" placeholder="Enter Title"><span class="requiredsign">*</span>
											</div>
											
											<div class="control-group">
										
												<label for="exampleInputSubtitle">Subtitle</label>
												<input type="text" class="form-control" id="" name="subtitle" value="<?php echo $subtitle; ?>" placeholder="Enter Subtitle">
											</div>
											
											<div class="control-group">
										
												<label for="exampleInputPhotolink">Photo link</label>
												<input type="text" class="form-control" id="" name="photolink" value="<?php echo $photo_link; ?>" placeholder="Enter Photo link">
											</div>
									
											<div class="control-group">
												<label for="exampleInputFile">Choose Photo</label>
												<input type="file" id="" name="photo">
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
		<?php	} ?>

				
				
		<?php		include('container_footer.php'); 
					
				

			include('footer.php'); 
		
		
	}
		else{
			header("location:admin_signin.php?msg0=<b>Please login first.</b>");
		}
			
?>
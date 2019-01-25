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
				
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add post</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="add_post_action.php" method="post" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Post Form</legend>
           
										  <div class="control-group">
										
											<label for="exampleInputTitle">Title</label>
											<input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Enter Title"><span class="requiredsign">*</span>
										  </div>
										
									
											<div class="control-group">
												<label for="exampleInputPhoto">Choose Photo</label>
												<input type="file" id="exampleInputFile" name="photo">
											</div>
									
									
											<div class="control-group">
												<label for="exampleInputDetails">Details</label>
													<textarea class="form-control" rows="3" placeholder="Enter Deatails here" name="details"></textarea><span class="requiredsign">*</span>
											</div>
									
									
											<div class="control-group">
												<label for="exampleInputCategory">Choose category</label>
												<select id="category" name="category">
													<option selected="selected" value="-1">Select Category</option>
													<option value="AboutUs">About Us</option>
													<option value="Service">Service</option>
													<option value="OurQuality">Our Quality</option>
													<option value="OurStory">Our Story</option>
													<option value="Vacancies">Vacancies</option>
													<option value="ContactUs">Contact Us</option>
													<option value="C.V">C.V</option>
												</select><span class="requiredsign">*</span>
											</div>
											
											<div class="control-group">
												<label for="exampleInputPage">Choose page</label>
												<select name="page" id="page"></select><span class="requiredsign">*</span>
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


				
				
		<?php		include('container_footer.php'); 
					
				

			include('footer.php'); 
		
		
	}
		else{
			header("location:admin_signin.php?msg0=<b>Please login first.</b>");
		}
			
?>
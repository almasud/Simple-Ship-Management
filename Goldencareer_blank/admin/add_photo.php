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
                                <div class="muted pull-left">Add your Photo in Gallery</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="add_photo_action.php" method="post" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Add Photo</legend>
										
											 <div class="control-group">
										
												<label for="exampleInputTitle">Title</label>
												<input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="Enter Title"><span class="requiredsign">*</span>
											</div>
									
											<div class="control-group">
												<label for="exampleInputFile">Choose Photo</label>
												<input type="file" id="exampleInputFile" name="photo">
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
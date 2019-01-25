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
		$bid = $data['bid'];
		$a = $data['email'];
		$b = $data['password'];
		$fname = $data['first_name'];
		$lname = $data['last_name'];
			
			if(isset($_POST["submit"])){
			
							//This gets all the other information from a form 
							$photo_name =($_FILES['photo']['name']);
							$photo_type =($_FILES['photo']['type']);
							$photo_size =($_FILES['photo']['size']);
							$photo_title =$_POST['title'];
							
							$table = "photogallery";
							//This is the directory where images will be saved 
									$target = "images/albums/Photogallery/"; 
									$photo_target = $target . basename( $_FILES['photo']['name']);
							
									$allowedExts = array("gif", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG");
									$extension = end(explode(".", $_FILES["photo"]["name"]));
							
							if($photo_title == "" || $photo_title ==null)
							{

							header("location:add_photo.php?msg0=You have no enter photo title !<br/>Please enter a title first.");
							

							}
							else if($photo_name == "" || $photo_name ==null)
							{

							header("location:add_photo.php?msg0=You have no choosen any photo !<br/>Please choose a photo first.");
							

							}
							else if ((($_FILES["photo"]["type"] == "image/gif")
									|| ($_FILES["photo"]["type"] == "image/jpeg")
									|| ($_FILES["photo"]["type"] == "image/jpg")
									|| ($_FILES["photo"]["type"] == "image/png")
									|| ($_FILES["photo"]["type"] == "image/GIF")
									|| ($_FILES["photo"]["type"] == "image/JPEG")
									|| ($_FILES["photo"]["type"] == "image/JPG")
									|| ($_FILES["photo"]["type"] == "image/PNG"))
									&& ($_FILES["photo"]["size"] < 5242880)
									&& in_array($extension, $allowedExts))
									  {
									  if ($_FILES["photo"]["error"] > 0)
										{
										
											header("location:add_photo.php?msg0=" . $_FILES["photo"]["error"]."");
											
										}
									  else
										{
										

										if (file_exists($target . $_FILES["photo"]["name"]))
										  {
										  
											header("location:add_photo.php?msg0=".$_FILES["photo"]["name"] ." already exists.");
											
										  }
										else
										  {
										  
										  //Writes the information to the database
														
														 
												$query="INSERT INTO $table
													(name,title,type,size,bid)
														 
													VALUES('$photo_name','$photo_title','$photo_type','$photo_size',$bid)";

												$result = mysqli_query($con,$query) or die ('could not connect database'.mysqli_error($con));

												//Writes the photo to the server 
												$move_photo = move_uploaded_file($_FILES['photo']['tmp_name'], $photo_target);
														 
													if(!move_photo)
														 
														{ 
														 
														 //Gives and error if its not 
														 header("location:add_photo.php?msg0=Sorry, there was a problem to uploading your photo.");
															
															
														 }
														 else {
															header("location:view_all_photo.php?msg1=Your photo is successfuly uploaded. &&ok");
														   
														 }
										  }
										}
									  }
							else
							  {
								header("location:add_photo.php?msg0=Invalid file.Only 'gif', 'jpeg', 'jpg', 'png','GIF','JPEG','JPG','PNG' format is allowed.");
								
							  }
					}		
							
		}
	else{
		header("location:admin_signin.php?msg0=<b>Please login first.</b>");
	}

?>
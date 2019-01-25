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
		$photo = $data['photo'];
			
			if(isset($_POST["submit"])){

				//This gets all the other information from a form 
				$fname = $_POST["fname"];
				$lname = $_POST["lname"];
				$email = $_POST["email"];
				$photo_name =($_FILES['photo']['name']);
				$password = $_POST["password"];
				$oldpassword = $_POST["old-password"];
				
				//This is the directory where images will be saved 
				 $target = "images/upload/"; 
				 $photo_target = $target . basename( $_FILES['photo']['name']);
				
				if(!$fname)
					{

					header("location:admin_editprofile.php?bid=$bid && msg0=*** This field are required !<br/>*** Please fill up the first name.");
					

					}
					else if(!preg_match("/^[a-zA-Z ]*$/",$fname) || !preg_match("/^[a-zA-Z ]*$/",$lname))
					{

					header("location:admin_editprofile.php?bid=$bid && msg0=*** Only letters and white space allowed in the name field.");
					

					}
					else if(!$email)
					{

					header("location:admin_editprofile.php?bid=$bid && msg0=*** This field are required !<br/>*** Please enter your email address.");
					

					}
					else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
					{

					header("location:admin_editprofile.php?bid=$bid && msg0=*** Your e-mail format is invalid.");
					

					}
					
					else if(!$oldpassword)
					{

					header("location:admin_editprofile.php?bid=$bid && msg0=*** This field are required !<br/>*** Please enter your old-password.");
					

					}
					else {
							if($oldpassword	== $b){
							
								if($photo_name != "" || $photo_name !=null) {
								
								$allowedExts = array("gif", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG");
								$extension = end(explode(".", $_FILES["photo"]["name"]));
													 
								if ((($_FILES["photo"]["type"] == "image/gif")
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
														
										header("location:admin_editprofile.php?bid=$bid && msg0=" . $_FILES["photo"]["error"]."");
										
									}
									else
									{
														

										if (file_exists($target . $_FILES["photo"]["name"]))
										{
															  
											header("location:admin_editprofile.php?bid=$bid && msg0=".$_FILES["photo"]["name"] ." already exists.");
											
										}
										else
										{
											//Delete previous photo
											if(isset($photo)){
										
											unlink("images/upload/".$photo."");
											}						 
											//Writes the information to the database
																	
												if($password != null || $password != ""){
												
													$query="UPDATE $table SET first_name = '$fname',last_name = '$lname',email = '$email',photo = '$photo_name',password = '$password' WHERE bid = $bid ";
													
													$result = mysqli_query($con,$query) or die ('could not connect database'.mysqli_error($con));
													
												}else{
												
													$query="UPDATE $table SET first_name = '$fname',last_name = '$lname',email = '$email',photo = '$photo_name' WHERE bid = $bid ";
													
													$result = mysqli_query($con,$query) or die ('could not connect database'.mysqli_error($con));
												
												}


											//Writes the photo to the server 
												$move_photo=move_uploaded_file($_FILES['photo']['tmp_name'], $photo_target);
																	 
											if(!move_photo)
																		 
											{ 
																		 
											//Gives and error if its not 
												header("location:admin_editprofile.php?bid=$bid && msg0=Sorry, there was a problem to uploading your file.");
																			
												
											}
											else {
												header("location:admin_signin.php?msg1=Your profile is successfuly updated.</br>Please login to access your account.");
												
											}
										}
									}
								}
								else
								{
									header("location:admin_editprofile.php?bid=$bid && msg0=Invalid file.Only 'gif', 'jpeg', 'jpg', 'png','GIF','JPEG','JPG','PNG' format is allowed.");
									
								}
														
							}
							else {
									 if($password != null || $password != "")
									 {
													
										$query="UPDATE $table SET first_name = '$fname',last_name = '$lname',email = '$email',password = '$password' WHERE bid = $bid ";
										
										$result = mysqli_query($con,$query) or die ('could not connect database'.mysqli_error($con));
										
									}else{
									
										$query="UPDATE $table SET first_name = '$fname',last_name = '$lname',email = '$email' WHERE bid = $bid ";
										
										$result = mysqli_query($con,$query) or die ('could not connect database'.mysqli_error($con));
									
									}
								 
								 //Delete previous photo
								 if(isset($photo)){
									
									unlink("images/upload/".$photo."");
									
									$query = "UPDATE $table SET photo = null WHERE bid = $bid";
									mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
												
												
								}
								 

								 header("location:admin_signin.php?msg1=Your profile is successfuly updated.</br>Please login to access your account.");
								   
							}
						
						}else{
							
							header("location:admin_editprofile.php?bid=$bid && msg0=*** Your Password is wrong!");
							
						
						}
					}
		}
		
		else{
				header("location:admin_editprofile.php?bid=$bid && msg0=Please try again");
			
			}
	}
else{
	header("location:admin_signin.php?msg0=<b>Please login first.</b>");
}

?>
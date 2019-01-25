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
			
			if(isset($_POST["submit"]) && ($_GET["photoid"])){
			
				$photoid = $_GET["photoid"];
				
				$query = "SELECT * FROM photogallery WHERE photoid = $photoid";
				$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
									
					$row = mysqli_fetch_array($result);
									
					$photo = $row['name'];
	
					//This gets all the other information from a form 
					
					$title = $_POST["title"];
					$photo_name =($_FILES['photo']['name']);
					$photo_type =($_FILES['photo']['type']);
					$photo_size =($_FILES['photo']['size']);
					
					$table = "photogallery";
					
					//This is the directory where images will be saved 
						$target = "images/albums/Photogallery/"; 
						$photo_target = $target . basename( $_FILES['photo']['name']);
					
					if(!$title)
					{

					header("location:edit_photo.php?photoid=$photoid && msg0=This field are required !<br/>Please fill up the title box.");
				

					}
					else if($photo_name == null || $photo_name =="")
					{

					header("location:edit_photo.php?photoid=$photoid && msg0=This field are required !<br/>Please choose a photo first.");
					

					}
					
					else {
					
									
						//This gets all the other information from a form 
							$photo_name =($_FILES['photo']['name']);
							$photo_type =($_FILES['photo']['type']);
							$photo_size =($_FILES['photo']['size']);
													
						//This is the directory where images will be saved 
							$target = "images/albums/Photogallery/"; 
							$photo_target = $target . basename( $_FILES['photo']['name']);
							
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
													
									header("location:edit_photo.php?photoid=$photoid && msg0=" . $_FILES["photo"]["error"]."");
									
								}
								else
								{
													

									if (file_exists($target . $_FILES["photo"]["name"]))
									{
														  
										header("location:edit_photo.php?photoid=$photoid && msg0=".$_FILES["photo"]["name"] ." already exists.");
										
									}
									else
									{
										//Delete previous photo
										if(isset($photo)){
									
										unlink("images/albums/Photogallery/".$photo."");
										unlink("images/albums/Photogallery/thumbs/".$photo."");
										}						 
										//Writes the information to the database
																
																 
											$query="UPDATE $table SET title = '$title',name = '$photo_name',type = '$photo_type',size = '$photo_size' WHERE photoid = $photoid ";

											$result = mysqli_query($con,$query) or die ('could not connect database'.mysqli_error($con));

										//Writes the photo to the server 
											$move_photo=move_uploaded_file($_FILES['photo']['tmp_name'], $photo_target);
																 
										if(!move_photo)
																	 
										{ 
																	 
										//Gives and error if its not 
											header("location:edit_photo.php?photoid=$photoid && msg0=Sorry, there was a problem to uploading your file.");
																		
										}
										else {
											header("location:view_all_photo.php?msg1=Your photo is successfuly updated. && ok");
											
										}
									}
								}
							}
								else
								{
									header("location:edit_photo.php?photoid=$photoid && msg0=Invalid file.Invalid file.Only 'gif', 'jpeg', 'jpg', 'png','GIF','JPEG','JPG','PNG' format is allowed.");
									
								}
													
						
							
					}
			}
			
			else{
				header("location:edit_photo.php?photoid=$photoid && msg0=Please try again");
			
			}
		}
	else{
		header("location:admin_signin.php?msg0=<b>Please login first.</b>");
	}

?>
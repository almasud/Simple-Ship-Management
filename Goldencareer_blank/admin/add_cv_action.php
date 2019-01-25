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
							
							$content = $_POST["content"];
							$file_name = $_FILES['file']['name'];
							
							$table = "cv";
							
						//This is the directory where files will be saved 
									$target = "images/cv_file/"; 
									$file_target = $target . basename( $_FILES['file']['name']);
									
						
							if(!$file_name)
							{

								header("location:add_cv.php?msg0=***  You have no choosen any file !<br/>*** Please choose a file first.");
								

							}
							else if (file_exists($target . $_FILES["file"]["name"]))
							  {
							  
								header("location:add_cv.php?msg0=".$_FILES["file"]["name"] ." already exists.");
								
							  }
							else
							  {
							  
							  //Writes the information to the database
											
								$query="INSERT INTO $table
									(content,document,bid)
									VALUES('$content','$file_name',$bid)";

								$result = mysqli_query($con,$query) or die ('could not connect database'.mysqli_error($con));

									//Writes the photo to the server 
									$move_file = move_uploaded_file($_FILES['file']['tmp_name'], $file_target);
											 
										if(!move_file)
											 
											{ 
											 
											 //Gives and error if its not 
											 header("lacation:add_cv.php?msg0=Sorry, there was a problem to uploading your file.");
											
											 }
											 else {
												header("location:view_all_cv.php?msg1=Your file is successfuly uploaded. &&ok");
											  
											 }
								}					
						}	
				
					else{
							header("location:add_cv.php?msg0=Please try again");
									
						}
	}
	else{
		header("location:admin_signin.php?msg0=<b>Please login first.</b>");
	}

?>
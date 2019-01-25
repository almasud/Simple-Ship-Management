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
			
	// This is for form action code.....	
		
		if(isset($_POST["submit"])){		

		//This gets all the other information from a form 
		
		$password = $_POST["password"];
		
			
			if(!$password)
			{

			header("location:delete_account_password_confirm.php?bid=$bid&&msg0=*** This field are required !<br/>*** Please enter your password.");
			

			}
			else {
					if($password == $b){
										 

				// Query for cv table...
				$sql = "SELECT * FROM cv WHERE bid = $bid";
				$result=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
																
				while($row = mysqli_fetch_array($result)){
																
				$document = $row['document'];
												
					if(isset($document)){
													
						unlink("images/cv_file/".$document."");
						
						
					}
				}
											
					$query = "DELETE FROM cv WHERE bid = $bid";
					mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
			// Query for comment table...
											
				$query = "DELETE FROM comment WHERE post_bid = $bid";
				mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
			// Query for message table...
				
				$query = "DELETE FROM message WHERE admin_id = $bid";
				mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
			// Query for photogallery table...
				$sql = "SELECT * FROM photogallery WHERE bid = $bid";
				$result=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
																
				while($row = mysqli_fetch_array($result)){
					
					$name = $row['name'];
												
					if(isset($name)){
													
						unlink("images/albums/Photogallery/".$name."");
						unlink("images/albums/Photogallery/thumbs/".$name."");
						
						
					}
				}
											
					$query = "DELETE FROM photogallery WHERE bid = $bid";
					mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
			// Query for post table...
				$sql = "SELECT * FROM post WHERE bid = $bid";
				$result=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
																
				while($row = mysqli_fetch_array($result)){
					
					$photo = $row['photo'];
												
					if(isset($photo)){
													
						unlink("images/upload/".$photo."");
							
					}
				}
											
					$query = "DELETE FROM post WHERE bid = $bid";
					mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
			// Query for slider table...
				$sql = "SELECT * FROM slider WHERE bid = $bid";
				$result=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
																
				while($row = mysqli_fetch_array($result)){
					
					$photo = $row['photo'];
												
					if(isset($photo)){
													
						unlink("images/slider/data1/images/".$photo."");
							
					}
				}
											
					$query = "DELETE FROM slider WHERE bid = $bid";
					mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
			// Query for userform table...
			
			$sql = "SELECT * FROM userform WHERE bid = $bid";
				$result=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
																
				while($row = mysqli_fetch_array($result)){
					
					$photo = $row['photo'];
												
					if(isset($photo)){
													
						unlink("images/upload/".$photo."");
							
					}
				}
											
				$query = "DELETE FROM userform WHERE bid = $bid";
				mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
											
					header("location:signout.php");
					
			} 
					
			else {
						
				header("location:delete_account_password_confirm.php?bid=$bid&&msg0=Your password is incorrect!.Please try again.");
				}
			}
		}
		else{
				
			header("location:delete_account_password_confirm.php?msg0=Please try to a legal action.");
				
		}
			
	}
else{
	header("location:admin_signin.php?msg0=<b>Please login first.</b>");
}

?>
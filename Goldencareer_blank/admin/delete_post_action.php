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
			
			if(isset($_GET['pid'])){
										
				$pid = $_GET['pid'];
											
				$sql = "SELECT * FROM post WHERE pid = $pid";
				$result=mysqli_query($con,$sql) or die ('Database not connect'.mysqli_error($con));
																
				$row = mysqli_fetch_array($result);
																
				$photo = $row['photo'];
												
				if(isset($photo)){
												
					unlink("images/upload/".$photo."");
					
					
				}
										
				$query = "DELETE FROM post WHERE pid = $pid";
				mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
											
					header("location:post_option.php?msg1=Your post is successfuly deleted");
											
											
				}
				else{
											
					header("location:post_option.php?msg0=please try again");
											
											
				}
											
											
		}
	else{
		header("location:admin_signin.php?msg0=<b>Please login first.</b>");
	}

?>
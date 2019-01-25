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
			
			if(isset($_GET['mid'])){
										
				$mid = $_GET['mid'];
											
											
					$query = "DELETE FROM message WHERE mid = $mid";
					mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
												
						header("location:view_all_message.php?msg1=Your message is successfuly deleted");
												
											
				}
				else{
											
					header("location:view_all_message.php?msg0=please try again");
											
											
				}
											
											
		}
	else{
		header("location:admin_signin.php?msg0=<b>Please login first.</b>");
	}

?>
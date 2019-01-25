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
	
			if(isset($_POST["submit"]) && isset ($_GET["pid"])){
			
				$pid = $_GET["pid"];
				
				$details = $_POST["details"];
				
				$post_bid = $_POST["post_bid"];
			
				$table = "comment"; 
				
				
				if(!$details)
				{

				header("location:comment.php?pid=$pid && msg0=*** This field are required !<br/>*** Please Input your Comment.");
				

				}
				else
				{

					 $query="INSERT INTO $table
					 (name,email,content,pid,post_bid)
					 
					 VALUES('Admin','".$_SESSION['emailid']."','$details',$pid,$post_bid)";

					 mysqli_query($con,$query) or die ('could not connect database'.mysqli_error($con));
					 
					 header('location:post_details.php?pid='.$pid.'');
					   
				}
			}else {echo 'please try again!';}
	
		}
	else{
		header("location:admin_signin.php?msg0=<b>Please login first.</b>");
	}
?>
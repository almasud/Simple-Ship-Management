<?php 
	include("admin/db_connect.php");
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$details = $_POST["details"];
	$post_bid = $_POST["post_bid"];
	
	$table = "comment"; 
	
	if(isset($_POST["submit"]) && isset ($_GET["pid"])){
	
		$pid = $_GET["pid"];
		
		if(!$name)
		{

		header("location:comment.php?pid=$pid && msg0=*** This field are required !<br/>*** Please fill up the name field.");

		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$name))
		{

		header("location:comment.php?pid=$pid && msg0=*** Only letters and white space allowed in the name field.");

		}
		else if(!$email)
		{

		header("location:comment.php?pid=$pid && msg0=*** This field are required !<br/>*** Please fill up the E-mail box.");

		}
		else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
		{

		header("location:comment.php?pid=$pid && msg0=*** Your e-mail format is invalid.");

		}
		else if(!$details)
		{

		header("location:comment.php?pid=$pid && msg0=*** This field are required !<br/>*** Please Input your Comment.");

		}
		else
		{

			 $query="INSERT INTO $table
			 (name,email,content,pid,post_bid)
			 
			 VALUES('$name','$email','$details',$pid,$post_bid)";

			 mysqli_query($con,$query) or die ('could not connect database'.mysqli_error($con));
			 
			 header('location:post_details.php?pid='.$pid.'');
			   
			}
	}else {echo 'please try again!';}
?>
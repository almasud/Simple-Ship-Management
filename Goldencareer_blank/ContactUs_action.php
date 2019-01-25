<?php 
	include("admin/db_connect.php");
	
	//This for identify admin.
	
		$query = "SELECT * FROM userform WHERE role = 'admin'";
		$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
		
		$row = mysqli_fetch_array($result);
		
		$admin_id = $row['bid'];
			
	//This is for form data.
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$details = $_POST["details"];
	
	$table = "message"; 
	
	if(isset($_POST["submit"])){
		
		if(!$name)
		{

		header("location:ContactUs.php?msg0=*** This field are required !<br/>*** Please fill up the name field.");

		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$name))
		{

		header("location:ContactUs.php?msg0=*** Only letters and white space allowed in the name field.");

		}
		else if(!$email)
		{

		header("location:ContactUs.php?msg0=*** This field are required !<br/>*** Please fill up the E-mail box.");

		}
		else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
		{

		header("location:ContactUs.php?msg0=*** Your e-mail format is invalid.");

		}
		else if(!$subject)
		{

		header("location:ContactUs.php?msg0=*** This field are required !<br/>*** Please input subject.");

		}
		else if(!$details)
		{

		header("location:ContactUs.php?msg0=*** This field are required !<br/>*** Please Input your message.");

		}
		else
		{
			
			//This is for insert message.

			 $query="INSERT INTO $table
			 (name,email,subject,details,admin_id)
			 
			 VALUES('$name','$email','$subject','$details',$admin_id)";

			 mysqli_query($con,$query) or die ('could not connect database'.mysqli_error($con));
			 

			 header("location:ContactUs.php?msg1=***Hey, ".$name." your message is successfuly send.");
			   
			}
	}else {echo 'please try again!';}
?>
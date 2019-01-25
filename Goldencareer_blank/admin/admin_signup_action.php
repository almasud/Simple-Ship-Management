<?php 
	include("db_connect.php");
	
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$repassword = $_POST["re-password"];
	$table = "userform"; 
	
	if(isset($_POST["submit"])){
		if(!$fname)
		{

		header("location:admin_signup.php?msg0=*** This field are required !<br/>*** Please fill up the first name.");
		

		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$fname) || !preg_match("/^[a-zA-Z ]*$/",$lname))
		{

		header("location:admin_signup.php?msg0=*** Only letters and white space allowed in the name field.");
		

		}
		else if(!$email)
		{

		header("location:admin_signup.php?msg0=*** This field are required !<br/>*** Please fill up the E-mail box.");
		

		}
		else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
		{

		header("location:admin_signup.php?msg0=*** Your e-mail format is invalid.");
		

		}
		else if(!$password)
		{

		header("location:admin_signup.php?msg0=*** This field are required !<br/>*** Please Input your Password.");
		

		}
		else if(strlen($password)<=5 || strlen($password)>40)
		{

		header("location:admin_signup.php?msg0=*** Your password will be must between 6 to 40 characters !");
	

		}
		else if(!$repassword)
		{

		header("location:admin_signup.php?msg0=*** This field are required !<br/>*** Please Retype your Password.");
		

		}
		else if($password!=$repassword)
		{

		header("location:admin_signup.php?msg0=*** Your Password doesn't match!");
		

		}
		else
		{


			$query="SELECT * From $table WHERE role='admin' && status='active'";

			$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));

			$data=mysqli_fetch_array($result);
			$a=$data['email'];
			$b=$data['password'];

			if($a==$email)
			{

			  header("location:admin_signup.php?msg0=***The e-mail address is already taken !<br/>Please try another or login");
			  
			}

			else{

			 $query="INSERT INTO $table
			 (first_name,last_name,email,password,role,accessarea,status)
			 
			 VALUES('$fname','$lname','$email','$password','admin','all','active')";

			 mysqli_query($con,$query) or die ('could not connect database'.mysqli_error($con));
			 

			 header("location:admin_signin.php?msg1=***You have successfuly registerd !<br/>***Please Login here to access your account.");
			  
			   
			}
		}
	} else {
		header("location:admin_signup.php?msg0=<b>Please signup ligal way.</b>");
			  
	}
?>
<?php 
	session_start();
	
	include("db_connect.php");
	
	$email = $_POST["email"];
	$password = $_POST["password"];
	$table = "userform"; 

	if(isset($_POST["submit"])){
		if(!$email)
		{

		header("location:admin_signin.php?msg0=*** This field are required !<br/>*** Please fill up the E-mail box.");
		

		}
		else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
		{

		header("location:admin_signin.php?msg0=*** Your e-mail format is invalid.");
		

		}
		else if(!$password)
		{

		header("location:admin_signin.php?msg0=*** This field are required !<br/>*** Please Input your Password.");
		

		}
		else
		{

			$query="SELECT * From $table WHERE role='admin' && status='active'";

			$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));

			$count = mysqli_num_rows ($result);

			if($count==1)
			{
			$data = mysqli_fetch_array($result);
			$a = $data['email'];
			$b = $data['password'];
			$fname = $data['first_name'];
			$lname = $data['last_name'];
			$_SESSION['emailid'] = $data['email'];
			
				if($a == $email && $b == $password)
				{

				  header("location:welcome.php?msg1=Hey,".$fname." ".$lname." Welcome. &&ok");
				  
				}

				else{

				 

				 header("location:admin_signin.php?msg0=Hey,<br/>Incorrect your email or password !<br/>Please check your login info.");
				   
				   
				}
			
			}
			else {
				   header("location:admin_signin.php?msg0=<b>Login Error.</b><br/>There are may be two reason of login problem<br/><b>1.We can't find your account.</b><br/><b>2.Server is working...</b><br/>if you are a register user please try again later or <b><a href='admin_signup.php'>Signup</a></b>.");	   
			}
		}
	} 
	else {
		header("location:admin_signin.php?msg0=<b>Login Error.</b><br/>Please fill up all the field and submit.<br/>if you are not registered,you can <b><a href='admin_signup.php'>Signup</a></b> now.");
		}

?>
<?php 
	include('db_connect.php');
			$table = "userform";

			$query="SELECT * From $table ";

			$result=mysqli_query($con,$query) or die ('Database not connect'.mysqli_error($con));
			$data = mysqli_fetch_array($result);
				$a = $data['email'];
				$b = $data['password'];
				$fname = $data['first_name'];
				$lname = $data['last_name'];
				$bid = $data['bid'];
				$photo = $data['photo'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login Form</title>

	<!-- Stylesheet -->
	<link href="style.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
	<body>
		<div class="container">
			<div class="header">
			<h3 class="text-muted">Admin Login Form</h3>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<h4>Hey, Visitor</h4>
						We are provide you our admin login information for visit only.Login information in below.
						<p>
							Email:<span style="color:red;">&nbsp;<?php echo $a;?></span><br/>
							Password:<span style="color:red;">&nbsp;<?php echo $b;?></span>
						
						</p>
					</div>
					<div class="jumbotron">
						<?php
							if(isset($_GET['msg1'])){
							
								$alert = "success";
								 
								echo '<div class="alert alert-'.$alert.'">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Success</h4>
								'.$_GET['msg1'].'</div> ';
								}
								else if(isset($_GET['msg0'])){
							
								$alert = "danger";
								 
								echo '<div class="alert alert-'.$alert.'">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Erorr:</h4>
								'.$_GET['msg0'].'</div> ';
								}
								else{}
						?>
						<form role="form" action="admin_signin_action.php" method="POST">
							<div class="row">
								<div class="col-md-6">
								  <div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
								  </div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<button type="submit" name="submit" class="btn btn-success">Submit</button>
									<button type="reset" class="btn btn-danger">Clear</button>
								</div>
							</div>
						</form>
						
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Mukta:800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Zhi+Mang+Xing&display=swap" rel="stylesheet">

	<style type="text/css">
		html,body{
			height: 100%;
		}
	</style>

</head>
<body style="background-image: url(https://images.unsplash.com/photo-1483375801503-374c5f660610?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);background-position: center;background-size: cover;background-repeat: no-repeat;">
	<div class="container" style="text-align: center;">
		<div class="jumbotron" style="width: 60%;margin-left: 20%;margin-top: 10%;background-color: rgba(255,255,255,0.7);">
			<h3>ADMIN LOGIN</h3>
			<form method="post" action="">
				<input type="text" name="uname" placeholder="Enter username"><br><br>
				<input type="password" name="pass" placeholder="Enter password"><br><br>
				<input type="submit" name="sub" class="btn btn-md btn-success">
			</form>
		</div>
	</div>
</body>
</html>

<?php
  	if(isset($_POST['sub']))
  	{
  		$uname = $_POST['uname'];
  		$pass = $_POST['pass'];
  		if($uname==="18bce2354" && $pass ==="prajeeth" )
  		{
  			header("Location:adminpage.php");
  		}
  		else
  		{
  			echo ("Invalid Credentials");
  			header("Location:admin.php");
  		}
  	}
  	?>
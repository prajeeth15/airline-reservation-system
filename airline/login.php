
<html>
<head>
<title>Log in</title>
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
<body style="background-image: url(https://images.unsplash.com/photo-1515916712510-8590717327d3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);background-repeat: no-repeat;background-size: cover;background-position: center;">
	<div class="container">
		<div class="jumbotron" style="background-color: rgba(0,0,0,0.6);text-align: center;color: white;margin-top: 10%;">
			<form method="POST" action="">
				<input type="text" name="uname" placeholder="Enter Username"><br><br>
				<input type="password" name="pass" placeholder="Password"><br><br>
				<input type="submit" name="s1" value="Login" class="btn btn-md btn-success"><br><br><br><br>
				<h5>Do not have Account ?</h5>
				<input type="submit" name="sup" class="btn btn-md btn-primary" value="Signup">
			</form>
		</div>
	</div>
</body>
</html>


<?php


session_start();

if(isset($_POST['s1']) && isset($_POST['uname']) && isset($_POST['pass']))
{
	
$uname=$_POST['uname'];
$pass=$_POST['pass'];

echo $uname;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql1 = "select * from signup where username='$uname' and password='$pass'";

if(mysqli_num_rows(mysqli_query($conn,$sql1))==0)
{
		echo '<script type="text/javascript">alert("Invalid username or password");</script>';	
		exit();
}
else{
	$_SESSION['uname']=$uname;
	header("Location:flight.php");
}


mysqli_close($conn);
}

if(isset($_POST['sup']))
	header("Location:signup.php");
?>

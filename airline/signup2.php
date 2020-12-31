<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
</script>
</head>
<body onload="getLocation()" style="background-image: url(https://images.unsplash.com/photo-1530406472580-81dc39c4babe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1030&q=80);background-size: cover;background-repeat: no-repeat;">
	<div class="container" style="text-align: center;">
		<div class="jumbotron" style="border-radius: 20px;text-align: center;opacity: 0.8;background-color: #070707;margin-left: 25%;margin-right: 25%;height: 50%;margin-top:10%;">
		<form method="post" action="">
      <input type="text"  name="name" placeholder="Enter Name"><br><br>
			<input type="text" name="username" placeholder="Enter User Name"><br><br>
      <input type="email"  name="email" placeholder="Enter Email"><br><br>
      <input type="password" name="password" placeholder="Enter Password"><br><br>
      <input type="password" name="cpassword" placeholder="Confirm Password"><br><br>
			<button type="submit" name="sub" class="btn btn-large btn-primary">Signup</button><br>
	</form>
	</div>
	</div>
</body>
</html>

<?php

if(isset($_POST['sub']))
{
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "airline");
  if (!$conn) 
  {
    die("Connection failed: " . mysqli_connect_error());
  }
  $name = $_POST['name'];
  $uname = $_POST['username'];
  $em = $_POST['email'];
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];
  if($pass!=$cpass)
  {
    echo("Passwords did not match!!");
  }
  else
  {
    $sq = "select * from signup where username='$uname'";
    if(mysqli_num_rows(mysqli_query($conn,$sq))!=0)
    {
      echo 'Username already exists!!!';  
      exit();
    }
    else
    {
      echo ("hello");
      mysqli_query($conn,"INSERT INTO signup values('$name','$uname','$em','$pass') ");
      $_SESSION['uname']=$uname;
      header("Location:allbook.php");
    }
  }
  mysqli_close($conn);

}
?>
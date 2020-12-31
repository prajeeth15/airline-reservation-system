
<?php
session_start();
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['uname']);
	header('Location:home.php');
}
if(!isset($_SESSION['uname']))
{
	header("Location:login.php");
}
if(isset($_GET['flname']))
{

	$flname = $_GET['flname'];

if(isset($_POST['sub']))
{
	$conn = mysqli_connect("localhost", "root", "", "airline");
  	if (!$conn) 
  	{
    	die("Connection failed: " . mysqli_connect_error());
  	}
  	$n=$_SESSION['nop'];
  	$k=1;
  	$pas = "";
  	$age = "";
  	$uname = $_SESSION['uname'];
  	$doj = $_SESSION['date'];
  	$from = $_SESSION['from'];
  	$to = $_SESSION['to'];
  	while($n>0)
  	{
  		$pas = $pas.$_POST['name'.$k].",";
  		$age = $age.$_POST['age'.$k].",";
  		$n--;
  		$k++;
  	}
  	


  	$t = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM flight WHERE flname='$flname'"));
  	$k = $t['time'];
  	$s = $t['seats'];
  	$r = mysqli_query($conn,"select * from passenger");
  	$x = mysqli_num_rows($r);
  	$c=1;
  	while($x>0)
  	{
  		$c++;
  		$x--;
  	}
  	$pnr = "FLPNR".$c;
  	mysqli_query($conn,"INSERT INTO passenger values('$pnr','$uname','$pas','$age','$from','$to','$doj','$flname','$k')");
  	$_SESSION['pnr'] = $pnr;
  	$s=$s-number_format($_SESSION['nop']);
  	mysqli_query($conn,"UPDATE flight SET seats='$s' WHERE flname='$flname'");
  	header("Location:itenary.php");

  	mysqli_close($conn);
}
}
?>




<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
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
    <style>
#mySidenav a {
    position: absolute;
    left: -60px;
    transition: 0.3s;
    padding: 15px;
    width: 100px;
    text-decoration: none;
    font-size: 15px;
    color: white;
    border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
    left: 0;
}

#logout{
    top: 300px;
    background-color: green;
}
</style>
</head>
<body style="background-image: url(https://images.unsplash.com/photo-1529905270444-b5e32acc3bdd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80);background-size: cover;background-repeat: no-repeat;background-position: center;">
  <div id="mySidenav" class="sidenav main">
    <a href="?logout='1'" id="logout">Log out</a>
  </div>
	<div class="container">
    <div class="jumbotron" style="text-align: center;margin-top: 2%;background-color: rgba(255,255,255,0.6);">
      <form method="POST" action="">
        <table class="table" style="text-align: center;">
          <th></th><th>Name</th><th>Age</th>
          <?php $n = $_SESSION['nop'];$k=1; while($n>0){?>
          <tr><td><?php echo ("Passenger ".$k) ?></td>
            <td><input type="text" name="<?php echo('name').$k ?>" placeholder="Enter full name" required></td>
          <td><input type="number" max="99" min="12" name="<?php echo('age').$k++ ?>" placeholder="Enter age" required style="width: 100px;"><td></tr>
          <?php $n--; }?>
        </table>
        <input type="submit" name="sub" class="btn btn-md btn-success">
    </form>
    </div>
	</div>
</body>
</html>















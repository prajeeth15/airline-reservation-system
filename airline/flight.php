<?php
session_start();
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['uname']);
	header('Location:home.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Flight Page</title>
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
<body style="background-image: url(https://images.unsplash.com/photo-1519943150879-3417bc7a6d63?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=967&q=80);background-size: cover;background-position: center;background-repeat: no-repeat;">
	<div class="container" style="margin-top: 5%;text-align: center;">
		<?php
	$conn = mysqli_connect("localhost", "root", "", "airline");
  	if (!$conn) 
  	{
    	die("Connection failed: " . mysqli_connect_error());
  	}
  	$uname = $_SESSION['uname'];
  	$doj = $_SESSION['date'];
  	$from = $_SESSION['from'];
  	$to = $_SESSION['to'];
  	$result = mysqli_query($conn,"SELECT * FROM flight WHERE source='$from' AND dest='$to' AND seats>0");
  	if(mysqli_num_rows($result)==0)
	{
		echo '<script type="text/javascript">alert("No Flights for given route");</script>';	
		//header("Location:home.php");
	}
	else
	{
		?><table class="table" style="background-color:rgba(0,0,0,0.6);padding:10px;border-radius:10px;color:white;" >
    	<th>Flight name</th><th>Source</th><th>Destination</th><th>Fare</th><th>Seats left</th><th>Dep. Time</th>
    	<?php while($row=mysqli_fetch_assoc($result)){ ?>
    	<tr>
    	<td><?php echo $row['flname']; ?></td>
    	<td><?php echo $row['source']; ?></td>
    	<td><?php echo $row['dest']; ?></td>
    	<td><?php echo $row['fare']; ?></td>
    	<td><?php echo $row['seats']; ?></td>
    	<td><?php echo $row['time'];?></td><td><a href="userdet.php?flname=<?php echo $row['flname']; ?>"><button class="btn btn-md btn-success">Book Now</button></a></td>
    	</tr>
    	<?php } ?>
    	</table>
    	<a href="?logout='1'"><button class="btn btn-md btn-danger">Logout</button></a>
    	<?php
	}

  	mysqli_close($conn);
  	?>
	</div>
	
</body>
</html>
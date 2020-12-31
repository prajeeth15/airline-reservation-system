

<?php

  session_start();
  $conn = mysqli_connect("localhost", "root", "", "airline");
  if (!$conn) 
  {
    die("Connection failed: " . mysqli_connect_error());
  }
  if(isset($_POST['yes']))
  {
  	$p = $_GET['pnr'];
  	mysqli_query($conn,"DELETE FROM passenger WHERE pnrno='$p'");
  	echo "<script type='text/javascript'> alert('Cancelled Successfully!!!');</script>";
  	header("Location:allbook.php");
  }
  else if(isset($_POST['no']))
  {
  	header("Location:allbook.php");
  }
  mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Cancel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron" style="text-align: center;">
			<form method="POST" action="">
						
				<h3>Are you sure you want to cancel the booking ?</h3>
				<input type="submit" name="yes" value="Yes" class="btn btn-md btn-danger">&nbsp;&nbsp;
				<input type="submit" name="no" value="No" class="btn btn-md btn-success">

			</form>
		</div>
	</div>
</body>
</html>
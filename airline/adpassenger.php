<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
#add {
  top: 220px;
  background-color: black;
}
#view {
  top: 300px;
  background-color: green;
}
#logout{
    top: 380px;
    background-color: red;
}
</style>
</head>
<body>
	<div id="mySidenav" class="sidenav main">
 	<a href="adminpage.php" id="add">Back</a>
 	<a href="adpassenger.php" id="view">Passenger</a>
  	<a href="admin.php" id="logout">Log out</a>
	</div>
	<div class="container">
		<div class="jumbotron" style="background-color: rgba(0,0,0,0.7);color: white;">
			<H1>All Flight Details</H1>
			<?php
	$conn = mysqli_connect("localhost", "root", "", "airline");
  	if (!$conn) 
  	{
    	die("Connection failed: " . mysqli_connect_error());
  	}
  	$result = mysqli_query($conn,"SELECT * FROM passenger");
  	if(mysqli_num_rows($result)==0)
	{
		echo '<script type="text/javascript">alert("No Flights for given route");</script>';	
		//header("Location:home.php");
	}
	else
	{
		?><table class="table" style="background-color:rgba(0,0,0,0.6);padding:10px;border-radius:10px;color:white;" >
    	<th>PNR No.</th><th>Name</th><th>Age</th><th>Source</th><th>Destination</th><th>Date of journey</th><th>Flight</th>
    	<?php while($r=mysqli_fetch_assoc($result)){ ?>
    	<tr><td><?php echo $r['pnrno']?></td>
          <td><?php echo substr(strtoupper($r['passengers']),0,-1)?></td>
          <td><?php echo substr($r['age'],0,-1)?></td>
          <td><?php echo $r['source']?></td>
          <td><?php echo $r['destination']?></td>
          <td><?php echo $r['doj']?></td>
          <td><?php echo $r['flight']?></td>
    	</tr>
    	<?php } ?>
    	</table>
    	<?php
	}

  	mysqli_close($conn);
  	?>
		</div>
	</div>
</body>
</html>
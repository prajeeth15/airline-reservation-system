
<!DOCTYPE html>
<html>
<head>
	<title>Itenary</title>
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
    left: -80px;
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
  top: 80px;
  background-color: pink;
}
#view{
    top: 160px;
    background-color: #4CAF50;
}

#logout {
    top: 220px;
    background-color: #2196F3;
}
}
</style>
</head>
<body style="background-image: url(https://images.unsplash.com/photo-1515895309288-a3815ab7cf81?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);background-position: center;background-size: cover;background-repeat: no-repeat;">
	<div id="mySidenav" class="sidenav main">
 	<a href="home.php" id="add">Book More</a>
  	
  	<a href="?logout='1'" id="logout">Log out</a>
	</div>
	<div class="container" style="text-align: center;">
		<?php
		session_start();
		if(isset($_GET['logout'])){
			session_destroy();
			unset($_SESSION['uname']);
			header('Location:home.php');
		}
		$conn = mysqli_connect("localhost","root","","airline");
		if(!$conn)
		{
		die("Connection failed: " . mysqli_connect_error());
		}
		if(isset($_SESSION['uname']))
		{
			if(isset($_SESSION['pnr']))
			{
				$pnr = $_SESSION['pnr'];
				$q = mysqli_query($conn,"SELECT * FROM passenger where pnrno = '$pnr'");
				$r = mysqli_fetch_assoc($q);?>
				<div class="jumbotron" style="height: 10%;width: 90%;margin-top: 5%;padding: 2%;margin-left: 6%;">
					<h1>ITENARY</h1>
					<button onclick="myFunction()" class="btn btn-md btn-success">Print</button>
				</div>
				<table class="table table-hover" style="text-align: center;font-weight: bold;background-color: rgba(0,0,0,0.6);color: white;">
					<tr><td>PNR NO.</td><td><?php echo $r['pnrno']?></td></tr>
					<tr><td>Passenger Names</td><td><?php echo substr(strtoupper($r['passengers']),0,-1)?></td></tr>
					<tr><td>Age</td><td><?php echo substr($r['age'],0,-1)?></td></tr>
                                        <tr><td>Source</td><td><?php echo $r['source']?></td></tr>
					<tr><td>Destination</td><td><?php echo $r['destination']?></td></tr>
					<tr><td>Date</td><td><?php echo $r['doj']?></td></tr>
					<tr><td>Flight Name</td><td><?php echo $r['flight']?></td></tr>
					<tr><td>Scheduled Departure</td><td><?php echo $r['deptime']?></td></tr>
				</table>
				<?php
}
}
mysqli_close($conn);
?>
	</div>
</body>

<script>
function myFunction() {
  window.print();
}
</script>


</html>
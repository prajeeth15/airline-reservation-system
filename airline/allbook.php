<!DOCTYPE html>
<html>
<head>
	<title>Bookings</title>
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
  background-color: pink;
}
#logout{
    top: 300px;
    background-color: red;
}
</style>
</head>
<body style="background-image: url(https://images.unsplash.com/photo-1515895309288-a3815ab7cf81?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);background-position: center;background-size: cover;background-repeat: no-repeat;">
	<div id="mySidenav" class="sidenav main">
 	<a href="home.php" id="add">Book More</a>
  	<a href="?logout='1'" id="logout">Log out</a>
	</div>
	<div class="container" style="text-align: center;">
	<div class="jumbotron" style="height: 10%;width: 90%;margin-top: 5%;padding: 2%;margin-left: 6%;">
			<h1>My Bookings</h1>
			<button onclick="myFunction()" class="btn btn-md btn-success">Print</button>
	</div>
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
			$uname = $_SESSION['uname'];
				$q = mysqli_query($conn,"SELECT * FROM passenger where username='$uname'");
				if(mysqli_num_rows($q)==0){
				echo "No bookings";
			}else {?>
			<form method="post" action="">
				<table class="table" style="text-align: center;background-color: rgba(0,0,0,0.6);color: white;">
					<th style="font-size: larger;">PNR NO.</th><th style="font-size: larger;">Passenger Names</th><th style="font-size: larger;">Age</th><th style="font-size: larger;">Source</th><th style="font-size: larger;">Destination</th><th style="font-size: larger;">Date</th><th style="font-size: larger;">Flight Name</th><th style="font-size: larger;">Scheduled dep.</th>
					<?php while($r = mysqli_fetch_assoc($q)){?>
					<tr><td><?php echo $r['pnrno']?></td>
					<td><?php echo substr(strtoupper($r['passengers']),0,-1)?></td>
					<td><?php echo substr($r['age'],0,-1)?></td>
					<td><?php echo $r['source']?></td>
					<td><?php echo $r['destination']?></td>
					<td><?php echo $r['doj']?></td>
					<td><?php echo $r['flight']?></td>
					<td><?php echo $r['deptime']?></td><?php $t = date("d-m-Y");if($r['doj']>=$t) { ?><td><a href="cancel.php?pnr=<?php echo $r['pnrno']; ?>"><button class="btn btn-sm btn-warning">Cancel</button></a></td><td><input type="submit" name="sub" value="Itenary" class="btn btn-sm btn-success"></td><?php } ?></tr>
					<?php if(isset($_POST['sub']))
				{
					$_SESSION['pnr'] = $r['pnrno'];
					header("Location:itenary.php");
				}
				 } ?>
				</table>
			</form>
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
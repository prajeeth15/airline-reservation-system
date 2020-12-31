<?php
session_start();
if(isset($_POST['submit']))
{
	$conn = mysqli_connect("localhost", "root", "", "airline");
  	if (!$conn) 
  	{
    	die("Connection failed: " . mysqli_connect_error());
  	}
  	$from = $_POST['from'];
  	$to = $_POST['to'];
  	$date = $_POST['dat'];
  	$nop = $_POST['nop'];
  	echo $from;
  	echo '<script type="text/javascript">alert($from);</script>';
  	$_SESSION['from'] = $from;
  	$_SESSION['to'] = $to;
  	$_SESSION['date'] = $date;
  	$_SESSION['nop'] = $nop;
  	if(isset($_SESSION['uname']))
  	{
  		header("Location:flight.php");
  	}
  	else
  	{
  		header("Location:login.php");
  	}
  	mysqli_close($conn);
  	
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

	<script type='text/javascript'>

	var imageID=0;
	function changeimage(every_seconds){
    if(!imageID){
        document.getElementById('zk').src='https://cdn.via.com/static/img/v1/newui/sg/general/offer/1504165360190_VIADOM-Banners-up-to-1000-Off-Offer.jpg';
        document.getElementById('zt').innerHTML = "Let's wander where the wifi is weak.";
        imageID++;
    }
    else{if(imageID==1){
        document.getElementById('zk').src='https://images.via.com/static/dynimg/search_page/11/normal/1182411578-1182411577_airasia-1099-offer-pagejpg.jpg';
        document.getElementById('zt').innerHTML = "Your wings already exist. All you have to do is Fly.";
        imageID++;
    }else{if(imageID==2){
        document.getElementById('zk').src='https://gos3.ibcdn.com/top-1549286403.jpg';
        document.getElementById('zt').innerHTML = "Good things come to those who book flights.";
        imageID=0;
    }}}
    setTimeout("changeimage("+every_seconds+")",((every_seconds)*1000));


    var now = new Date();

    	var day = ("0" + now.getDate()).slice(-2);
    	var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var today = now.getFullYear() + "-" + (month) + "-" + (day);
		$('#ExpiryDate').val(today);
    	$('#ExpiryDate').attr('min', today); 

    
	}
	</script>


</head>
<body onload='changeimage(3)'>
	<div style="height: 70%;border: 2px solid black;background-image: url(https://images.unsplash.com/photo-1496715976403-7e36dc43f17b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);background-size: cover;background-position: center;background-repeat: no-repeat;">
		<nav class="navbar navbar-default navbar-fixed-top" style="background-color: rgba(0,0,0,0.3);">
		<div class="container-fluid">
  		<ul class="nav">
  			<img src="https://airlinelogos.aero/classic/TAME01.jpg" height="40px" width="40px">&nbsp;&nbsp;
  			<a href="home.html"><li class="navbar-brand" style="color:white;font-size: 25px;font-weight: 800;">AirLiner</li></a>
  		</ul>
  		<ul class="nav navbar-right">
  		<li class="nav-item">
    	<a class="nav-link active" href="login2.php" style="font-weight: bold;font-family: bahnschrift;">My Bookings</a>
  		</li>
  		<li class="nav-item">
    	<a class="nav-link active" href="#" style="font-weight: bold;font-family: bahnschrift;">About</a>
  		</li>
  		<li class="nav-item">
    		<a class="nav-link" href="#" style=" font-weight: bold;font-family: bahnschrift;"> FAQ</a>
  		</li>
		</ul>
		</div>
		</nav>


		<div class="container" style="margin-left: 5%;width:35%;height: 85%;background-color: rgba(255,255,255,1);border-radius: 20px;float: left;text-align: center;">
			<div class="container-fluid" style="padding-top: 40px;">
				<h3>Book a Flight</h3><br><br>
				<form method="POST" action="">
					<table style="text-align: center;background-color: rgba(49, 245, 238,0.1);border-radius: 10px;" class="table table-hover">
						<tr>
							<td>
								<h4>From</h4>
							</td>
							<td>
							<select style="width: 70%; border-radius: 10px;" name="from">
							<option value="Mumbai">
								Mumbai
							</option>
							<option value="Delhi">
								Delhi
							</option>
							<option value="Kolkata">
								Kolkata
							</option>
							<option value="Chennai">
								Chennai
							</option>
							<option value="Bengaluru">
								Bengaluru
							</option>
							</select>
							</td>
						</tr>
						<tr>
							<td>
								<h4>To</h4>
							</td>
							<td>
							<select style="width: 70%;border-radius: 10px;" name="to">
							<option value="Bengaluru">
								Bengaluru
							</option>
							<option value="Chennai">
								Chennai
							</option>
							<option value="Kolkata">
								Kolkata
							</option>
							<option value="Delhi">
								Delhi
							</option>
							<option value="Mumbai">
								Mumbai
							</option>
							</select>
							</td>
						</tr>
						<tr>
							<td>
								<h4>Departure Date</h4>
							</td>
							<td>
								<input type="date" name="dat" id="ExpiryDate" style="width: 70%;border-radius: 10px;" min="">
							</td>
						</tr>
						<tr>
							<td>
								<h4>Passenger(s)</h4>
							</td>
							<td>
								<input type="number" name="nop" max="6" min="1" style="width: 70%;border-radius: 10px;">
							</td>	
						</tr>
					</table>
					<input type="submit" name="submit" value="Search Flights" class="btn btn-sm btn-success">
				</form>
			</div>
		</div>

<div style="height: 50%;width: 30%;float: right;background-color: rgba(0,0,0,0.2);margin-right: 10%;margin-top: 5%;border-radius: 30px;color: white;text-align: center;">
	<h3 id="zt" style="font-family: 'Zhi Mang Xing', cursive;padding-top: 20%; font-size: 30px;">
		Good things come to those who book flights.
	</h3>
</div>

	</div>
	<div  style="height: 30%;width: 100%;">	
		<img id="zk" src="https://gos3.ibcdn.com/top-1549286403.jpg" height="100%" width="100%">
	</div>
</body>
</body>
</html>
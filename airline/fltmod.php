<!DOCTYPE html>
<html>
<head>
	<title>Modify Flight</title>
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
		<div class="jumbotron" style="background-color: rgba(255,255,255,0.7);">
			<H1>Modify Flight Details</H1>
			<?php
      $conn = mysqli_connect("localhost", "root", "", "airline");
      if (!$conn) 
      {
       die("Connection failed: " . mysqli_connect_error());
      }
      $fl = $_GET['flname'];
      if(isset($_POST['mod']))
      {
        $ti = $_POST['time'];
        mysqli_query($conn,"UPDATE flight SET time='$ti' where flname='$fl'");
        header("Location:adflight.php");
      }
      else if(isset($_POST['can']))
      {
        mysqli_query($conn,"DELETE FROM flight where flname='$fl'");
        mysqli_query($conn,"DELETE FROM passenger where flname='$fl'");
        header("Location:adflight.php");
      }
      $result = mysqli_query($conn,"SELECT * FROM flight WHERE flname='$fl'");
      $x = mysqli_fetch_assoc($result);?>
      <form method="post" action="">
      <table class="table">
        <th>Name</th><th>Source</th><th>Destination</th><th>Time</th>
        <tr>
          <td><?php echo $x['flname']?></td>
          <td><?php echo $x['source']?></td>
          <td><?php echo $x['dest']?></td>
          <td><?php echo $x['time']?></td>
          <td><input type="text" name="time" placeholder="Reschedule (new time)">&nbsp;&nbsp;<input type="submit" name="mod" class="btn btn-md btn-warning" value="Reschedule"></td>
          <td><input type="submit" name="can" value="Cancel" class="btn btn-md btn-danger"></td>
        </tr>
      </table>
    </form>
		</div>
	</div>
</body>
</html>
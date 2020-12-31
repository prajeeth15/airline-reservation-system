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
<body style="background-image: url(https://images.unsplash.com/photo-1517479149777-5f3b1511d5ad?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);background-size: cover;background-position: center;background-repeat: no-repeat;">
	<div id="mySidenav" class="sidenav main">
 	<a href="adflight.php" id="add">Flight</a>
 	<a href="adpassenger.php" id="view">Passenger</a>
  	<a href="admin.php" id="logout">Log out</a>
	</div>
	<div class="container">
		<div class="jumbotron" style="background-color: rgba(0,0,0,0.7);color: white;">
			<H1>WELCOME TO THE ADMIN PAGE!!!</H1>
		</div>
	</div>
</body>
</html>
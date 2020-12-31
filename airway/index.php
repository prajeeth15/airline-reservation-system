<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Indian Airlines</title>
<style type="text/css">
#customers
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
#customers td, #customers th
{
font-size:1em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
#customers th
{
font-size:1.1em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#A7C942;
color:#ffffff;
}
#customers tr.alt td 
{
color:#000000;
background-color:#EAF2D3;
}
</style>

<script type="text/javascript">
 function formvalidate()
 {
    var x=document.forms["login"]["user"].value;
    if(x==null || x=="")
    {
      alert("enter the username!");
      return false;
    }
 }
 </script>
</head>

<body>
	
<div id="container">
		<div id="header">
        	<a href="index.php" style="underline:none;"><h1>Indian<span class="off">Airlines</span></h1></a>
            <h2>Always at your Service</h2>
			<?php
			if(isset($_SESSION['username'])){
			echo("<a href='#' style='float:right;width:75x;color:#000;padding:10px;'>Account Settings</a><a href='?page=logout'  style='float:right;width:75x;color:#000;padding:10px;'>Logout</a>");
}
?>
        </div>
        
        <div id="menu">
        	<ul>
            	<li class="menuitem"><a href="index.php">Home</a></li>
				<li class="menuitem"><a href="?page=admin">Admin Panel</a></li>
            </ul>
        </div>

        <div id="leftmenu">

        <div id="leftmenu_top"></div>

				<div id="leftmenu_main">

                <h3> Our Services</h3>

                <ul>
                    <li><a href="?page=reservation">Reservation</a></li>
                    <li><a href="?page=cancelation">Cancellation</a></li>
                    <div id="leftmenu_bottom"></div>

                    <div id="leftmenu_top"></div>
					 <h3> Profile</h3>
					 <li><a href="?page=account">Account</a></li>
				     <li><a href="?page=logout">Logout</a></li>
					 <div id="leftmenu_bottom"></div>

                    <div id="leftmenu_top"></div>
                    <h3> Information</h3>
                    <li><a href="?page=seatavail">Check Availability</a></li>
                    <li><a href="?page=flightstatus">Flight Status</a></li>
                    <li><a href="?page=glance">Flights at a Glance</a></li>
                    <li><a href="?page=bookingstatus">Booking Status</a></li>
                </ul>
</div>

                
              <div id="leftmenu_bottom"></div>
        </div>
		<div id="content">
		<?php
		session_start();
		if(isset($_SESSION['username'])){
	$sess=$_SESSION['username'];
		echo "Hi , <a href='?page=account' style='background-color:yellow;'>  $sess  </a>";
		}
		?>
        <div id="content_top"></div>
		
        <div id="content_main">
		
 <?php
if(isset($_GET['page'])){
$value=$_GET['page'];
if($value=="register")
include('register.inc.php');
else if($value=="logout")
include('logout.php');
else if($value=="reservation")
include('reservation.php');
else if($value=="seatavail")
include('seatavail.php');
else if($value=="bookingstatus")
include('bookingstatus.php');
else if($value=="glance")
include('glance.php');
else if($value=="maketkt")
include('maketkt.php');
else if($value=="booktkt")
include('booktkt.php');
else if($value=="account")
include('account.php');
else if($value=="home")
include('home.inc.php');
else if($value=="forgot")
include('forgot.php');
else if($value=="cancelation")
include('cancelation.php');
else if($value=="admin")
include('admin.php');
}
else
include('home.inc.php');
?>
        </div>
        <div id="content_bottom"></div>
            <div id="footer"><h3><a href="#inline1" id="various1" title="this is our team!!!!!">About us</a> | <a href="#inline2" id="various2" title="give your valuable feedback">Feedback</a></h3></div>
      </div>
   </div>
   <div style="display: none;">
		<div id="inline1" style="width:400px;height:100px;overflow:auto;">
		</div>
		<div style="display: none;">
		<div id="inline2" style="width:400px;height:100px;overflow:auto;">
		feedback area
		</div>
	</div>
</body>
</html>
<?php
if(isset($_SESSION['username'])){
if($_SESSION['username']=='admin')
{
echo '<form action="" method="post">
<table width="35%" align="center">
<tr>
<td>Flight-No:</td>
<td><input type="text" name="flight_no" size="15"/></td>
<td>Date:</td>
<td><input type="text" name="date" size="15"/><td/>
</tr>
<tr>
<td>Max-Seats:</td>
<td><input type="text"name="maxseats" size="15"/></td>
<td>Fare:</td>
<td><input type="text" name="fare" size="15"/></td>
</tr>
<tr>
<td>source:</td>
<td><input type="text" name="source" size="15"/></td>
<td>Destination:</td>
<td><input type="text" name="destination" size="15"/></td>
</tr>
<tr>
<td>Departure-Time:</td>
<td><input type="text" name="dept_time" size="15"/></td>        
<td>Arrival-Time:</td>
<td><input type="text" name="arr_time"  size="15"/></td>
</tr>
<tr>
<td>&nbsp </td>
<td>&nbsp </td>
<td>&nbsp </td>
<td ><input type="submit" value="submit entry" name="submit" /></td>
<td ><input type="submit" value="Edit Flight" name="edit" /></td>
</tr>
<br/>
</table>
</form>';
  
	  }
else
{
echo "hello";
}
    }
else
	{
	echo "----PLEASE login first....----";
	}
?>
<?php
if (isset($_POST['submit']))
{
$flight_no=$_POST['flight_no'];
$date=$_POST['date'];
$maxseats=$_POST['maxseats'];
 $fare=$_POST['fare'];
$source=$_POST['source'];
$destination=$_POST['destination'];
$dept_time=$_POST['dept_time'];
$arr_time=$_POST['arr_time'];
$connect=mysql_connect("localhost","root","");
            mysql_select_db("airlines");
			
$q= mysql_query("INSERT INTO flightdetails VALUES('$flight_no','$source','$destination','$maxseats','$dept_time','$arr_time','$fare')") or die(mysql_error());
 echo "<h3 style='color:green'>data has been inserted</h3>"; 
}
//else echo "ss";
if (isset($_POST['edit']))
{
$flight_no=$_POST['flight_no'];
$date=$_POST['date'];
$maxseats=$_POST['maxseats'];
 $fare=$_POST['fare'];
$source=$_POST['source'];
$destination=$_POST['destination'];
$dept_time=$_POST['dept_time'];
$arr_time=$_POST['arr_time'];
$connect=mysql_connect("localhost","root","");
            mysql_select_db("airlines");
$q= mysql_query("UPDATE  flightdetails SET  source='$source' , destination='$destination' , maxseats='$maxseats' , departure='$dept_time'  , arrival=' $arr_time' , fare='$fare' WHERE flightno='$flight_no' ") or die(mysql_error());
}
?>
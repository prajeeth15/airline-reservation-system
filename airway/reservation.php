<form action="" method="post" name="form">
<table>
<tr>
<td>Source: </td><td> <input type="text" name="source" /></td>
</tr>
<tr>
<td>Destination: </td><td> <input type="text" name="destination"/> </td>
</tr>
<tr>
<td>Date of reservation: </td><td><input type="text" style="width:60px;" name="date"/>(YYYY-MM-DD)</td></tr>
<tr><td><input type="submit" name="sub" value="next"/></td></tr>
</table>
</form>
<?php
if(isset($_POST['sub'])){
$source=$_POST['source'];
$destination=$_POST['destination'];
$date=$_POST['date'];
$connect=mysql_connect("localhost","root","");
            mysql_select_db("airlines");
            $check=mysql_query("SELECT * FROM flightdetails WHERE source='$source' AND destination='$destination'");
            $check_num_rows=mysql_num_rows($check);
            if($check_num_rows==0)
            {
            echo("THERE ARE NO FLIGHTS AVAILABLE BETWEEN $source and $destination") ;
            mysql_close($connect);
            }
			else
			{
			echo "There are following flights from $source to $destination on DATE: $date";
echo "<table id='customers'>
<tr>
  <th>Flight no.</th>
  <th>Source</th>
  <th>Destination</th>
  <th>Departure</th>
  <th>Arrival</th>
  <th>Fare</th>
   <th>booking</th>
</tr>";
$k=0;
while($row=mysql_fetch_assoc($check))
{
  $flight=$row['flightno'];
  $source=$row['source'];
  $dest=$row['destination'];
if($k==0)
{
echo "<tr>
<td>".$row['flightno']."</td>
<td>".$row['source']."</td>
<td>".$row['destination']."</td>
<td>".$row['departure']."</td>
<td>".$row['arrival']."</td>
<td>".$row['fare']."</td>
<td><a href='?page=maketkt&flight=$flight&source=$source&dest=$dest&date=$date'>Book </a></td>
</tr>";
$k=1;
}
else if($k==1){
echo "<tr class='alt'>
<td>".$row['flightno']."</td>
<td>".$row['source']."</td>
<td>".$row['destination']."</td>
<td>".$row['departure']."</td>
<td>".$row['arrival']."</td>
<td>".$row['fare']."</td>
<td><a href='?page=maketkt&flight=$flight&source=$source&dest=$dest&date=$date'>Book </a></td>
</tr>";
$k=0;
}
			}
			echo "</table>";
		}   }
?>
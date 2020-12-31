<?php
if(isset($_POST['book'])){
//session_start();
if(isset($_SESSION['userid'])){
 $source=$_GET['source'];
 $destination=$_GET['destination'];
$flightno=$_GET['flightno'];
$date=$_GET['date'];
$no=$_POST['no'];
 $connect=mysql_connect("localhost","root","");
          mysql_select_db("airlines");
	///////////////////////
	$userid=$_SESSION['userid'];
	 $checkbal=mysql_query("SELECT balance FROM account WHERE userid='$userid'");
	 $checkbal=mysql_fetch_assoc($checkbal);
	 $checkbal=$checkbal['balance'];
	 $fare=mysql_query("SELECT * FROM flightdetails WHERE flightno='$flightno'");
	 $fare=mysql_fetch_assoc($fare);
	 $fare=$fare['fare'];
	 $totfare=$fare * $no;
	if($checkbal<$totfare)
	{
	echo "<h3>SORRY YOU DIDN'T HAVE SUFFICIENT BALANCE LEFT IN YOUR ACCOUNT TO BOOK THE TICKET</h3>";
	
	echo"<p>your account balance is Rs.$checkbal/- only</p>";
	}
	else{	
     $check=mysql_query("SELECT * FROM cancelled WHERE flightno='$flightno' AND date='$date'");
     $seats=mysql_num_rows($check);
     //$maxseats=mysql_query("SELECT maxseats FROM flightdetails WHERE flightno='$flightno'");
   $pnr=mysql_query("SELECT pnr FROM confirm WHERE flightno='$flightno' AND date='$date'");
   $n=mysql_num_rows($pnr);
   for($i=0;$i<$n+1;$i++)
   {
  $rowpnr=mysql_fetch_assoc($pnr);
  if($i==$n-1)
   $maxpnr=$rowpnr['pnr'];
   }
 $id=$_SESSION['userid'];
 echo "<table id='customers'>
<tr>
  <th>PNR</th>
  <th>SEATNO.</th>
  <th>FLIGHTNO.</th>
  <th>DATE</th>
  <th>NAME</th>
  <th>USERID</th>
   <th>FARE(in Rs.)</th>
</tr>";
$k=0; $maxpnr++;
			for($i=0;$i<$no;$i++)
			{
			   if($i==0)
			   $name=$_POST['name1'];
			   else if($i==1)
			   $name=$_POST['name2'];
			   else if($no==2)
			   $name=$_POST['name3'];
			    $row=mysql_fetch_assoc($check);
				$seatno=$row['seatno'];
				$mseat=mysql_query("SELECT seatno FROM confirm WHERE flightno='$flightno' AND date='$date'");
				$x=mysql_num_rows($mseat);
				for($j=0;$j<$x+1;$j++)
                {
  					$rowseat=mysql_fetch_assoc($mseat);
  					if($j==$x-1)
   						$seatno=$rowseat['seatno'];
   			    }
				$seatno++;
				mysql_query("INSERT INTO confirm VALUES('','$maxpnr','$seatno','$flightno','$date','$name','$id','$fare')");
				if($i+1<=$seats)
				mysql_query("DELETE FROM cancelled WHERE flightno='$flightno' AND date='$date' AND seatno='$seatno'");
				
if($k==0)
{
echo "<tr>
<td>".$maxpnr."</td>
<td>".$seatno."</td>
<td>".$flightno."</td>
<td>".$date."</td>
<td>".$name."</td>
<td>".$id."</td>
<td>".$fare."</td>
</tr>";
$k=1;
}
else if($k==1){
echo "<tr class='alt'>
<td>".$maxpnr."</td>
<td>".$seatno."</td>
<td>".$flightno."</td>
<td>".$date."</td>
<td>".$name."</td>
<td>".$id."</td>
<td>".$fare."</td>
</tr>";
$k=0;
}
		}
		$bal=$checkbal-$totfare;
		mysql_query("UPDATE account
SET balance='$bal'
WHERE userid='$userid'");
			echo "</table>";
		echo '<FORM>
<INPUT TYPE="button" value="print ticket" onClick="window.print()">
</FORM>';
	
}
}
else
{
     echo "-----------PLEASE LOGIN for reservation of seat!!!----------";
	 }
}
?>
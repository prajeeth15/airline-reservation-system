<img title="welcome to Indian Airlines" src="abc.jpg" height="200px" width="650px"></img>
<?php
//session_start();
if(!isset($_SESSION['username'])){
echo 
"<form  action='' name='login' onsubmit='return formvalidate()' method='post'>
 USER-NAME: <input style='background-color:yellow;' type='text' name='user' autofocus='autofocus'/> <br/><br/>
PASSWORD: <input style='background-color:yellow;' type='password' name='pwd'/><br/><br/>
 <input type='submit' value='Sign-in' name='submit'/>
 </form>
 <p><a href='?page=register' style='text-decoration:none;' >Sign-up now!</a></p> <br/>
 <a href='?page=forgot'>forgot password</a>";
 }
 ?>
 <?php
 if(isset($_POST['submit'])){
 $name=$_POST['user'];
 $password=$_POST['pwd'];
  $connect=mysql_connect("localhost","root","");
     mysql_select_db("airlines");
  $query=mysql_query("SELECT * FROM login WHERE username='$name'");
$num_rows=mysql_num_rows($query);
if($num_rows!=0)
{
  while($row=mysql_fetch_assoc($query))
  {
    $dbusername=$row['username'];
    $dbpassword=$row['password'];
    if($name==$dbusername && $password==$dbpassword)
    {
      $_SESSION['username']=$dbusername;
	   $_SESSION['userid']=$row['userid'];
    }
    else{ echo("wrong password!!");}
  }
}
else
echo("that username doesn't EXIST");
}
else
session_destroy();
 ?>
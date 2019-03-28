<?php
if(isset($_POST['submit']))
{	session_start();
	$id=$_SESSION['id'];
	$con=mysql_connect('localhost','root','') or die(mysql_error());
	$db=mysql_select_db('Netbanking',$con) or die(mysql_error());
	$custname=$_POST['custname'];
	$custdob=$_POST['custdob'];
	$custg=$_POST['custg'];
	$phno=$_POST['custphno'];
	$address=$_POST['custaddress'];
	$sql="update cust_details set name='$custname',address='$address',phno='$phno',gender='$custg',dob='$custdob' where id='$id'";
	$sql1="update details set name='$custname' where id='$id'";
	mysql_query($sql) or die(mysql_error());
	mysql_query($sql1) or die(mysql_error());
	echo "<html>";
  echo "<head>";
    echo "<link href='bootstrap.css' rel='stylesheet' type='text/css'>";
	echo "</head>";
  echo "<div class='alert alert-success' role='alert'>";
  //echo "<img src='download.png' width='2%' height='3%'>";
  //echo "<span class='glyphicon glyphicon-alert' aria-hidden='true'></span>";
  echo "SUCCESS";
  echo "<br><br>";
  echo "<a href='pofile.php'>Click here to return</a>";	
   echo "</div>";
  echo "</html>";
}
?>
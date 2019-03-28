<?php
session_start();
$n=$_SESSION['n'];
//echo $n;
if($n>0)
{
if(isset($_POST['submit']))
{
$con=mysql_connect("localhost","root","") or die( mysql_error());
$db=mysql_select_db("Netbanking",$con) or die( mysql_error());
$p=$_POST['OPassword'];
$id1=$_SESSION['id'];
$sql1 = "select password from login where id='$id1' and password='$p'";
$res=mysql_query($sql1) or die(mysql_error());
$req=mysql_fetch_array($res);
}
if($req)
{
	$np=$_POST['NPassword'];
	$rp=$_POST['RPassword'];
	if($np==$rp)
	{
		$sql1 = "update login set password='$np' where id='$id1' and password='$p'";
		mysql_query($sql1) or die(mysql_error());
		echo "<h1>SUCCESS</h1>";
		$page= "mainpage.php";
		header("Location: $page");
	}
	else
		echo "<h1>Password's Do Not Match</h1>";
}
else
{
	$n=$n-1;
	if($n>0)
	{?>
<html>
  <head>
    <link href='bootstrap.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
  <div class='alert alert-danger' role='alert'>
  <img src='download.png' width='2%' height='3%'>
  <b>Error:</b><br><br>WRONG PASSWORD<br><br>
	<h4><font color="black"><?php
	echo $n;
	?>&nbspAttempt(s) left</font></h4>
	<?php
	$_SESSION['n']=$n;
	}
	else
	{
		$page= "displayerr.php";
		header("Location: $page");
	}
}
}
else
{
		$page= "displayerr.php";
		header("Location: $page");	
}
?>
</div>
</body>
</html>
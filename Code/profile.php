 <?php
if(isset($_POST['submit']))
{
session_start();
$con=mysql_connect('localhost','root','') or die( mysql_error());
$db=mysql_select_db('netbanking',$con) or die( mysql_error());
$id1=$_SESSION['id'];
$p=$_POST['PPassword'];
$sql="select * FROM cust_details WHERE propass like '$p' and id like'$id1' " ;
$result=mysql_query($sql)or die( mysql_error()); 
$req=mysql_fetch_array($result);
}

if($req)
{
  $_SESSION['PPassword']=$_POST['PPassword'];
	?>
	<html>
	<head>
		<title>Profile</title>
		<link href="bootstrap.css" rel="stylesheet" type="text/css">
	</head>
	<body style="width=720px; margin=0 auto;background:url(modern-background-design.jpg);no repeat center scroll">
<div id="navbar-main">
      <!--Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
    <!--  <div class="container"> -->
        <div class="navbar-header"> 
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="#home"><span class="icon icon-shield" style="font-size:18px; color:#3498db;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
      <li> <a style="text-align:center" href="mainpage.php" class="smoothScroll"> Account Summary</a></li>
      <li> <a style="text-align:center" href="trans.php" class="smoothScroll">Recent Transactions</a></li>
      <li> <a style="text-align:center" href="fund.php" class="smoothScroll">Money Transfer</a></li>
      <li> <a style="text-align:center" href="pofile.php" class="smoothScroll">Profile</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
      <li> <a href="#services" class="smoothScroll"><font color="orange">Welcome 
      <?php
      $id2=$req['id'];
  $sql2="select * from details where id like '$id2'";
  $res=mysql_query($sql2) or die( mysql_error());
  if($a=mysql_fetch_array($res))
  {
    $sql3="select gender from cust_details where id like '$id2'";
    $resu=mysql_query($sql3) or die( mysql_error());
    if($ab=mysql_fetch_array($resu))
    {
    $g=$ab['gender'];
    //echo $g;
    if($g=='M')
      echo "Mr.";
    else if($g=='F')
      echo "Ms.";
    }
  	echo $a['name'];
  	echo "!";
  	}
      ?> 
  </font></a></li>
      <li><font color="white"><a href="login.html" <button class="btn btn-primary">Logout</button></a></font></li>
      <li> &nbsp &nbsp </li>
  </ul>
  </div>
</div>
</div>

</div><br>  <br>
<div class="alert alert-warning alert-dismissible" role="alert" style="text-align:center;">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
  <img src="ezgif.com-add-text (1).gif" alt="Image not found">
</div>
<h5 style="text-align:right;"><b><?php date_default_timezone_set('Asia/Kolkata');echo date('d-m-Y h:i:s a');?> GMT+0530(Indian Standard Time)&nbsp&nbsp</b></h5><br><br><br><br>
<a href="personal.php" style="font-size:150%;"><p align="center">Personal Details</p></a>
<br><br><br>
<a href="change.php" style="font-size:150%;"><p align="center">Edit Account Password</p></a>
<div class="navbar navbar-default navbar-fixed-bottom">
  <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li style="text-color:black"><b>Copyrights &copy 2016</li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
      <li> <a style="color:black" href="privacy.html" target="_blank" class="smoothScroll"> Privacy statement</a></li>
      <li> <a style="color:black" href="disclosure.html" target="_blank" class="smoothScroll">Disclosure</a></li>
      <li> <a style="color:black" href="terms.html" target="_blank" class="smoothScroll">Terms and conditions</a></li> 
    </div>
  </div>
</body>
<?php
}

else{
  ?>
  <html>
  <head>
    <link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>
  <div class="alert alert-danger" role="alert">
  <img src='download.png' width='2%' height='3%'>
  <span class="sr-only">Error:</span>
  WRONG PROFILE PASSWORD... RETRY
  <br><br>
  <a href='pofile.php'>Click here to return</a>
  <?php
}
?>
 <?php


$con=mysql_connect('localhost','root','') or die( mysql_error());
$db=mysql_select_db('netbanking',$con) or die( mysql_error());
//echo "success";
	?>
	<html>
<head>
  <title>Main Page</title>
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
      session_start();
      $id2 = $_SESSION['id'];
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
<h5 style="text-align:right;"><b><?php date_default_timezone_set('Asia/Kolkata');echo date('d-m-Y h:i:s a');?> GMT+0530(Indian Standard Time)&nbsp&nbsp</b></h5><br><br><br>

<table width="75%" border="3" cellpadding="1" style="cellspacing='1'" class="table table-hover" align="center" noborder>
  <caption style="text-align:center;" style="color;"><b>Account Summary</b></caption>
  <tr>
    <th>Account number</th>
    <th>Account type</th>
    <th>Branch address</th>
    <th>Balance</th>
  </tr>
  <?php
$id1 = $_SESSION['id'];
  $sql2="select * from details where id like '$id1'";
  $res=mysql_query($sql2) or die( mysql_error());
  	if($AC=mysql_fetch_array($res))
				{
					echo "<tr>"; 
					echo "<td>".$AC['ac_no']."</td>";
					echo "<td>".$AC['ac_type']."</td>";
					echo "<td>".$AC['branch']."</td>";
					//echo "<td><a href='login1.php'>Click here for balance</a></td>";
         	echo "<td>".$AC['balance']."</td>";
					echo "</tr>";
			}
  ?>

 <div class="navbar navbar-light navbar-fixed-bottom" style="background-color: white;">
<!--  <div class="container"> -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="#home"><span class="icon icon-shield" style="font-size:18px; color:#3498db;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li><b>Copyrights &copy 2016</li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
      <li> <a href="privacy.html" target="_blank" class="smoothScroll"> <font color="black">Privacy statement</font></a></li>
      <li> <a href="disclosure.html" target="_blank" class="smoothScroll"><font color="black">Disclosure</font></a></li>
      <li> <a href="terms.html" target="_blank" class="smoothScroll"><font color="black">Terms and conditions</font></a></li> 
      </div>
  </ul>
</body>
</html>
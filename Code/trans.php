<?php
$con=mysql_connect('localhost','root','')or die(mysql_error());
$db=mysql_select_db('Netbanking',$con) or die(mysql_error());
?>
<html>
<head>
	<title>Transactions</title>
	<link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body style="width:1270px;margin=0 auto;background:url(modern-background-design.jpg); no repeat center scroll">
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
      $id2=$_SESSION['id'];
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
<h5 style="text-align:right;"><b><?php date_default_timezone_set('Asia/Kolkata');echo date('d-m-Y h:i:s a');?> GMT+0530(Indian Standard Time)&nbsp&nbsp</b></h5>
	<?php
$id1=$_SESSION['id'];
$sql2="select * from details where id='$id1'";
$resu=mysql_query($sql2) or die(mysql_error());
$requ=mysql_fetch_array($resu);
?>
<div align="center"style="margin:60;align:center;border:1px solid black;">
	<h3><b>&nbsp&nbspAccount Information</b></h3>
	<br>
  <h5 style="text-align:justify; margin: 0 ; width: 15em;">Account Number&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
		<?php
	echo $requ['ac_no'];
	?></h5>
  <br>
	<h5 style="text-align:justify; margin: 0 ; width: 15em;"> Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
		<?php
	echo $requ['name'];
	?></h5>
	<br>
  <h5 style="text-align:justify; margin: 0 ; width: 15em;"> &nbspAccount Type&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
		<?php
	echo $requ['ac_type'];
	?></h5>
	<br>
  <h5 style="text-align:justify; margin: 0 ; width: 15em;">&nbspAvailable Balance&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
		<?php
	echo $requ['balance'];
	?>&nbsp&nbsp&nbsp</h5>
	<br>
  <h5 style="text-align:justify; margin: 0; width: 15em;"> &nbspCurrency&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp
		<?php
	echo "INR";
	?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h5><br>
</div>
	<table style="width:'100px';" border="3" cellpadding="1" cellspacing="1" class="table table-hover" align="center" noborder>
  <caption style="text-align:center;" style="color;"><b>Recent Transactions(sorted by date)</b></caption>
	<tr>
	<th>Transaction Ref</th>
	<th>Narration</th>
	<th>Type</th>
	<th>Date(yyyy/mm/dd)</th>
	<th>Amount</th>
	</tr>
<?php
$id1=$_SESSION['id'];
$sql1="select * from transactions where id='$id1' order by date";
$res=mysql_query($sql1) or die(mysql_error());
while($req=mysql_fetch_array($res))
{
	echo "<tr>";
	echo "<td>".$req['trans_id']."</td>";
	echo "<td>".$req['place']."</td>";
	echo "<td>".$req['type']."</td>";
	echo "<td>".$req['date']."</td>";
	echo "<td>".$req['amount']."</td>";
	echo "</tr>";
}?>
</table>
<br><br><br>
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
      
  </ul>
</body>
<html>
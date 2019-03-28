<?php


$con=mysql_connect('localhost','root','') or die( mysql_error());
$db=mysql_select_db('netbanking',$con) or die( mysql_error());
//echo "success";
  ?>
<html>
<head>
  <title>Profile</title>
  <link href="bootstrap.css" rel="stylesheet" type="text/css">
  <script language="javascript">
document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
</script>
</head>
<body style="width=1080px; margin=0 auto;background:url(modern-background-design.jpg);no repeat center scroll" oncontextmenu="return false">
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
      $id1 = $_SESSION['id'];
      $sql1="select * from details where id like '$id1'";
      $res=mysql_query($sql1) or die( mysql_error());
  if($a=mysql_fetch_array($res))
  {
    $sql3="select gender from cust_details where id like '$id1'";
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
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"> </span></button>
  <img src="ezgif.com-add-text (1).gif" alt="Image not found">
</div>
  <h5 style="text-align:right;"><b><?php date_default_timezone_set('Asia/Kolkata');echo date('d-m-Y h:i:s a');?> GMT+0530(Indian Standard Time)&nbsp&nbsp</b></h5><br><br>
  <form class="form-inline" align="center" method="POST" action="change1.php">
    <div>
      <label for="exampleInputPassword1"><font color="orange">Enter Old Password&nbsp&nbsp&nbsp &nbsp&nbsp &nbsp:&nbsp &nbsp</label></font>
    <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Old Password" name="OPassword">
  </div>
  <br><br>
  <div>
      <label for="exampleInputPassword1"><font color="orange"> Enter New Password&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp:&nbsp &nbsp</label></font>
    <input type="password" class="form-control" id="exampleInputPassword3" placeholder="New Password" name="NPassword">
  </div>
  <br><br>
  <div>
      <label for="exampleInputPassword1"><font color="orange"> Re-Enter New Password&nbsp&nbsp &nbsp:&nbsp &nbsp</label></font>
    <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Re-Enter Password" name="RPassword">
  </div>
    <br><br>
  <button type="submit" class="btn btn-default" name="submit">Submit</a></button>&nbsp &nbsp 
  <a href="pofile.php" class="btn btn-danger">Cancel</button></a>
</form>



  <div class="navbar navbar-light navbar-fixed-bottom" style="background-color: white;">
<!--  <div class="container"> -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="#home"><span class="icon icon-shield" style="font-size:18px; color:#FFFFFF;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li style="text-color:black"><b>Copyrights &copy 2016</li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
      <li> <a style="color:black" href="privacy.html" target="_blank" class="smoothScroll"> Privacy statement</a></li>
      <li> <a style="color:black" href="disclosure.html" target="_blank" class="smoothScroll">Disclosure</a></li>
      <li> <a style="color:black" href="terms.html" target="_blank" class="smoothScroll">Terms and conditions</a></li> 
      </body>
</html>
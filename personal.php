<?php
$con=mysql_connect('localhost','root','') or die( mysql_error());
$db=mysql_select_db('netbanking',$con) or die( mysql_error());
//echo "success";
  ?>
<html>
<head>

  <title>Profile</title>
  <link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body style="width=1080px; margin=0 auto;background:url(modern-background-design.jpg);no repeat center scroll">
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
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
  <img src="ezgif.com-add-text (1).gif" alt="Image not found">
</div>
<h5 style="text-align:right;"><b><?php date_default_timezone_set('Asia/Kolkata');echo date('d-m-Y h:i:s a');?> GMT+0530(Indian Standard Time)&nbsp&nbsp</b></h5>
<?php
$id1 = $_SESSION['id'];
      $sql1="select * from cust_details where id like '$id1'";
      $res=mysql_query($sql1) or die( mysql_error());
      if($req=mysql_fetch_array($res))
      {
  ?>    
  <h2 style="text-align:center;font-color:'orange';"><b>Edit Personal Details</b></h2><br><br>
<form class="form-inline" style="text-align:center;" align="center" method="POST" action="personal1.php">
<div class="form-group">
    <label ><font color="orange"><strong>Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></label></font>
        <input type="text" class="form-control" id="exampleInputEmail3" name="custname" style="text-align:center;" value=<?php echo $req['name']?>>
  <br>
  <br>
<label ><font color="orange"><strong>Date Of Birth&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></label></font>
        <input type="text" class="form-control" id="exampleInputEmail3" name="custdob" style="text-align:center;" value=<?php echo $req['dob']?>>
  <br>
  <br>
  <label ><font color="orange"><strong>Gender&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></label></font>
        <input type="radio" class="form-control" id="exampleInputEmail3" name="custg" style="text-align:center;" value="M" checked> Male
        <input type="radio" class="form-control" id="exampleInputEmail3" name="custg" style="text-align:center;" value="F"> Female
  <br>
  <br>
  <label ><font color="orange"><strong>Phone Number&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></label></font>
        <input type="text" class="form-control" id="exampleInputEmail3" name="custphno" style="text-align:center;" value=<?php echo $req['phno']?>>
  <br>
  <br>
    <label ><font color="orange">Address:</label></font>
    <textarea  type="text" class="form-control" id="exampleInputPassword3" name="custaddress" ROW='4' COL='50' style="text-align:center;width:500px; height:100px;font-size:20px;"><?php echo $req['address']?></textarea>

 <button type="submit" class="btn btn-default" name="submit">Submit</a></button>
  <a href="pofile.php" class="btn btn-danger">Cancel</button></a>
    </div> 
<?php
}
else
  echo "Customer Details Not found";?><br><br><br>
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
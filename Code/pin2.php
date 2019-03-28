<html>
<head>
<link href="bootstrap.css" rel="stylesheet" type="text/css">
<title>Payment Gateway</title>
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
<body style="width:1270px;margin=0 auto;background-image: url('modern-background-design.jpg'); no repeat center scroll ; background-size:cover" oncontextmenu="return false">

  <div class='alert alert-danger' role='alert' style="background-size:cover">
 <h3> <img src='download.png' width='2%' height='3%'>
  Error:<br><br>

   WRONG PIN</h3>
  <br><br>
 
<h4><font color="black">
	<?php
	session_start();
	$n=$_SESSION['n'];
	echo $n;
	?>
	&nbspAttempt(s) left
</div>
</font></h4><br><br><br><br>
	<form class="form-inline" align="center" method="POST" action="pin1.php">
  
  <div class="form-group">
    <label><font color="orange"><strong>Enter your PIN:</strong></label></font>
        <input type="number" class="form-control" id="exampleInputEmail3" name="pin"><br><br>
        <button type="submit" class="btn btn-primary" name="submit">PAY</a></button>&nbsp
        <button class="btn btn-danger" name="cancel"><a href="product.html"><font color="white">CANCEL</font></a></button>
    </div>
</form>
</body>
</html>
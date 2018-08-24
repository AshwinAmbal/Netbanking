<html>
<head>
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
<title>Payment Gateway</title>
</head>
<body style="width:1270px;margin=0 auto;background-image: url('modern-background-design.jpg'); no repeat center scroll; background-size:cover" oncontextmenu="return false">
	<h1 style="text-align:center;">PAYMENT GATEWAY</h1>
<?php
function encrypt_decrypt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}
session_start();
$decrypted_txt = encrypt_decrypt('decrypt', $_SESSION['un']);
$un= $decrypted_txt;
$decrypted_txt = encrypt_decrypt('decrypt', $_SESSION['Password']);
$Password= $decrypted_txt;
$decrypted_txt = encrypt_decrypt('decrypt', $_SESSION['id']);
$id= $decrypted_txt;
$con=mysql_connect('localhost','root','')or die(mysql_error());
$db=mysql_select_db('Netbanking',$con) or die(mysql_error());
$id1=$id;
$sql2="select * from details where id='$id1'";
$resu=mysql_query($sql2) or die(mysql_error());
$requ=mysql_fetch_array($resu);
$sql1="select trans_id FROM transactions WHERE trans_id=(select max(trans_id) from transactions)" ;
			$resul=mysql_query($sql1)or die( mysql_error());
			if($requi=mysql_fetch_array($resul))
			{
				$tid= $requi['trans_id'];
				$t=substr($tid,1);
				$t+=1;
				$t1="T$t";
				$_SESSION['tid']=$t1;
			}

?>
<h5 style="text-align:right;"><b><?php date_default_timezone_set('Asia/Kolkata');echo date('d-m-Y h:i:s a');?> GMT+0530(Indian Standard Time)&nbsp&nbsp</b></h5><br><br><br>
<div align="left">
	<h3 style="text-align:center;"><b>&nbsp&nbspTransaction Information</b></h3>
	<table width="75%" border="3" cellpadding="1" cellspacing="1" class="table table-hover" align="center" noborder>
  <tr>
    <th>Account number</th>
    <th>Account type</th>
    <th>Branch address</th>
  </tr>
 
  <?php
  $id2=$id;
  $sql2="select * from details where id like '$id2'";
  $res=mysql_query($sql2) or die( mysql_error());
    while($AC=mysql_fetch_array($res))
        {
          echo "<tr>";
          echo "<td style='text-align:center'>".$AC['ac_no']."</td>";
          echo "<td style='text-align:center'>".$AC['ac_type']."</td>";
          echo "<td style='text-align:center'>".$AC['branch']."</td>";
          echo "</tr>";
      }
  ?>
</table></div><br>
<div align="center">

	<h5 style="text-align:justify; margin: 0 ; width: 15em;"> Reference&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
		<?php
	echo $t1;
	?></h5><br>
	<h5 style="text-align:justify; margin: 0 ; width: 15em;"> Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
		<?php
	echo $requ['name'];
	?></h5><br>
	<h5 style="text-align:center;margin:0; width: 102em ; "> Purpose&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
		<?php
	echo $_SESSION['client'];
	?></h5><br>
	<h5 style="text-align:justify; margin: 0 ; width: 15em;">&nbspAmount&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
		<?php
	echo $_SESSION['amount'];
	?>&nbsp&nbsp&nbsp</h5><br>
	<h5 style="text-align:justify; margin: 0 ; width: 15em;"> &nbspCurrency&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp
		<?php
	echo "INR";
	?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h5><br>
	<h5 style="text-align:justify; margin: 0 ; width: 20em;"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDate&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp
		<?php
	date_default_timezone_set('Asia/Kolkata');echo date('d/m/Y');
	?></h5> <br>
	<button class="btn btn-default" type="submit"><a href="pin.php">Confirm</a></button>
  <button class="btn btn-danger" name="cancel"><a href="product.html"><font color="white">CANCEL</font></a></button>
</div>

</body>
</html>
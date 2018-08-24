<html>
<head>
	<title>Purchase</title>
	<link href="bootstrap.css" rel="stylesheet"  type="text/css">
</head>
<body>
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
$decrypted_txt = encrypt_decrypt('decrypt', $_SESSION['id']);
$id= $decrypted_txt;
$con=mysql_connect('localhost','root','')or die(mysql_error());
$db=mysql_select_db('Netbanking',$con) or die(mysql_error());
$id1=$id;
$amount=$_SESSION['amount'];
$client=$_SESSION['client'];
$tid=$_SESSION['tid'];
//$tid=$_POST['tid'];
date_default_timezone_set('Asia/Kolkata');
$dat=date('Y-m-d');
$sql2="select balance from details where id='$id'";
$res2=mysql_query($sql2);
$req=mysql_fetch_array($res2);
$balance=$req['balance'];
if(!($balance < $amount))
{
$sql1="insert into transactions(trans_id,place,type,id,date,amount)values('$tid','$client','Debit','$id','$dat','$amount')" ;
				$res=mysql_query($sql1)or die( mysql_error());
$sql3="update details set balance=balance-'$amount' where id='$id'";
    mysql_query($sql3) or die( mysql_error());

if($res)
{
	$page="success.html";
	header("Location:$page");
}
else
{
	?>
	<div class="alert alert-danger" role="alert">
	<h1>TRANSACTION TIMED OUT</h1>
</div>
<a href="product.html">Click here&nbsp</a>to return to Merchant page

<?php
}
}
else
{
    ?>
<div class="alert alert-danger" role="alert">
    <h1>INSUFFICIENT BALANCE</h1>
</div>
<a href="product.html">Click here&nbsp</a>to return to Merchant page
</body>
</html>
<?php
}
 ?>	
<?php
session_start();
$n=$_SESSION['n'];
//echo $n;
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
$decrypted_txt = encrypt_decrypt('decrypt', $_SESSION['id']);
$id= $decrypted_txt;
if($n>0)
{
if(isset($_POST['submit']))
{
$con=mysql_connect("localhost","root","") or die( mysql_error());
$db=mysql_select_db("Netbanking",$con) or die( mysql_error());
$pin=$_POST['pin'];

$sql1 = "select pin from login where id='$id' and pin='$pin'";
$res=mysql_query($sql1) or die(mysql_error());
$req=mysql_fetch_array($res);
}
if($req)
{
		$page= "buy.php";
		header("Location: $page");
}
else
{
	$n=$n-1;
	$_SESSION['n']=$n;
	if($n>0)
	{
	
		$page= "pin2.php";
		header("Location: $page");
}
else
{
		$page= "displayerror.html";
		header("Location: $page");	
}
}
}
else
{
		$page= "displayerror.html";
		header("Location: $page");	
}

?>
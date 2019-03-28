<?php
if(isset($_POST['submit']))
{
$con=mysql_connect('localhost','root','') or die( mysql_error());
$db=mysql_select_db('netbanking',$con) or die( mysql_error());
$un = $_POST['un'];
$Password = $_POST['Password'];
$sql="select id FROM login WHERE password like '$Password' and username like '$un'  " ;
$result=mysql_query($sql)or die( mysql_error()); 
}

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

if($req=mysql_fetch_array($result))
{
  session_start();
//session_register('un');
//session_register('Password');
//session_register('id');
$n=2;
$_SESSION['n']=$n;
$encrypted_txt = encrypt_decrypt('encrypt',$_POST['un']);
$_SESSION['un'] = $encrypted_txt;
$encrypted_txt = encrypt_decrypt('encrypt',$_POST['Password']);
$_SESSION['Password'] = $encrypted_txt;
$encrypted_txt = encrypt_decrypt('encrypt',$req['id']);
$_SESSION['id'] = $encrypted_txt;
$_SESSION['amount'] = $_POST['amount'];
$_SESSION['client']="Merchant Payments BBB Shopping";
$page= "paygate.php";
header("Location: $page");
	?><!--
	<html>
<head>
  <title>Main Page</title>
  <link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body style="width=720px; margin=0 auto;background:url(http://psdgraphics.com/file/modern-background-design.jpg);no repeat center scroll">
<div id="navbar-main">
      
    <div class="navbar navbar-inverse navbar-fixed-top">
  
        <div class="navbar-header"> 
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="#home"><span class="icon icon-shield" style="font-size:18px; color:#3498db;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
      <li> <a style="text-align:center" href="#about" class="smoothScroll"> Account Summary</a></li>
      <li> <a style="text-align:center" href="#services" class="smoothScroll">Recent Transactions</a></li>
      <li> <a style="text-align:center" href="#services" class="smoothScroll">Money Transfer</a></li>
      <li> <a style="text-align:center" href="pofile.html" class="smoothScroll">Profile</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
      <li> <a href="#services" class="smoothScroll"><font color="orange">Welcome 
      <?php
   /*   $id2=$req['id'];
  $sql2="select * from details where id like '$id2'";
 $res=mysql_query($sql2);
  if($a=mysql_fetch_array($res))
  {
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
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">times</span></button>
  <strong>Alert!</strong> IF your page appears hazy, refresh the page
</div><br><br><br><br><br><br><br>
<table width="50%" border="3" cellpadding="1" cellspacing="1" class="table table-hover" align="center" noborder>
  <tr>
    <th>Account number</th>
    <th>Account type</th>
    <th>Branch address</th>
    <th>Balance</th>
  </tr>
  <?php
  $id2=$req['id'];
  $sql2="select * from details where id like '$id2'";
  $res=mysql_query($sql2);
  	while($AC=mysql_fetch_array($res))
				{
					echo "<tr>";
					echo "<td>".$AC['ac_no']."</td>";
					echo "<td>".$AC['ac_type']."</td>";
					echo "<td>".$AC['branch']."</td>";
					echo "<td><a href='login1.php'>Click here for balance</a></td>";
         // echo "<td>".$AC['balance']."</td>";
					echo "</tr>";
			}*/
  ?>

 <div class="navbar navbar-light navbar-fixed-bottom" style="background-color: white;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="#home"><span class="icon icon-shield" style="font-size:18px; color:#3498db;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li><b>Copyrights 2016</li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
      <li> <a href="privacy.html" target="_blank" class="smoothScroll"> <font color="black">Privacy statement</font></a></li>
      <li> <a href="disclosure.html" target="_blank" class="smoothScroll"><font color="black">Disclosure</font></a></li>
      <li> <a href="terms.html" target="_blank" class="smoothScroll"><font color="black">Terms and conditions</font></a></li> 
      
  </ul>
</body>
<html>-->
<?php
}
else
{?>
  <html>
  <head>
    <link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="alert alert-danger" role="alert">
 <img src='download.png' width='2%' height='3%'>
  <span class="sr-only">Error:</span>
  &nbsp LOGIN FAILED
</div>
</body>
</html>
<?php
	
  //$page= "login1.html";
 //header("Location: $paeg");
}
?>	

<!--location:country.html-->
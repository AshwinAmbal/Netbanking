<?php
$dat=date('Y-m-d');
echo $dat;
/*$con=mysql_connect('localhost','root','') or die( mysql_error());
$db=mysql_select_db('netbanking',$con) or die( mysql_error());
session_start();
$sql="select trans_id FROM transactions WHERE trans_id=(select max(trans_id) from transactions)" ;
$result=mysql_query($sql)or die( mysql_error());
if($req=mysql_fetch_array($result))
{	
	$tid= $req['trans_id'];
	$t=substr($tid,1);
	$t+=1;
	echo $t;
}
$t=5;
$n=5;
$t1= "T100$t";
echo $t1;
echo "I love Ashwin ". $n;*/
?>
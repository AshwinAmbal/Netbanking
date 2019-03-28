<?php
if(isset($_POST['submit']))
{
$con=mysql_connect('localhost','root','') or die( mysql_error());
$db=mysql_select_db('netbanking',$con) or die( mysql_error());
$acno = $_POST['acno'];
$funds = $_POST['funds'];
session_start();
$id=$_SESSION['id'];
$sql="select ac_no,balance FROM details WHERE id='$id'" ;
$result=mysql_query($sql)or die( mysql_error());
if($req=mysql_fetch_array($result))
{
	$bala=$req['balance'];
	$ac=$req['ac_no'];
	if($bala<$funds)
	{	echo "<h2>INSUFFICIENT FUNDS...</h2>";
		echo "<a href='fund.php'>Click here to return";
	}
	else
	{	
		$sql1="select id,balance FROM details WHERE ac_no='$acno' and ac_no!='$ac'" ;
		$res=mysql_query($sql1)or die( mysql_error());
		if(!($requ=mysql_fetch_array($res)))
		{
			echo "<h2>INVALID ACCOUNT NUMBER</h2>";
			echo "<a href='fund.php'>Click here to return";
		}
		else
		{	date_default_timezone_set('Asia/Kolkata');
			$dat=date('Y-m-d');
			$bal=$requ['balance'];
			$bal=$bal+$funds;
			$bala=$bala-$funds;
			$id1=$requ['id'];
			$sql1="update details set balance='$bal' where id='$id1'" ;
			mysql_query($sql1)or die( mysql_error());
			$sql1="update details set balance='$bala' where id='$id'" ;
			mysql_query($sql1)or die( mysql_error());
			$sql2="select trans_id FROM transactions WHERE trans_id=(select max(trans_id) from transactions)" ;
			$resu=mysql_query($sql2)or die( mysql_error());
			if($requi=mysql_fetch_array($resu))
			{
				$tid= $requi['trans_id'];
				$t=substr($tid,1);
				$t+=1;
				$t1="T$t";
				$sql1="insert into transactions(trans_id,place,type,id,date,amount)values('$t1','Fund Transfer from $ac','Credit','$id1','$dat','$funds')" ;
				mysql_query($sql1)or die( mysql_error());
				$t+=1;
				$t1="T$t";
				$sql1="insert into transactions(trans_id,place,type,id,date,amount)values('$t1','Fund Transfer to $acno','Debit','$id','$dat','$funds')" ;
				mysql_query($sql1)or die( mysql_error());
			}
			echo "<h2>FUND TRANSFER SUCCESSFUL</h2>";
			echo "<h3>Check Recent Transactions for more details</h3>";
			echo "<a href='mainpage.php'>Click here to continue";
		} 
	}
}
}
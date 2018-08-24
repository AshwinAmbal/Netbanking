<?php
session_start();
$n=$_SESSION['n'];
//echo $n;
$n=$n-1;
$_SESSION['n']=$n;
?>
<html>
  <head>
    <link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>
  <div class="alert alert-danger" role="alert">
  <img src='download.png' width='2%' height='3%'>
  Error:&nbsp&nbsp
  YOU HAVE EXCEEDED MAXIMUM NUMBER OF TRIALS FOR THIS SESSION
  <h3>LOGIN AGAIN LATER</h3>
  
</div> 
  <a href='pofile.php'>Click here to return</a>
</html>
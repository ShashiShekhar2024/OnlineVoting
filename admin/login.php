<?php session_start(); ?><?php
include "dbconn.php";
$username=$_POST['uname'];
$password=$_POST['pass'];
//echo $username." ".$password;
$query="select username from tbl_admin where username='$username' and password='$password'";
//echo $query;
$result=mysqli_query($conn, $query ); //echo $result;
$num=mysqli_num_rows($result); //echo $num;
if($num==1) 
{
print '<script>alert('.$username.');</script>';   
$_SESSION['username']=$username;
print '<script>alert('.$_SESSION['username'].');</script>';   
include "ControlPanel.php";
}
else{
include "wrong.php";
}
?>
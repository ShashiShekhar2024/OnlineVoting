<<<<<<< HEAD
<?php
session_start(); include "dbconn.php"; 
$username = $_POST['uname']; 
$password = $_POST['pass'];
//echo $username." ".$password;
$query="select username from users where username='$username' and password='$password'";
//echo $query;
$query = "SELECT id, username FROM users WHERE username='$username' AND password='$password'"; 
$result = mysqli_query($conn, $query); 
$num = mysqli_num_rows($result); 
if ($num == 1) { 
    $row = mysqli_fetch_assoc($result); 
    $user_id = $row['id'];
    $username = $row['username'];
    
    $_SESSION['id'] = $user_id;
    $_SESSION['username'] = $username;
    //print '<script>alert('.$username.');</script>';   
//$_SESSION['username']=$username;
//print '<script>alert("User ID: ' . $user_id . '");</script>'; 
//print '<script>alert("Username: ' . $username . '");</script>';
//print '<script>alert('.$_SESSION['username'].');</script>';   
include "votingdetail.php";
}
else{
include "wrong.php";
}
?>

=======
<?php session_start(); ?><?php
include "dbconn.php";
$username=$_POST['uname'];
$password=$_POST['pass'];
//echo $username." ".$password;
$query="select username from users where username='$username' and password='$password'";
//echo $query;
$result=mysqli_query($conn, $query ); //echo $result;
$num=mysqli_num_rows($result); //echo $num;
if($num==1) 
{
print '<script>alert('.$username.');</script>';   
$_SESSION['username']=$username;
print '<script>alert('.$_SESSION['username'].');</script>';   
include "votingdetail.php";
}
else{
include "wrong.php";
}
?>

>>>>>>> 9f56af447b66b68153dd82e1e919af06993781ca

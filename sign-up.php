<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Voting</title>
	<link rel="icon" type="image/gif"  href="images/animated_favicon1.gif" >
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/votingapp.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container h-100">
	<div class="d-flex justify-content-center h-100" id="cont">
		<div class="user_card" id="login">
			<div class="d-flex justify-content-center">
				<div class="brand_logo_container">
					<img src="assets/images/voting.gif" class="brand_logo" alt="Logo">
				</div>
			</div>
			<div class="d-flex justify-content-center form_container">
				<form method="post" nam="sign_up" id="sign_up" action="">
					<div class="form-group mb-1">
						<label for="uname" class="w-bolder text-white">Username</label>
    					<input type="text" class="form-control" id="uname" placeholder="user name" name="uname">
					</div>
                    <div class="form-group mb-1">
						<label for="contactNumber" class="w-bolder text-white">Contact Number</label>
						<input type="number" class="form-control" id="contactNumber" placeholder="Contact Number"  name="contactNumber">
					</div>
					<div class="form-group mb-1">
						<label for="pass" class="w-bolder text-white">Password</label>
						<input type="password" class="form-control" id="pass" placeholder="Password"  name="pass">
					</div>
                    <div class="form-group mb-1">
						<label for="emailid" class="w-bolder text-white">Email</label>
						<input type="email" class="form-control" id="emailid" placeholder="Email"  name="emailid">
					</div>
					<div class="mb-1">
						<input type="submit" name="sign_up" class="btn btn-primary btn-block" value="Sign in" />
					</div>
				</form>
			</div>
			<div class="mt-4">
				<p class="mb-5 pb-lg-2 text-white">If you have account then <a href="index.php"
					style="color: #112d32;">Click here</a></p>
			</div>
		</div>
	</div>
</div>
<script language="javascript" type="text/javascript" src="assets/js/jquery-3.7.1.min.js"></script>
<script language="javascript" type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript"  src="assets/js/gen_validatorv31.js"></script>
<script language="javascript" type="text/javascript">
	var frmvalidator  = new Validator("sign_up");
  frmvalidator.addValidation("uname","req","Please enter your Name");
  frmvalidator.addValidation("uname","maxlen=20","Max length for Name is 20");
  frmvalidator.addValidation("pass","req","Please enter your Password"); 
</script>

<?php
require_once("dbconn.php");
if(isset($_POST['sign_up']))
{
	$uname=$_POST['uname'];
	$contactNumber=$_POST['contactNumber'];
	$pass=$_POST['pass'];
	$emailid=$_POST['emailid'];
	$sql1="insert into users(username,contact_num,password,emailid) values('$uname','$contactNumber','$pass','$emailid')";
};
echo $sql1;
$ins1=mysqli_query($conn,$sql1)or die("<p class='style1' style='height:260px'>The provided mobie no. $contactNumber already registered. pls provide a unique mobile no. for registering </p>");
	
if($sql1)
{
	echo "<span class='style1'>Hello </span><span class='style2'>$uname</span><span class='style1'>, thanks for registering on LiveTips. You have been registered successfully.</span>";					
}
else
{
echo "<p class='style1'>Registration failed,<br/> Please give your proper details including unique mobile number and try again.</p>";
}

?>
</body>
</html>

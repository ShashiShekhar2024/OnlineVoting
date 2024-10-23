<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="" />
	<title>Voting</title>
	<link rel="icon" type="image/gif"  href="" >
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
				<form method="post" nam="form1" id="form1" action="login.php">
					<div class="form-group mb-1">
						<label for="uname" class="w-bolder text-white">Username</label>
    					<input type="text" class="form-control" id="uname" placeholder="user name" name="uname">
					</div>
					<div class="form-group mb-1">
						<label for="pass" class="w-bolder text-white">Password</label>
						<input type="password" class="form-control" id="pass" placeholder="Password"  name="pass">
					</div>
					<div class="form-check mb-1">
						<input type="checkbox" class="form-check-input" id="customControlInline">
						<label class="form-check-label text-white" for="customControlInline">Remember me</label>
					</div>
					<div class="mb-1">
						<input type="submit" class="btn btn-primary btn-block" value="Login" />
					</div>
				</form>
			</div>
			<div class="mt-4">
				<a class="small text-muted text-white" href="#!">Forgot password?</a>
				<p class="mb-5 pb-lg-2 text-white">Don't have an account? <a href="sign-up.php"
					style="color: #112d32;">Register here</a></p>
			</div>
		</div>
	</div>
</div>
<script language="javascript" type="text/javascript" src="assets/js/jquery-3.7.1.min.js"></script>
<script language="javascript" type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript"  src="assets/js/gen_validatorv31.js"></script>
<script language="javascript" type="text/javascript">
function SubmitForm()
{
//document.getElementById("cont").innerHTML="";
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("cont").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","login.php?uname="+document.getElementById("uname").value+"&pass="+document.getElementById("pass").value,true);
	xmlhttp.send();
}
  var frmvalidator  = new Validator("form1");
  frmvalidator.addValidation("uname","req","Please enter your Name");
  frmvalidator.addValidation("uname","maxlen=20","Max length for Name is 20");
  frmvalidator.addValidation("pass","req","Please enter your Password"); 
</script>
</body>
</html>

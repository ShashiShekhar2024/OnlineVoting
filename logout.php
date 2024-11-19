<<<<<<< HEAD
<?php session_start(); ?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="" />
	<title>Voting</title>
	<link rel="icon" type="image/png"  href="assets/images/favicon-32x32.png" />
</head>

<body>
<?php 
session_destroy(); 
print "<script>";
print "self.location='index.php';";
print "</script>";
?>
</body>
=======
<?php session_start(); ?><!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="" />
	<title>Voting</title>
</head>

<body>
<?php 
session_destroy(); 
print "<script>";
print "self.location='index.php';";
print "</script>";
?>
</body>
>>>>>>> 9f56af447b66b68153dd82e1e919af06993781ca
</html>
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
</html>
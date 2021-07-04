<?php
	include 'server.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<h1>Delivery Management System</h1>
	<h4> Hello <?php echo $_SESSION['username']; ?></h4><br><br><br>
 	<a href="deliverymanprofile.php"></a><br>
	<a href="checkrequest.php">Check Delivery Request</a> <br>
	<a href="deliverymancheck.php">Check all your delivery</a><br>
	<a href="deliverymanhistory.php">Check your delivery history</a>
	 <br><br>
	<a href="signout.php">Signout (<?php echo $_SESSION['username'];?>)  </a>
</body>
</html>
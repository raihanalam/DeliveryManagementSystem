<?php
	include 'server.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>User profile</title>
</head>
<body>
	<h3>Profile</h3>
	<?php
		$username=$_SESSION['username'];
		$query="SELECT * FROM user WHERE Username='$username'";
		$result=mysqli_query($conn,$query);
		$resultcheck=mysqli_num_rows($result);

		if($resultcheck == 1)
		{
			$row=mysqli_fetch_assoc($result);
			echo "Username:".$row['Username']; echo "<br>";
			echo "Name:" .$row['Name']; echo "<br>";
			echo "Email:" .$row['Email']; echo "<br>";
			echo "Phone:" .$row['Phone']; echo "<br>";
			echo "Gender:" .$row['Gender']; echo "<br>";
		}
	?>

</body>
</html>
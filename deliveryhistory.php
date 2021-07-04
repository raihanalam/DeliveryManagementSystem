<?php
	include 'server.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delivery Checkup</title>
</head>
<body>
	<h3>All your delivery</h3>
	<?php
		$username=$_SESSION['username'];
		$query="SELECT * FROM delivery WHERE Username='$username'";
		$result=mysqli_query($conn,$query);
		$resultcheck=mysqli_num_rows($result);

		if($resultcheck > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				echo  "Delivery ID:".$row['Delivery_ID']; echo "Parcel ID:" .$row['Parcel_ID'];
			}
		}
	?>

</body>
</html>
<?php
	include 'server.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delivery Checkup</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h3>All your delivery</h3>
	<table>
		<tr>
			<th>Delivery ID</th>
			<th>Parcel ID</th>
		</tr>
	<?php
		$username=$_SESSION['username'];
		$query="SELECT * FROM delivery WHERE Username='$username'";
		$result=mysqli_query($conn,$query);
		$resultcheck=mysqli_num_rows($result);

		
		if($resultcheck > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				echo "<tr><td>" .$row["Delivery_ID"] ."</td><td>" .$row["Parcel_ID"] ."</td></tr>";
			}
			echo "</table>";
		}
	?>

</body>
</html>
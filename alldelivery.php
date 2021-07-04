<?php
	include 'server.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>All Delivery</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h3>All Delivery</h3>
	<table>
		<tr>
			<th>Delivery ID</th>
			<th>Parcel ID</th>
			<th>Username</th>
		</tr>
	<?php
		$query="SELECT * FROM delivery";
		$result=mysqli_query($conn,$query);
		$resultcheck=mysqli_num_rows($result);

		
		if($resultcheck > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				echo "<tr><td>" .$row["Delivery_ID"] ."</td><td>" .$row["Parcel_ID"] ."</td><td>" .$row["Username"] ."</td></tr>";
			}
			echo "</table>";
		}
	?>

</body>
</html>
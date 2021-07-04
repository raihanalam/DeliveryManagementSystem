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
	<h3>All User</h3>
	<table>
		<tr>
			<th>Username</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Gender</th>
		</tr>
	<?php
		$query="SELECT * FROM user";
		$result=mysqli_query($conn,$query);
		$resultcheck=mysqli_num_rows($result);

		
		if($resultcheck > 0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				echo "<tr><td>" .$row["Username"] ."</td><td>" .$row["Name"] ."</td><td>" .$row["Email"] ."</td><td>" .$row["Phone"] ."</td><td>" .$row["Gender"] ."</td></tr>";
			}
			echo "</table>";
		}
	?>

</body>
</html>
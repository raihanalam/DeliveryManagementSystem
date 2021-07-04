<?php
	include 'server.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delivery Request</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<table>
		<tr>
			<th>Username</th>
			<th>Delivery ID</th>
			<th>Sender Address</th>
			<th>Recevier Address</th>
			<th></th>
		</tr>

	<?php

		$user=$_SESSION['username'];


		$query="SELECT City FROM delivery_man WHERE Delivery_Man_ID='$user'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);

		$city=$row['City'];





		$query2="SELECT * FROM request WHERE City='$city'";
		$result1=mysqli_query($conn,$query2);
		$resultcheck=mysqli_num_rows($result1);
		if($resultcheck > 0)
		{
			while($row1=mysqli_fetch_assoc($result1))
			{
				echo "<tr><td>" .$row1["Username"] ."</td><td>" .$row1["Delivery_ID"] ."</td><td>" .$row1["Sender_Address"] ."</td><td>" .$row1["Recevier_Address"] ."</td><td>"."<button type='submit'>Go For Request</button>" ."</td></tr>";
			}
			echo "</table>";
		}
	?>

</body>
</html>
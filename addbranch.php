<?php 
	if(isset($_POST['add']))
	{
		include 'server.php';
		//Initializing variables
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$country=$_POST['country'];

		//checking connection to db
		if($conn->connect_error){
			die('Cooncetion error:' .$conn->connect_error);
		}
		else{

			//Add Branch
			$reg="INSERT INTO branch(Name,Email,Phone,Address,City,Country) VALUES('$name','$email','$phone','$address','$city','$country')";
			if(mysqli_query($conn,$reg))
			{
				echo "Branch Aded!";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Add Branch</title>
</head>
<body>
	<div>
		<h3>Addd Branch Information</h3>

		<form action="" method="POST">
			<input type="text" placeholder="Enter Branch Name:" name="name" required><br><br>
			<input type="email" placeholder="Enter Branch Email" name="email" required><br><br>
			<input type="phonenumber" placeholder="Enter Phone Number " name="phone" required><br><br>
			<input type="address" placeholder="Enter Branch Address " name="address" required><br><br>
			<input type="city" placeholder="Enter Branch City " name="city" required><br><br>
			<input type="country" placeholder="Enter Branch Country " name="country" required><br><br><br>

			<button type="submit" name="add" >Add</button><br>
		</form>
	</div>
</body>
</html>
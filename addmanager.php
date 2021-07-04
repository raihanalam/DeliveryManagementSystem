<?php 
	if(isset($_POST['add']))
	{
		include 'server.php';
		//Initializing variables
		$managerid=$_POST['managerid'];
		$branchid=$_POST['branchid'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];

		//checking connection to db
		if($conn->connect_error){
			die('Cooncetion error:' .$conn->connect_error);
		}
		else{

			//Add Branch
			$reg="INSERT INTO manager(Manager_ID,Branch_ID,Name,Email,Phone,Password) VALUES('$managerid','$branchid','$name','$email','$phone','$password')";
			if(mysqli_query($conn,$reg))
			{
				echo "Manager Aded!";

			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Add Manager</title>
</head>
<body>
	<div>
		<h3>Addd Manager Information</h3>

		<form action="" method="POST">
			<input type="MID" placeholder="Enter Manager ID " name="managerid" required><br><br>
			<input type="text" placeholder="Enter Branch ID " name="branchid" required><br><br>
			<input type="text" placeholder="Enter Name:" name="name" required><br><br>
			<input type="email" placeholder="Enter Email" name="email" required><br><br>
			<input type="phonenumber" placeholder="Enter Phone " name="phone" required><br><br>
			<input type="password" placeholder="Enter Password " name="password"><br><br><br>

			<button type="submit" name="add" >Add</button><br>
		</form>
	</div>
</body>
</html>
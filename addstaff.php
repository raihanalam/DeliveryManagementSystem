<?php 
	if(isset($_POST['add']))
	{
		include 'server.php';
		//Initializing variables
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$branch=$_POST['branch'];
		$post=$_POST['post'];
		$salary=$_POST['salary'];

		//checking connection to db
		if($conn->connect_error){
			die('Cooncetion error:' .$conn->connect_error);
		}
		else{

			//Add Branch
			$reg="INSERT INTO staff(Branch_ID,Name,Email,Phone,Post,Salary) VALUES('$branch','$name','$email','$phone','$post','$salary')";
			if(mysqli_query($conn,$reg))
			{
				echo "Staff Aded!";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Add Staff</title>
</head>
<body>
	<div>
		<h3>Addd Staff Information</h3>

		<form action="" method="POST">
			<input type="text" placeholder="Enter Name:" name="name" required><br><br>
			<input type="email" placeholder="Enter Email" name="email" required><br><br>
			<input type="phone" placeholder="Enter Phone Number " name="phone" required><br><br>
			<input type="text" placeholder="Enter Branch ID " name="branch" required><br><br>
			<input type="text" placeholder="Enter Position " name="post" required><br><br>
			<input type="number" placeholder="Enter Salary " name="salary" required><br><br><br>

			<button type="submit" name="add" >Add</button><br>
		</form>
	</div>
</body>
</html>
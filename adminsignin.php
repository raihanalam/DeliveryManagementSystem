<?php 
	include 'server.php';

	if(isset($_POST['signin']) && isset($_POST['adminid']) && isset($_POST['password'])){
	//connect to db
	$conn= new mysqli('localhost','root','','delivery management system');

	//Initializing variables.
	$adminid=$_POST['adminid'];
	$password=$_POST['password'];

	//checking connection to db
	if($conn->connect_error){
		die('Cooncetion error:' .$conn->connect_error);
	}
	else{

	//Signin processing

		$check_query="SELECT * FROM admin WHERE Admin_ID='$adminid' && Password='$password'";

		$result= mysqli_query($conn,$check_query);
		$rownum= mysqli_num_rows($result);

		if($rownum==1){

			$_SESSION['admin']=$adminid;
			$_SESSION['success']="You are now loged in";
			header('location: adminmode.php');
		}
		else
		{
			echo "Username and password doesnt match!";
		}


	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Admin Signin</title>
</head>
<body>
	<div class="container">
		<div class="form_body">
			<h3>Admin Signin Form</h3>
			<form action="" method="POST">
				<label for='UN'>Admin ID</label><br>
				<input type="text" placeholder="Enter Username" name="adminid" id="UN" required><br>
				<label for="pass">Password</label><br>
				<input type="password" placeholder="Enter Password" name="password" id="pass" required><br><br>
				<button type="submit" name="signin">Signin</button><br>
			</form>
		</div>
	</div>

</body>
</html>
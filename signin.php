<?php

	if(isset($_POST['signin']) && isset($_POST['username']) && isset($_POST['password'])){

		include 'server.php';

		//Initializing variables.
		$username=$_POST['username'];
		$password=$_POST['password'];

		//checking connection to db
		if($conn->connect_error){
			die('Cooncetion error:' .$conn->connect_error);
		}
		else{

		//Signin processing

			$check_query="SELECT * FROM user WHERE Username='$username' && Password='$password'";

			$result= mysqli_query($conn,$check_query);
			$rownum= mysqli_num_rows($result);

			if($rownum==1){

				$_SESSION['username']=$username;
				$_SESSION['success']="You are now loged in";
				header('location: index.php');
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
	<title>User Signin</title>
</head>
<body>
	<div class="container">
		<div class="form_body">
			<h3>Signin Form</h3>
			<form action="" method="POST">
				<label for='UN'>Username</label><br>
				<input type="text" placeholder="Enter Username" name="username" id="UN" required><br>
				<label for="pass">Password</label><br>
				<input type="password" placeholder="Enter Password" name="password" id="pass" required><br><br>
				<button type="submit" name="signin">Signin</button><br>
				Havn't account?<a href="signup.php">Signup</a>
			</form>
			
		</div>
	</div>

</body>
</html>
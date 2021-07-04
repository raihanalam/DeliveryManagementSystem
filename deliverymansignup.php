<?php 
	if(isset($_POST['signup'])){
	include 'server.php';
	//Initializing variables.
	$username=$_POST['username'];
	$name=$_POST['name'];
	$nid=$_POST['nid'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$password=$_POST['password'];

	//checking connection to db
	if($conn->connect_error){
		die('Cooncetion error:' .$conn->connect_error);
	}
	else{
	//Signup processing

		$check_query="SELECT Delivery_Man_ID FROM delivery_man WHERE Delivery_Man_ID='$username'";
		$check_query1="SELECT Email FROM delivery_man WHERE Email='$email'";
		$reg="INSERT INTO delivery_man(Delivery_Man_ID,Name,National_ID,Email,Phone,City,Password) VALUES('$username','$name','$nid','$email','$phone','$city','$password')";

		$result= mysqli_query($conn,$check_query);
		$result1= mysqli_query($conn,$check_query1);
		$rownum=mysqli_num_rows($result);
		$rownum1=mysqli_num_rows($result1);

		if($rownum==0 && $rownum1==0){

			mysqli_query($conn,$reg);

			$_SESSION['username']=$username;
			$_SESSION['success']="You are now loged in";
			header('location: deliveryman.php');
		}
		elseif($rownum1!=0){
			echo "This email already registerd.";
		}
		else
		{
			echo "Sorry this username is already used by another account";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Delivery Man Signup</title>
</head>
<body>
	<div class="container">
		<div class="form_body">
			<h3>Delivery Man Signup Form</h3>
			<form action="deliverymansignup.php" method="POST">
				<label for='UN'>Username</label><br>
				<input type="text" placeholder="Enter Username" name="username" id="UN" required><br>
				<label for="name">Full Name</label><br>
				<input type="text" placeholder="Enter Fullname" name="name" id="name" required><br>
				<label for="nid">National ID</label><br>
				<input type="text" placeholder="Enter National ID" name="nid" id="nid" required><br>
				<label for="mail">Email</label><br>
				<input type="email" placeholder="Enter Email" name="email" id="mail" required><br>
				<label for="phone">Phone</label><br>
				<input type="phonenumber" placeholder="Enter Phone" name="phone" id="phone" required><br>
				<label for="ct">City</label><br>
				<input type="city" placeholder="Enter City" name="city" id="ct" required><br>
				<label for="pass">Password</label><br>
				<input type="password" placeholder="Enter Password" name="password" id="pass" required><br>
				<label for="pass1">Confirm Password</label><br>
				<input type="password" placeholder="Confirm your Password" name="password1" id="pass1" required><br><br>
				<button type="submit" name="signup" >Signup</button><br>

				Already have an account?<a href="deliverymansignin.php">Signin</a>
			</form>
			
		</div>
	</div>
</body>
</html>
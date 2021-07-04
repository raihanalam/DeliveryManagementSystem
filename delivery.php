 <?php 
	include 'server.php';

//initializing variables

if(isset($_POST['deliver'])){

	$type=$_POST['type'];
	$weight=$_POST['weight'];
	$height=$_POST['height'];
	$width=$_POST['width'];
	$price=$_POST['price'];

	$sname=$_POST['sname'];
	$semail=$_POST['semail'];
	$sphone=$_POST['sphone'];
	$saddress=$_POST['saddress'];
	$scity=$_POST['scity'];
	$scountry=$_POST['scountry'];

	$rname=$_POST['rname'];
	$remail=$_POST['remail'];
	$rphone=$_POST['rphone'];
	$raddress=$_POST['raddress'];           
	$rcity=$_POST['rcity'];
	$rcountry=$_POST['rcountry'];


	$conn= new mysqli('localhost','root','','delivery management system');
	//checking connection to db
	if($conn->connect_error){
		die('Cooncetion error:' .$conn->connect_error);
	}
	else{

		//delivery requesting process
		$query="INSERT INTO parcel(Type,Weight,Height,Width,Price) VALUES('$type','$weight','$height','$width','$price')";
		if(mysqli_query($conn,$query))
		{
			$parcelid=mysqli_insert_id($conn);
			$username=$_SESSION['username'];
			$query1="INSERT INTO delivery(Parcel_ID,Username) VALUES('$parcelid','$username')";
			if(mysqli_query($conn,$query1))
			{
				$deliveryid=mysqli_insert_id($conn);

				$query2="INSERT INTO sender(Delivery_ID,Name,Email,Phone,Address,City,Country) VALUES('$deliveryid','$sname','$semail','$sphone','$saddress','$scity','$scountry')";
				mysqli_query($conn,$query2);

				$query3="INSERT INTO recevier(Delivery_ID,Name,Email,Phone,Address,City,Country) VALUES('$deliveryid','$rname','$remail','$rphone','$raddress','$rcity','$rcountry')";
				mysqli_query($conn,$query3);

				if($rcity==$scity){
					$query4="INSERT INTO request(Username,Delivery_ID,Sender_Address,Recevier_Address,City) VALUES('$username','$deliveryid','$saddress','$raddress','$rcity')";
					mysqli_query($conn,$query4);
					echo "Delivery Request send!";
				}
				else
				{
					echo "We didn't deliver from other city!<br>The service will start soon.";
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Delivery Request</title>
</head>
<body>
	<div class="container">
		<div class="form_body">
			<form action="delivery.php" method="POST">
					<h3>Parcel Information</h3>
					<label for='pt'>Parcel Type</label><br>
					<input type="text" placeholder="Enter type" name="type" id="pt" required><br>
					<label for="we">Parcel Weight</label><br>
					<input type="number" placeholder="Enter weight" name="weight" id="we" required><br>
					<label for="he">Parcel Height</label><br>
					<input type="number" placeholder="Enter height" name="height" id="he" required><br>
					<label for="wi">Parcel Width</label><br>
					<input type="number" placeholder="Enter width" name="width" id="wi" required><br>
					<label for="pr">Parcel Price</label><br>
					<input type="number" placeholder="Enter price" name="price" id="pr" required><br><br>

						<h3>Sender Information</h3>
						<label for="name">Full Name</label><br>
						<input type="name" placeholder="Enter Fullname" name="sname" id="name" required><br>
						<label for="mail">Email</label><br>
						<input type="email" placeholder="Enter Email" name="semail" id="mail" required><br>
						<label for="phone">Phone</label><br>
						<input type="phonenumber" placeholder="Enter Phone" name="sphone" id="phone" required><br>
						<label for="add">Address</label><br>
						<input type="address" placeholder="Enter Full Address" name="saddress" id="add" required><br>
						<label for="city">City</label><br>
						<input type="city" placeholder="Enter City" name="scity" id="city" required><br>
						<label for="cou">Country</label><br>
						<input type="country" placeholder="Enter Country" name="scountry" id="cou" required><br><br>

						<h3>Receiver Information</h3>
						<label for="name">Full Name</label><br>
						<input type="text" placeholder="Enter Fullname" name="rname" id="name" required><br>
						<label for="mail">Email</label><br>
						<input type="email" placeholder="Enter Email" name="remail" id="mail" required><br>
						<label for="phone">Phone</label><br>
						<input type="phonenumber" placeholder="Enter Phone" name="rphone" id="phone" required><br>
						<label for="add">Address</label><br>
						<input type="address" placeholder="Enter Full Address" name="raddress" id="add" required><br>
						<label for="city">City</label><br>
						<input type="city" placeholder="Enter City" name="rcity" id="city" required><br>
						<label for="cou">Country</label><br>
						<input type="country" placeholder="Enter Country" name="rcountry" id="cou" required><br><br>

				<button type="submit" name="deliver">Request For Delivery</button>		
			</form>
			<br><br><br><br><br><br>
		</div>
	</div>

</body>
</html>
<?php
// $submit=;

if(isset($_POST["submit"]))
{	
	$fname=strip_tags($_POST["fullname"]);
	$uname=strip_tags($_POST["username"]);
	$age=$_POST["age"];
	$email=$_POST["email"];
	$password=md5($_POST["password"]);
	$date=date("Y-m-d");
	if($password!=$rpassword)
	{
		echo "not match";
	}
	$connect=mysqli_connect("localhost","root");
	mysqli_select_db($connect,"railway_site");
	$query=mysqli_query($connect,"INSERT INTO user VALUES('$uname','$password','$fname','$age','$email','$date')");
	// header("Location: home.html");
	// exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>registration_page</title>
	<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
	<div class="container">
	<h1>Registration Form</h1>
	<form action="#" method="POST">
		<table cellspacing="25">
			<tr>
				<td>Name:</td>
				<td><input type="text" id="fullname" name="fullname" required></td>
			</tr>
			<tr>
				<td>Username:</td>
				<td><input type="text" id="username" name="username" required></td>
			</tr>
			<tr>
				<td>Age</td>
				<td><input type="number" id="age" name="age" min="13" max="100" required></td>
			</tr>
			<tr>
				<td>Email-id:</td>
				<td><input type="email" id="email" name="email"  required></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" id="password" name="password" required></td>
			</tr>
			<tr>
				<td>Confirm password</td>
				<td><input type="password" id="rpassword" name="rpassword" required></td>
			</tr>
			<tr>
				<td><input type="submit" id="submit" name="submit" value="submit"></td>
				<!-- <td><input type="reset" id="reset" name="reset"></td> -->
				<!-- <td><button id="submit" name="submit">Submit</button></td> -->
				<td><input type="reset" id="reset" name="reset"></td>
			</tr>
		</table>
	</form>
	</div>
	<script type="text/javascript" src="register.js"></script>
</body>
</html> 
<?php 

session_start();

if(isset($_POST['change'])) {
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	if($name) {
		$username = $_SESSION['username'];
		$trainno = $_SESSION['trainno'];
		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
		$query = mysqli_query($connect,"UPDATE user SET name='$name' WHERE username='$username'");

		$q = mysqli_query($connect,"UPDATE ticket SET name='$name' WHERE trainno='$trainno'");
	}

	if($age) {
		$username = $_SESSION['username'];
		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
		$query = mysqli_query($connect,"UPDATE user SET age='$age' WHERE username='$username'");
	}
	if($email) {
		$username = $_SESSION['username'];
		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
		$query = mysqli_query($connect,"UPDATE user SET email='$email' WHERE username='$username'");
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="./assests/css/template.css">
</head>
<body>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	    <li class="breadcrumb-item" aria-current="page"><a href="main_profile.php">Profile</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
	  </ol>
	</nav>

	<form action="personal.php" method="POST">
		<div ng-app ng-init="name=true; age=true; email=true;" class='box'>
			Update Name : <input type='checkbox' ng-model='name'><br>
			<p ng-if='name'>Enter New Name : <input type='text' name='name' placeholder='New Name'></p>

			Update Age : <input type='checkbox' ng-model='age'><br>
			<p ng-if='age'>Enter New Age : <input type='text' name='age' placeholder='New Age'></p>

			Update Email : <input type='checkbox' ng-model='email'><br>
			<p ng-if='email'>Enter New Email : <input type='text' name='email' placeholder='New Email'></p>

			<input type='submit' name='change' value='Change'>
		</div>
	</form>

</body>
</html>
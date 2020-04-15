<?php  

session_start();

if(isset($_POST['change'])) {
	if($_POST['bankname']) {
		$bank = $_POST['bankname'];
		$username = $_SESSION['username'];
		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
		$query = mysqli_query($connect,"UPDATE payment SET bank='$bank' WHERE username='$username'");
	}
	if($_POST['cardno']) {
		$cardno = $_POST['cardno'];
		$username = $_SESSION['username'];
		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
		$query = mysqli_query($connect,"UPDATE payment SET card-no='$cardno' WHERE username='$username'");
	}
	if($_POST['card']) {
		$card = $_POST['card'];
		$username = $_SESSION['username'];
		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
		$query = mysqli_query($connect,"UPDATE payment SET card='$card' WHERE username='$username'");
	}
	if($_POST['pin']) {
		$pin = $_POST['pin'];
		$username = $_SESSION['username'];
		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
		$query = mysqli_query($connect,"UPDATE payment SET pin='$pin' WHERE username='$username'");
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Payement Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' type='text/css' href='./assests/css/template.css'>
	<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js'></script>
</head>
<body>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page"><a href="update.php">Update</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Payment Update</li>
	  </ol>
	</nav>
	<form action="payment.php" method="POST">
		<div ng-app ng-init="bank=true; cardno=true; card=true; pin=true" class='box'>
			Update Bank Name : <input type='checkbox' ng-model='bank'><br>
			<p ng-if='bank'>Enter New Bank Name : <input type='text' name='bankname' placeholder='New Bank Name'></p>

			Update Card Number : <input type='checkbox' ng-model='cardno'><br>
			<p ng-if='cardno'>Enter New Card Number : <input type='text' name='cardno' placeholder='New Card Number'></p>

			Update Card Name : <input type='checkbox' ng-model='card'><br>
			<p ng-if='card'>Enter New Card Name : <input type='text' name='card' placeholder='New Card Name'></p>

			Update Pin : <input type='checkbox' ng-model='pin'><br>
			<p ng-if='pin'>Enter New Pin : <input type='text' name='pin' placeholder='New Pin'></p>

			<input type='submit' name='change' value='Change'>
		</div>
	</form>
</body>
</html>
<?php

session_start();

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$name = $_SESSION['name'];
$age = $_SESSION['age'];
$email = $_SESSION['email'];

echo " <!DOCTYPE html>
		<html>
		<head>
		<title>Profile</title>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
		<link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
		<link rel='stylesheet' type='text/css' href='./assests/css/profile.css'>
		<script type='text/javascript' src='profile.js'></script>
		</head>
		<body>
			<nav aria-label='breadcrumb'>
	  			<ol class='breadcrumb'>
	    			<li class='breadcrumb-item'><a href='index.html'>Home</a></li>
	    			<li class='breadcrumb-item active' aria-current='page'>Profile</li>
	  			</ol>
			</nav>

			<div class='card'>
	  			<img src='https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80' alt='$name' style='width:100%'>
		  		<p></p>
		  		<p class='title' contenteditable='true'>Name : $name</p>
		  		<p class='title' contenteditable='true'>Age : $age</p>
		  		<p class='title' contenteditable='true'>Username : $username</p>
		  		<p class='title' contenteditable='true'>E-mail : $email</p>
			</div>

			<div class='train'>
				<h1>Train Details</h1>
			</div>
			<div class='details'>
				<table cellpadding='300px' class='table table-striped'>
					<tr>
						<th>Train Number</th>
						<td>12842</td>
					</tr>
					<tr>
						<th>Train Name</th>
						<td>Rajdhani Express</td>
					</tr>
					<tr>
						<th>Source</th>
						<td contenteditable='true'>Ahmedabad</td>
					</tr>
					<tr>
						<th>Destination</th>
						<td contenteditable='true'>Mumbai</td>
					</tr>
					<tr>
						<th>Distance in kms</th>
						<td>1395</td>
					</tr>
					<tr>
						<th>Arrival Time (IST)</th>
						<td>20:00 (12 March 2020, Friday)</td>
					</tr>
					<tr>
						<th>Departure Time (IST)</th>
						<td>6:00 (13 March 2020, Saturday)</td>
					</tr>
					<tr>
						<th>Class</th>
						<td>3 Tier AC</td>
					</tr>
					<tr>
						<th>Fare in Rs.</th>
						<td>887</td>
					</tr>
					<tr>
						<th>Mode of Payment</th>
						<td contenteditable='true'>Online</td>
					</tr>
				</table>
				<button class='btn' id='edit'>Save</button>
			</div>
			<script type='text/javascript' src='./assests/js/profile.js'></script>
	</body>
	</html>
";

?>


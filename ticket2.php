<?php  

session_start();

if(isset($_POST['change'])) {
	if($_POST['source']) {
		$source = $_POST['source'];
		$trainno = $_SESSION['trainno'];
		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
		$query = mysqli_query($connect,"UPDATE ticket SET source='$source' WHERE trainnumber='$trainno'");
		$q = mysqli_query($connect,"UPDATE train SET source='$source' WHERE trainnumber='$trainno'");
	}
	if($_POST['destination']) {
		$destination = $_POST['destination'];
		$trainno = $_SESSION['trainno'];
		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
		$query = mysqli_query($connect,"UPDATE ticket SET destination='$destination' WHERE trainnumber='$trainno'");
		$q = mysqli_query($connect,"UPDATE train SET destination='$destination' WHERE trainnumber='$trainno'");
		
	}
	if($_POST['class']) {
		$class = $_POST['class'];
		$trainno = $_SESSION['trainno'];
		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
		$query = mysqli_query($connect,"UPDATE ticket SET class='$class' WHERE trainnumber='$trainno'");
		$q = mysqli_query($connect,"UPDATE class SET class='$class' WHERE trainnumber='$trainno'");

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ticket Update</title>
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
	    <li class="breadcrumb-item active" aria-current="page">Ticket Update</li>
	  </ol>
	</nav>
	<form action="ticket2.php" method="POST">
		<div ng-app ng-init="source=true; destination=true; class=true;" class='box'>
			Update Source : <input type='checkbox' ng-model='source'><br>
			<p ng-if='source'>Enter New Source : <input type='text' name='source' placeholder='New Source'></p>

			Update Destination : <input type='checkbox' ng-model='destination'><br>
			<p ng-if='destination'>Enter New Destination : <input type='text' name='destination' placeholder='New Destination'></p>

			Update Class : <input type='checkbox' ng-model='class'><br>
			<p ng-if='class'>Enter New Class : <input type='text' name='class' placeholder='New Class'></p>

			<input type='submit' name='change' value='Change'>
		</div>
	</form>
</body>
</html>
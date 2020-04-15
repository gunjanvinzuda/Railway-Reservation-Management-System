<?php  

session_start();
if($_SESSION['username']) {
	$username = $_SESSION['username'];

	$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
	mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
	$query = mysqli_query($connect,"SELECT * FROM user WHERE username='$username'");
	$numrows = mysqli_num_rows($query);

	if($numrows!=0) {
		while($row = mysqli_fetch_assoc($query)) {
			$password = $row["password"];
			$name = $row['name'];
			$age = $row['age'];
			$email = $row['email'];
		}
	}

	$trainnumber = $_SESSION['trainno'];
	$q = mysqli_query($connect,"SELECT * FROM train WHERE trainnumber='$trainnumber'");

	$rows = mysqli_num_rows($q);

	if($rows!=0) {
		while($row = mysqli_fetch_assoc($q)) {
			$trainname = $row["train-name"];
			$source = $row['source'];
			$destination = $row['destination'];
			$distance = $row['distance'];
			$arrival = $row['arrival'];
			$departure = $row['departure'];
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./assests/css/profile.css">
</head>
<body>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="index.html" style="color: black;">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Profile</li>
	  </ol>
	</nav>

	<div class="card">
	  <img src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="John" style="width:100%">
	  <p></p>
	  <b class="title">Name : </b><small class="title"><?php echo "$name" ?></small><br>
	  <b class="title">Age : </b><small class="title"><?php echo "$age" ?></small><br>
	  <b class="title">Email : </b><small class="title"><?php echo "$email" ?></small><br>
	  <b class="title">Username : </b><small class="title"><?php echo "$username" ?></small><br>
	  <p></p>
	  <button><a href="personal.php">Edit</a></button>
	</div>

	<div class="details">
		<h1>Train Details</h1>
		<table cellpadding="300px" class="table table-striped">
			<tr>
				<th>Train Number</th>
				<td><?php echo "$trainnumber" ?></td>
			</tr>
			<tr>
				<th>Train Name</th>
				<td><?php echo "$trainname" ?></td>
			</tr>
			<tr>
				<th>Source</th>
				<td><?php echo "$source" ?></td>
			</tr>
			<tr>
				<th>Destination</th>
				<td><?php echo "$destination" ?></td>
			</tr>
			<tr>
				<th>Distance in kms</th>
				<td><?php echo "$distance" ?></td>
			</tr>
			<tr>
				<th>Arrival Time (IST)</th>
				<td><?php echo "$arrival" ?></td>
			</tr>
			<tr>
				<th>Departure Time (IST)</th>
				<td><?php echo "$departure" ?></td>
			</tr>
		</table>
		<button><a href="update.php">Edit</a></button>
	</div>

</body>
</html>
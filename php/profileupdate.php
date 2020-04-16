<?php 

session_start();
// $username=$_SESSION['username'];
// $connect = mysqli_connect("localhost","root") or die("Couldn't connect");
// mysqli_select_db($connect,"railway_site") or die("Couldn't find database");
// $query = mysqli_query($connect,"SELECT * FROM user WHERE username='$username'");
// $numrows = mysqli_num_rows($query);
// if($numrows!=0)
// {
// 	while($row = mysqli_fetch_assoc($query))
// 	{
// 		$fullname=$row['name'];
// 		$
// 	}

// }

$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
mysqli_select_db($connect,"railway_site") or die("Couldn't find database");
$username = $_SESSION['username'];
$fullname=$_SESSION['fullname'];
$query = mysqli_query($connect,"SELECT * FROM user WHERE username='$username'");
$numrows = mysqli_num_rows($query);
if($numrows!=0)
{
	while($row = mysqli_fetch_assoc($query))
	{
		$dbname=$row['name'];
		$dbage=$row['age'];
		$dbemail=$row['email_id'];
	}
}

if(isset($_POST['change'])) {
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	if($name) {	
		$_SESSION['fullname']=$name;
		$query1 = mysqli_query($connect,"UPDATE user SET name='$name' WHERE username='$username'");
		header("Location: profile.php");
	}

	if($age) {
		$query = mysqli_query($connect,"UPDATE user SET age='$age' WHERE username='$username'");
		header("Location: profile.php");
	}
	if($email) {	
		$query = mysqli_query($connect,"UPDATE user SET email_id='$email' WHERE username='$username'");
		header("Location: profile.php");
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="./assets/css/temp.css">
</head>
<body>
<nav class="navbar navbar-default">
	    <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Indian Railways </a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="profile.php">Home</a></li>
	        <li class="active"><a href="updateprofile.php">Upadate Profile</a></li>
	      </ul>
	      <form class="navbar-form navbar-left">
	        
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="active"><a href="#"><?php echo"$fullname"?></i></a></li>
	        <li><a href="logout.php">Logout</i></a></li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  	</div>
	</nav>

	<form action="profileupdate.php" method="POST">
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
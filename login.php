<?php
// session_start();
if(isset($_POST["submit"]))
{
	$username = $_POST['username'];
	$password = md5(strip_tags($_POST['password']));
	if($username&&$password)
	{
		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway_site") or die("Couldn't find database");
		$query = mysqli_query($connect,"SELECT * FROM user WHERE username='$username'");
		$numrows = mysqli_num_rows($query);

		if($numrows!=0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbusername = $row["username"];
				$dbpassword = $row["password"];
			}

			if(($dbusername==$username)&&($dbpassword==$password))
			{
				$_SESSION['username'] = $dbusername;
				header("Location: homeeee.php");
			}
			else
				echo "<h4>You have entered wrong password or username</h4>";
		}
		else
			echo "<h4>You have entered wrong password or username</h4>";
	}
	else
		echo "<h4>Please enter username and password</h4>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>login_page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="templet.css">
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
	        <li><a href="">Home</a></li>
	        <li><a href="">Book Tickets</a></li>
	      </ul>
	      <form class="navbar-form navbar-left">
	        
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Register <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
	        <li class="active"><a href="#">Login <i class="fa fa-user" aria-hidden="true"></i></a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  	</div><!-- /.container-fluid -->
	</nav>
	<div class="box">
		<form action="login.php" method="POST">
			<table cellspacing="25">
				<tr>
					<td><h2>Log In</h2></td>
				</tr>
				<tr>
					<td><input type="text" name="username" placeholder="Username" autofocus></td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td><input type="password" name="password" placeholder="Password" autofocus></td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td><input type="submit" name="submit" value="Log In"></td>
				</tr>
				<tr><td><br></td></tr>
			</table>		
		</form>
	</div>
</body>
</html>
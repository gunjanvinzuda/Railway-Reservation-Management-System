<?php

if(isset($_POST["submit"]))
{	
	$fname=strip_tags($_POST["fullname"]);
	$uname=strip_tags($_POST["username"]);
	$age=$_POST["age"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$rpassword=$_POST["rpassword"];
	$date=date("Y-m-d");
	if(($password==$rpassword)&&(strlen($password)>5)&&(strlen($password)<21))
	{
		$password=md5($password);
		$connect=mysqli_connect("localhost","root");
		mysqli_select_db($connect,"railway_site");
		$query=mysqli_query($connect,"INSERT INTO user VALUES('$uname','$password','$fname','$age','$email','$date')");
		header("Location: home.html");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>registration_page</title>
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
	        <li class="active"><a href="#">Register <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
	        <li><a href="#">Login <i class="fa fa-user" aria-hidden="true"></i></a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  	</div><!-- /.container-fluid -->
	</nav>
	<div class="box">
	<h2>Registration Form</h2>
	<form action="#" method="POST">
		<table cellspacing="21" >
			<tr>
				<td><input type="text" id="fullname" name="fullname" placeholder="Name" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="text" id="username" name="username" placeholder="Username" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="number" id="age" name="age" min="13" max="100" placeholder="Age" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="email" id="email" name="email"  placeholder="Email-id: abc@def.xyz" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="password" id="password" name="password" placeholder="Password" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="password" id="rpassword" name="rpassword" placeholder="Confirm Password" autofocus required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="submit" id="submit" name="submit" autofocus value="submit"><input type="reset" id="reset" name="reset"></td>
			</tr>
			<tr><td><br></td></tr>
		</table>
	</form>
	</div>
	<script type="text/javascript" src="register.js"></script>
</body>
</html> 
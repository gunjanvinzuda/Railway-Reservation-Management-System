<?php
session_start();
$recieptno=rand(100000,999999);
$username=$_SESSION['username'];
$fullname=$_SESSION['fullname'];
if(isset($_POST['submit']))
{
	if(isset($_POST['cardno'])&&isset($_POST['pin'])&&isset($_POST['bank'])&&isset($_POST['card_type']))
	{
		$card_type=$_POST['card_type'];
		if($card_type!='none')
		{
			$cardno=$_POST['cardno'];
			$pin=$_POST['pin'];
			$bank=$_POST['bank'];
			$card_type=$_POST['card_type'];
			$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
			mysqli_select_db($connect,"railway_site") or die("Couldn't find database");
			$query=mysqli_query($connect,"INSERT INTO payment VALUES('$recieptno','$username','$cardno','$pin','$bank','$card_type')") or die("nope");
			header('Location: final.php');
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
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
	        <li><a href="">Home</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="active"><a href="#"><?php echo"$fullname"?></i></a></li>
	        <li><a href="logout.php">Logout</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  	</div>
	</nav>
	<div class="head">
		<h2>Online Payment</h2>
	</div>
	<div class="body">
	<form action="payment.php" method='POST'>
		<table>
			<tr>
				<td><input type="text" name="recieptno" value="<?php echo 'Reciept No : '.$recieptno;?>" disabled></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="text" name="username" value="<?php echo $username;?>" disabled></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="text" id="cardno" name="cardno" placeholder='Card no.'></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="text" id="pin" name="pin" placeholder='Pin'></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="text" id="bank" name="bank" placeholder='Name of Bank'></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>
					<select name='card_type' id="card_type">
						<option value='none'>Card type</option>
						<option>Credit card</option>
						<option>Debit card</option>
						<option>Chrage card</option>
						<option>ATM card</option>
					</select>
				</td>
			</tr>
			<tr><td><br></td></tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="submit" name="submit" id="submit" value='Done'></td>
			</tr>
		</table>
	</form>
	</div>
	<script type="text/javascript" src="./assets/js/payment.js"></script>
</body>
</html>
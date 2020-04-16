<?php  

session_start();
$fullname=$_SESSION['fullname'];
$source='';
$destination='';
$doj='';
$fare='';
$type='';
$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
mysqli_select_db($connect,"railway_site") or die("Couldn't find database");
if(isset($_POST['go']))
{
	$pnr=$_POST['pnr'];
	$_SESSION['pnr']=$pnr;
	$query = mysqli_query($connect,"SELECT * FROM ticket WHERE pnr='$pnr'");
	$numrows = mysqli_num_rows($query);
	if($numrows!=0)
	{
		while($row = mysqli_fetch_assoc($query))
		{
			$pnr=$row['pnr'];
			$source=$row['source'];
			$destination=$row['destination'];
			$doj=$row['doj'];
			$type=$row['class'];
			$fare=$row['fare'];
		}
	}
	
}
if(isset($_POST['submit'])) 
{
	$pnr=$_SESSION['pnr'];
	$_SESSION['pnr']=null;
	$query1 = mysqli_query($connect,"DELETE FROM ticket WHERE pnr='$pnr'");
	header("Location: profile.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Cancel Ticket</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' type='text/css' href='./assets/css/temp.css'>
	<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js'></script>
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
	        <li class="active"><a href="cancleticket.php">Cancel Ticket</a></li>
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
	<div class="head">
		<h2>Update Ticket</h2>
	</div>
	<div class="body">
	<form action="cancleticket.php" method="POST">
		<table>
			<tr>
				<td><input type="text" name="pnr" placeholder="Enter the PNR"></td>
				<td><input type="submit" name="go" value="go"></td>
			</tr>
			<tr><td><br></td></tr>
		</table>

		<table>
				<tr>
					<td>Source:</td>
					<td><input type="text" name="source" value="<?php echo $source;?>" disabled></td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td>Destination:</td>
					<td><input type="text" name="destination" value="<?php echo $destination;?>" disabled></td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td>Class:</td>
					<td><input type="text" name="type" value="<?php echo $type;?>" disabled></td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td>Fare:</td>
					<td><input type="text" name="fare" value="<?php echo $fare;?>" disabled></td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td>Date of Journey</td>
					<td><input type="text" name="doj" id="doj" value="<?php echo $doj;?>" disabled></td>
				</tr>
				<tr><td><br></td></tr>
				<tr><td><br></td></tr>
				<tr>
					<td><input type="submit" name="submit" id="submit" value="Cancel"></td>
				</tr>
				<tr><td><br></td></tr>
			</table>
		</form>
		</div>
	</body>
</html>

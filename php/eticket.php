<?php
session_start();
$fullname=$_SESSION['fullname'];
$username=$_SESSION['username'];
$source=$_SESSION["source"];
$destination=$_SESSION["destination"];
$type=$_SESSION["type"];
$doj=$_SESSION["doj"];
$button=$_SESSION['button'];
$pnrold=$_SESSION['pnr'];

$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
mysqli_select_db($connect,"railway_site") or die("Couldn't find database");
$query = mysqli_query($connect,"SELECT * FROM train WHERE source='$source' AND destination='$destination'");
$numrows = mysqli_num_rows($query);
$fare='';
$class='';
$query2='';
if($numrows!=0)
{
	while($row = mysqli_fetch_assoc($query))
	{
		$check=true;
		$train_no=$row['train_no'];
		$arrival=$row['arrival_time'];
		$departure=$row['departure_time'];
		$distance=$row['distance'];
		if($type=='Type')
		{
			$query2 = mysqli_query($connect,"SELECT * FROM class WHERE train_no='$train_no'");	
		}
		else
		{
			$query2 = mysqli_query($connect,"SELECT * FROM class WHERE train_no='$train_no' AND class_type='$type'");
		}
		while($row2 = mysqli_fetch_assoc($query2))
		{
			$fare=$row2['fare'];
			$class=$row2['class_type'];
			if($numrows==$button)
			{
				$check=false;
				break;
			}
			else
				$numrows=$numrows-1;
		}
		if(!$check)
		{
			break;
		}
		
	}
}

if($pnrold)
{
	$pnr=$pnrold;
	$seatno=rand(1,30);
	$characters='ABCDEFG';
	$seatch=$characters[rand(0,6)];
	if(isset($_POST['submit']))
	{
		$query1 = mysqli_query($connect,"UPDATE ticket SET fare='$fare' WHERE pnr='$pnrold'");
		$query2 = mysqli_query($connect,"UPDATE ticket SET arrival_time='$arrival' WHERE pnr='$pnrold'");
		$query3 = mysqli_query($connect,"UPDATE ticket SET departure_time='$departure' WHERE pnr='$pnrold'");
		$query4 = mysqli_query($connect,"UPDATE ticket SET distance='$distance' WHERE pnr='$pnrold'");
		$query5 = mysqli_query($connect,"UPDATE ticket SET destination='$destination' WHERE pnr='$pnrold'");
		$query6 = mysqli_query($connect,"UPDATE ticket SET source='$source' WHERE pnr='$pnrold'");
		$query7 = mysqli_query($connect,"UPDATE ticket SET class='$class' WHERE pnr='$pnrold'");
		$query8 = mysqli_query($connect,"UPDATE ticket SET doj='$doj' WHERE pnr='$pnrold'");
		header("Location: payment.php");
	}
}
else
{
	$pnrhead=rand(100,999);
	$pnrtail=rand(1000000,9999999);
	$pnr=strval($pnrhead)."-".strval($pnrtail);
	$seatno=rand(1,30);
	$characters='ABCDEFG';
	$seatch=$characters[rand(0,6)];

	if(isset($_POST['submit']))
	{
		$query3 =mysqli_query($connect,"INSERT INTO ticket VALUES('$pnrhead-$pnrtail','$fullname','$train_no','$doj','$seatno-$seatch','$class','$source','$destination','$distance','$fare','$arrival','$departure')");
		header("Location: payment.php");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Ticket</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="./assets/css/temp2.css">
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
	      <form class="navbar-form navbar-left">
	        
	      </form>
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
		<h2>E-Ticket</h2>
	</div>
	<div class="body">
	<form action='eticket.php' method='POST'>
		<table>
			<tr>
				<td>Passenger Name:</td>
				<td><input type="text" disabled value="<?php echo $fullname;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>PNR</td>
				<td><input type="text" disabled value="<?php echo $pnr;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Train no.</td>
				<td><input type="text" disabled value="<?php echo $train_no;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Date Of Journey</td>
				<td><input type="text" disabled value="<?php echo $doj;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Seat no.</td>
				<td><input type="text" disabled value="<?php echo $seatno.'-'.$seatch;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Class</td>
				<td><input type="text" disabled value="<?php echo $class;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>				
				<td>Source</td>
				<td><input type="text" disabled value="<?php echo $source;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Destination</td>
				<td><input type="text" disabled value="<?php echo $destination;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Distance</td>
				<td><input type="text" disabled value="<?php echo $distance?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Fare</td>
				<td><input type="text" disabled value="<?php echo $fare;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Arrival Time</td> 
				<td><input type="text" disabled value="<?php echo $arrival;?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Departure:</td>
				<td><input type="text" disabled value="<?php echo$departure?>"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr><td><br></td></tr>
			<tr>
				<td><input type="submit" name="submit" value="Proceed for payment"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>

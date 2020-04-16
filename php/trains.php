<?php
session_start();

$fullname=$_SESSION['fullname'];
$source=$_SESSION['source'];
$destination=$_SESSION['destination'];
$type=$_SESSION['type'];
$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
mysqli_select_db($connect,"railway_site") or die("Couldn't find database");
$query = mysqli_query($connect,"SELECT * FROM train WHERE source='$source' AND destination='$destination'");
$numrows = mysqli_num_rows($query);

if(isset($_POST['button']))
{
	$_SESSION['button']=$_POST['button'];
	header("Location: eticket.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Trains</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="./assets/css/temp3.css">
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
		<form action="trains.php" method="POST">
			<table cellspacing="29">
				<tr>
					<td><input type="text" name="" class="head" value="Train"></td>
					<td><input type="text" name="" class="head" value="Arrival Time"></td>
					<td><input type="text" name="" class="head" value="Departure Time"></td>
					<td><input type="text" name="" class='head' value='Class'></td>
					<td><input type="text" name="" class="head" value="Fare(Rs.)"></td>
					<td></td>
					<tr><td><br></td></tr>
				</tr>
					<?php
					if($numrows!=0)
					{
						while($row = mysqli_fetch_assoc($query))
						{
							$src=$row['source'];
							$dstn=$row['destination'];
							$arrival=$row['arrival_time'];
							$departure=$row['departure_time'];
							$train_no=$row['train_no'];
							$class='';
							$query2='';
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
								echo "
								<tr>
									<td><input type='text' name='' value='$src to $dstn'></td>
									<td><input type='text' name='' value='$arrival'></td>
									<td><input type='text' name='' value='$departure'></td>	
									<td><input type='text' name='' value='$class'></td>
									<td><input type='text' name='' value='$fare'></td>
									<td><button name='button' id='$numrows' value='$numrows'>Select</button></td>
								<tr>
								<tr><td><br></td></tr>
								";
								$numrows=$numrows-1;
							}
							
						}
					}
					?>
			</table>
		</form>
</body>
</html>
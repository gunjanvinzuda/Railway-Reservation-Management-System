<?php  

session_start();
$fullname=$_SESSION['fullname'];
$source='';
$destination='';
$doj='';
$type='';
if(isset($_POST['go']))
{
	$pnr=$_POST['pnr'];
	$_SESSION['pnr']=$pnr;
	$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
	mysqli_select_db($connect,"railway_site") or die("Couldn't find database");
	$query = mysqli_query($connect,"SELECT * FROM ticket WHERE pnr='$pnr'");
	$numrows = mysqli_num_rows($query);
	if($numrows!=0)
	{
		while($row = mysqli_fetch_assoc($query))
		{
			$source=$row['source'];
			$destination=$row['destination'];
			$doj=$row['doj'];
			$type=$row['class'];
		}
	}
}
if(isset($_POST['submit'])) 
{
	$source=$_POST['source'];
	$destination=$_POST['destination'];
	$doj=$_POST['doj'];
	$type=$_POST['type'];
	$_SESSION['source']=$source;
	$_SESSION['destination']=$destination;
	$_SESSION['doj']=$doj;
	header("Location: trains.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Ticket</title>
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
	        <li class="active"><a href="updateticket.php">Change Ticket</a></li>
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
	<form action="updateticket.php" method="POST">
		<table>
			<tr>
				<td><input type="text" name="pnr" placeholder="Enter the PNR"></td>
				<td><input type="submit" name="go" value="go"></td>
			</tr>
			<tr><td><br></td></tr>
		</table>

		<table>
				<tr>
					<td>
						<select autofocus id="source" name="source">
							<option ><?php echo $source;?></option>
							<option>Ahmedabad</option><option>Amreli</option><option>Anand</option><option>Arvali</option><option>Banaskantha</option><option>Bharuch</option><option>Bhavnagar</option><option>Bharuch</option><option>Botad</option><option>Chhota Udaipur</option><option>Dahod</option><option>Dang</option><option>Devbhoomi Dwarka</option><option>Gandhinagar</option><option>Gir Somnath</option><option>Jamnagar</option><option>Junagadh</option><option>Kutchh</option><option>Kheda</option><option>Mahsagar</option><option>Mehsana</option><option>Morbi</option><option>Narmda</option><option>Navsari</option><option>Panchmahal</option><option>Patan</option><option>Porbandar</option><option>Rajkot</option><option>Sabarkantha</option><option>Surat</option><option>Surendranagar</option><option>Tapi</option><option>Vadodara</option><option>Valsad</option>
						</select>
					</td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td>
						<select autofocus id="destination" name="destination">
							<option><?php echo $destination;?></option>
							<option>Ahmedabad</option><option>Amreli</option><option>Anand</option><option>Arvali</option><option>Banaskantha</option><option>Bharuch</option><option>Bhavnagar</option><option>Bharuch</option><option>Botad</option><option>Chhota Udaipur</option><option>Dahod</option><option>Dang</option><option>Devbhoomi Dwarka</option><option>Gandhinagar</option><option>Gir Somnath</option><option>Jamnagar</option><option>Junagadh</option><option>Kutchh</option><option>Kheda</option><option>Mahsagar</option><option>Mehsana</option><option>Morbi</option><option>Narmda</option><option>Navsari</option><option>Panchmahal</option><option>Patan</option><option>Porbandar</option><option>Rajkot</option><option>Sabarkantha</option><option>Surat</option><option>Surendranagar</option><option>Tapi</option><option>Vadodara</option><option>Valsad</option>
						</select>
					</td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td>
						<select autofocus id="type" name="type">
							<option><?php echo $type;?></option>
							<option value="Type">All Type</option>
							<option>AC Sleeper</option>
							<option>AC Seater</option>
							<option>Non AC Sleeper</option>
							<option>Non AC Seater</option>
						</select>
					</td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td><input type="text" name="doj" id="doj" placeholder="Date Of Journey"onfocus="(this.type='date')"onblur="(this.type='text')" value="<?php echo $doj;?>"></td>
				</tr>
				<tr><td><br></td></tr>
				<tr><td><br></td></tr>
				<tr>
					<td><input type="submit" name="submit" id="submit" value="Update"></td>
				</tr>
				<tr><td><br></td></tr>
			</table>
		</form>
		</div>
	</body>
</html>
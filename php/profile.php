<?php

session_start();

$username = $_SESSION['username'];
$fullname=$_SESSION['fullname'];

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  		<link rel="stylesheet" type="text/css" href="./assets/css/app.css">
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
	        <li><a href="profileupdate.php">Upadate Profile</a></li>
	        <li><a href="ticket_booking.php">Book Tickets</a></li>
	        <li><a href="updateticket.php">Change Ticket</a></li>
	        <li><a href="cancleticket.php">Cancel Ticket</a></li>
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

	<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div id="content">
          <h1>Indian Railways</h1>
          <h3>Journeys as great as the destinations</h3>
          <hr>
          <p></p>
          <p></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

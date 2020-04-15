<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
</head>
<body>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="./assests/css/template.css">
</body>
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Update</li>
	  </ol>
	</nav>
	<div class="box">
		<form action="edit.php" method="POST">
			<table cellspacing="25">
				<tr>
					<td><h2>Update Here</h2></td>
				</tr>
				<tr>
					<td><input type="text" name="username" placeholder="Username" autofocus></td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td><input type="text" name="trainno" placeholder="Train Number" autofocus></td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td><input type="submit" name="updateticket" value="Update Ticket"></td>
					<td><input type="submit" name="updatepayment" value="Update Payment"></td>
				</tr>
				<tr><td><br></td></tr>
			</table>		
		</form>
	</div>
</html>
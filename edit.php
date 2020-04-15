<?php  

session_start();

if(isset($_POST['updatepayment'])) {
	$username = $_POST['username'];

	if($username) {

		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
		$query = mysqli_query($connect,"SELECT * FROM payment WHERE username='$username'");
		$numrows = mysqli_num_rows($query);
		if($numrows!=0) {
			$_SESSION['username'] = $username;
 			header("Location: payment.php");
		}
		else echo "<h4>Username not found!</h4>";
	}
	else echo "<h4>Please Enter Username!</h4>";
}

else if(isset($_POST['updateticket'])) {
	$trainno = $_POST['trainno'];
	
	if($trainno) {

		$connect = mysqli_connect("localhost","root") or die("Couldn't connect");
		mysqli_select_db($connect,"railway-reservation") or die("Couldn't find database");
		$query = mysqli_query($connect,"SELECT * FROM ticket WHERE trainnumber='$trainno'");
		$numrows = mysqli_num_rows($query);
		if($numrows!=0) {
			$_SESSION['trainno'] = $trainno;
 			header("Location: ticket2.php");
		}
		else echo "<h4>Train Number not found!</h4>";
	}
	else echo "<h4>Please Enter Train Number!</h4>";

}

?>
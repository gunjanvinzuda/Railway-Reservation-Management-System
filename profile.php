<?php 

session_start();

$user = $_SESSION['username'];

if($user) {
	header("Location: profile.html");
}
else {
	header("Location: login.php");
}

 ?>
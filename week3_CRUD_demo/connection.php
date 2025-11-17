<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'libraryBorrowingTracker';
	$conn = mysqli_connect($host, $user, $pass, $db);
	if($conn){
		//echo "connected";
	}

	mysqli_select_db($conn, $db);
?>
<?php

	$dbhost = 'localhost';
	$dbuser = 'spedasse_spedassetsmanage';
	$dbpass = 'zameer@123';
	$dbname = 'spedasse_sped';

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	//$connection = mysqli_connect('localhost', 'spedasse_spedassetsmanage', 'DPSSampath@1989', 'spedasse_sped');

// checking the connection
	if (mysqli_connect_errno()) {
		die ('Database connection faild' . mysqli_connect_error());
	} else {
		//echo "Connection Succesful...";
	}

?>
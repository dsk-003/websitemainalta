<?php
	//include("../connect.php");
	$servername = "198.71.227.84:3306";
	$username = "ph19284029361_cu";
	$password = "ph19284029361_cu";
	$db = "ph19284029361_contact";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$db);

	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully";

?>
<?php
############################################################################
# Please
# (1) change the file name from dbconn.inc.example.php to dbconn.inc.php.
# (2) edit the code below to provide your user name, password, and database name
############################################################################

function dbConnect(){
	$host = "localhost"; // for uta.cloud server, "localhost" is the host name.  Do not edit.
	$user = "bryandav_1"; // put your own user name here.
	$pwd = "6yhnmju7^YHNMJU&"; // put your own database password here
	$database = "bryandav_ctec4350"; // put your database name here
	$port = "3306"; // server-specific.  For uta.cloud, the port number is 3306 (the default port)

	// initiate a new mysqli object to connect to the Database.  Store the mysqli object in a variable $conn.
	$conn = new mysqli($host, $user, $pwd, $database, $port, $char) or die("could not connect to server");

	if (!mysqli_set_charset($conn, "utf8")) {
		printf("Error loading character set utf8: %s\n", mysqli_error($conn));
		exit();
	} else {
		printf("Current character set: %s\n", mysqli_character_set_name($conn));
	}

	// return $conn to the fucntion call
	return $conn;}
?>

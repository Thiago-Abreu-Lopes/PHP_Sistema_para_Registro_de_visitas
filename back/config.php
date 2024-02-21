<?php
$HOST = '';
$USER = '';
$PASS = '';
$DBASE = '';	
$conn = mysqli_connect($HOST,$USER,$PASS,$DBASE);
if ($conn->connect_error) {		
	die("Connection failed: " . $conn->connect_error);
}
#echo "Connected successfully";

?>

<?php
function openConnection($username, $password){
 	$servername = "localhost";

	// Create connection
	$conn = new mysqli($servername, $username, $password,"empresa_de_transporte");

	// Check connection
	if ($conn->connect_error) {
  	die("Connection failed: " . $conn->connect_error);
  	return null;
	}
	return $conn;
 }

 function closeConnection($connec){
 	$connec->close();
 }

 function executeQuery($sqlQuery){
 	$conn = openConnection("test", "test");
	$result = $conn->query($sqlQuery);

	if (!$result) {
	trigger_error('Invalid query: ' . $conn->error);
	trigger_error('Query: '.$sqlQuery);
	}

	return $result;
	closeConnection($conn);
 }
?>
<?php
function openConnection($username, $password){
 	$servername = "localhost";

	// Create connection
	$conn = new mysqli($servername, $username, $password,"empresa_de_transporte");
	//mysql_select_db("mydb", $link);

	// Check connection
	if ($conn->connect_error) {
  	die("Connection failed: " . $conn->connect_error);
  	return null;
	}
	//echo "Connected successfully";
	return $conn;
 }

 function closeConnection($connec){
 	$connec->close();
 	//echo "Disconnected successfully";
 }

 function executeQuery($sqlQuery){
 	$conn = openConnection("test", "test");

 	//$sql = "SELECT dia_id, descripcion FROM empresa_de_transporte.dia";
	$result = $conn->query($sqlQuery);

	if (!$result) {
	trigger_error('Invalid query: ' . $conn->error);
	trigger_error('Query: '.$sqlQuery);
	}

	return $result;
	/*
	if ($result->num_rows > 0) {
  		// output data of each row
  		while($row = $result->fetch_assoc()) {
    	echo "dia_id: " . $row["dia_id"]. " - descripcion: " . $row["descripcion"]."<br>";
  		}
	} else {
  		echo "0 results";
	}
	*/
	closeConnection($conn);
 }
?>
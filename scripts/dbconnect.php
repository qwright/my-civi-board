<?php
function dbConnect(){
	//$servername = "localhost";
	$username = "root";
	$password = "root"; //different
	//$dbName = "Civi";
	$dbInfo = "mysql:host=localhost;dbname=Civi";

	//create conn
	$pdo = new PDO($dbInfo, $username, $password);
	//echo "Connected to DB";	
	return $pdo;
}

function closeConnection($pdo){
	$pdo=null;
	//echo "Disconnected from DB";
}
?>


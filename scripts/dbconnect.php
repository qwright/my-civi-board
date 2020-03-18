<?php
$servername = "localhost";
$username = "root";
$password = "ilovemocha";
$dbName = "Civi";

//create conn
$conn = new mysqli($servername, $username, $password, $dbName);

//check
if ($conn->connect_error){
	die("Connection failed: " .$conn->connect_error);
}else{
echo "Connection successful";
}
?>


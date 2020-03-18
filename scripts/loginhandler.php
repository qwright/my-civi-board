<?php
	include("dbconnect.php");

if($_POST["login"]){
	$sql = "SELECT username, pass FROM users WHERE username='".$_POST["user"]."' and pass='".$_POST["pass"]."'";
	$result = $conn->query($sql);
	if($result->num_rows == 1){
		session_start();
		$_SESSION["loggedin"] = true;
		$_SESSION["username"] = $_POST["user"];
		header("Location: ../index.html");
	}
		else{
			header("Location: ../signin.html");
		}	
	}

if($_POST["signup"]){

}
?>


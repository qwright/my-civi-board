<?php
session_start();
if($_SESSION["username"]!="admin"){
	header("Location: index.php");
} 
?>

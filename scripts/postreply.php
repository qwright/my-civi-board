<?php
include("dbconnect.php");
try{
	$pdo = dbConnect();
	session_start();
	$insert = "INSERT INTO replies (replymsg, image, postNo, userNo) VALUES (?, null, ?, ?)";
	$stmt = $pdo->prepare($insert);
	$stmt->bindValue(1, $_POST["replymsg"]);
	$stmt->bindValue(2, $_GET["p"]);
	$stmt->bindValue(3, $_SESSION["userNo"]);
	$stmt->execute();
	closeConnection($pdo);
	header("Location: ../thread.php?p=".$_GET["p"]."");
}
catch(PDOException $e){
	die($e->getMessage());
}
?>

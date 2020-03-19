<?php
include("database.php");
session_start();
try{
	$pdo = dbConnect();
	$insert = "INSERT INTO posts (title, msg, userNo, img, time) VALUES (?,?,?,null,NOW())";
	$stmt = $pdo->prepare($insert);
	$stmt->bindValue(1, $_POST["title"]);
	$stmt->bindValue(2, $_POST["postmsg"]);
	$stmt->bindValue(3, $_SESSION["userNo"]);
	closeConnection($pdo);
	header("Location: ../civiboard.php");
}
catch(PDOException $e){
	die($e->getMessage());
}
?>

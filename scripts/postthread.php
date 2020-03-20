<?php
include("dbconnect.php");
try{
	$pdo = dbConnect();
	session_start();
	$insert = "INSERT INTO posts (msg, img, userNo, title) VALUES (?,null,?,?)";
	$stmt = $pdo->prepare($insert);
	$stmt->bindValue(1, $_POST["postmsg"]);
	$stmt->bindValue(2, $_SESSION["userNo"]);
	$stmt->bindValue(3, $_POST["title"]);
	$stmt->execute();
	closeConnection($pdo);
	header("Location: ../civiboard.php");
}
catch(PDOException $e){
	die($e->getMessage());
}
?>

<?php
include("dbconnect.php");
$pdo = dbConnect();
session_start();
//handle file upload
$insert = "INSERT INTO posts (msg, img, userNo, title) VALUES (?,?,?,?)";
$stmt = $pdo->prepare($insert);
$file = file_get_contents($_FILES["file"]["tmp_name"]);
$stmt->bindParam(1, $_POST["postmsg"]);
$stmt->bindParam(2, $file);	
$stmt->bindParam(3, $_SESSION["userNo"]);
$stmt->bindParam(4, $_POST["title"]);
$stmt->execute();
closeConnection($pdo);
header("Location: ../civiboard.php");
?>

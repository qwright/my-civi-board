<?php
include("dbconnect.php");
closeConnection($pdo);
$pdo=dbConnect();
$removeVis = "UPDATE replies SET visibility=0 WHERE replyNo=?";
$stmt = $pdo->prepare($removeVis);
$stmt->execute([$_GET["reply"]]);
closeConnection($pdo);
header("Location: ".$_SERVER["HTTP_REFERER"]);
?>

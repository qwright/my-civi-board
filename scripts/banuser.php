<?php
include_once("dbconnect.php");
$pdo=dbConnect();
$sql = ($_GET["s"]==1) ? "UPDATE users SET status=0 WHERE userNo=?":"UPDATE users SET status=1 WHERE userNo=?";
echo $sql;
$update = $pdo->prepare($sql);
$update->bindValue(1, $_GET["u"]);
$update->execute();
closeConnection($pdo);
header("Location: ../admin.php");
?>

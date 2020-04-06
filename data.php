<?php
//header('Content-Type: application/json');

require_once('scripts/dbconnect.php');
$pdo=dbConnect();
$sql = "SELECT users.username, COUNT(posts.postNo) as Activity FROM users JOIN posts ON users.userNo=posts.userNo group by users.username";
$result = $pdo ->query($sql);
$postdata = array();
$postlabels = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $postdata[] = (int)$row['Activity'];
    $postlabels[] = $row['username'];
}

$sql2 = "SELECT users.username, COUNT(replies.replyNo) as comActivity FROM users JOIN replies ON users.userNo=replies.userNo group by users.username";
$result2 = $pdo ->query($sql2);
$comdata = array();
$comlabels = array();
while($row = $result2 ->fetch(PDO::FETCH_ASSOC)){
    $comdata[] = (int)$row['comActivity'];
    $comlabels[] = $row['username'];
}
closeConnection($pdo)
?>
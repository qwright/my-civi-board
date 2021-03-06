<!DOCTYPE html>
<html lang="en" id="board">
  <head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href ="styles/reset.css"/>
	<link rel="stylesheet" href="styles/styles.css" />
	
		<script src="scripts/script.js"></script>
	<title>MyCiviBoard</title>
	<link rel="icon" type ="image/ico" href = "images/logo.png"/>
  </head>
  <body>
    <header>
    <div class='logo'>
			<a href="index.php"><img src ="images/civiboard_logoV1.png" alt ="logo" width="250px"></a>
    </div>
		
		<?php
		include("scripts/header.php");
		?>
		</div>
		</header>
		<div id="filter-container">
				<a href="civiboard.php">[Catalog]</a>
				<form action="civiboard.php" method="GET" name="filter-threads" id="filter">
					<input type="text" name="search" placeholder="search threads...">
				</form>
			</div>
		<div class="container">
		<div class="profile-spacer" id="ps-1">
		</div>
			<div class="board-content">
					  <div id="post">
							<button type="button" class="btn" id="post-btn">[Post a Thread]</button>
				<div id="post-form" class="post-hid">
				<form action="scripts/postthread.php" method="POST" enctype="multipart/form-data" name="submit-thread" id="post-thread">
					<input type="text" name="title" placeholder="title"></br>
					<input type="file" name="file" id="file"></br>
					<textarea rows="4" cols="36" name="postmsg" form="post-thread">Enter text here...</textarea>
					<br>
					<input type="submit" value="Submit" name="submit_thread">
				</form>
				
				</div>
			 	</div>
			<div class="thread-container">
			<?php
			include("scripts/dbconnect.php");
			try{
				$pdo = dbConnect();
				$hotseek = $pdo->prepare("SELECT p.postNo, COUNT(r.time) from posts p JOIN users u ON p.userNo = u.userNo JOIN replies r ON p.postNo = r.postNo WHERE r.visibility=1 AND r.time >= now() - INTERVAL 1 DAY GROUP BY p.postNo HAVING COUNT(r.time) >= 3 ORDER BY p.postNo");
				$hotseek->execute();
				$hotthreads = $hotseek->fetchAll(PDO::FETCH_COLUMN,0);
				if(empty($_GET["search"])){
				$seek = "SELECT p.postNo, p.msg, p.img, p.title, p.time, u.status, MAX(r.time) FROM posts p LEFT OUTER JOIN users u ON p.userNo = u.userNo LEFT OUTER JOIN replies r on p.postNo = r.postNo WHERE u.status=1 GROUP BY p.postNo ORDER BY MAX(r.time) desc LIMIT 10";
				$stmt = $pdo->prepare($seek);
				$stmt->execute();
				while($row = $stmt->fetch()){
					if($row["status"]!=1){
						continue;
					}
					echo "<div id=\"thread-".$row["postNo"]."\">";
					if(in_array($row["postNo"], $hotthreads)){
						echo "<div class=\"hot-thread\"><img src=\"images/hot.png\"/></div>";
					}
					echo "<a href=\"thread.php?p=".$row["postNo"]."\">";
					if($row["img"]!=null){
						$image = $row["img"];
						echo "<img src=\"data:image/jpeg;base64,".base64_encode($image)."\"/></a>";
					}else{
						echo "<img src=\"images/city-park.jpg\"></a>";
					}
					echo "<div class=\"preview\">";
					echo "<span>".$row["time"]."</span><br/>";
					echo "<b>".$row["title"]."</b><br/>";
					echo $row["msg"];
					echo "</div></div>";
						}
					}
					else{
					$seek = "SELECT posts.postNo, posts.msg, posts.img, posts.title, posts.time, users.status FROM posts JOIN users ON posts.userNo = users.userNo WHERE users.status=1 AND posts.title LIKE '%".$_GET["search"]."%'ORDER BY postNo DESC LIMIT 10";
					$stmt = $pdo->prepare($seek);
					$stmt->execute();
					if($stmt->rowCount()==0){
					echo "<span>No threads to show!</span><br>";
					echo "<img src=\"images/empty-search.jpg\"/>";
					}
					while($row = $stmt->fetch()){
					if($row["status"]!=1){
						continue;
					}
					echo "<div id=\"thread-".$row["postNo"]."\">";
					echo "<a href=\"thread.php?p=".$row["postNo"]."\">";
					if($row["img"]!=null){
						$image = $row["img"];
						echo "<img src=\"data:image/jpeg;base64,".base64_encode($image)."\"/></a>";
					}else{
						echo "<img src=\"images/city-park.jpg\"></a>";
					}
					echo "<div class=\"preview\">";
					echo "<span>".$row["time"]."</span>";
					echo "<b>".$row["title"]."</b><br/>";
					echo "<div class='msg'>".$row["msg"]."</div><br/>";
					echo "</div></div>";
					}	
				}
			closeConnection($pdo);
				}catch(PDOException $e){
					echo "No threads to show!";
					echo "<img src=\"images/empty-search.jpg\"/>";
			}
			?>
		  </div>
      </div>
	  <div class="profile-spacer" id="ps-2">
	  </div> 
    </div>
	<footer>
		<div class = "footer-content">
			<p>Contact Us</p>
			<hr class ="footer">
			<p>&copy; Paige Latimer and Quinn Wright</p>
			</div>
	</footer>
  </body>
</html>

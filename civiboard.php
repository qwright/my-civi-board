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
		<div class='profile-img'>
		<?php
			session_start();
			if(!empty($_SESSION["userImg"])){
			echo "<a href=\"#\"><img src=\"data:image/jpeg;base64,".base64_encode($_SESSION["userImg"])."\" alt=\"no-user\"></a>";
			}else{
				echo "<a href=\"#\"><img src=\"images/no-user.png\" alt=\"no-user\"></a>";
			}
		?>
		<div class="profile-dropdown">
			<p>
				<a href='signin.html' class="loginbutton">Login/Sign Up</a>
			</p>
		</div>
		</div>
    </header>
    <div class="container">
		<div class="profile-spacer" id="ps-1">
		</div>
			<div class="board-content">
		  <div id="post">
			<span>
				<a href="civiboard.php">[Catalog]</a>
				<form action="civiboard.php" method="GET" name="filter-threads" id="filter">
					<input type="text" name="search" placeholder="search threads..."><input type="submit" value="Filter">
				</form>
			</span>
				<button type="button" class="btn" id="post-btn">[Post a Thread]</button>
				<div id="post-form" class="post-hid">
				<form action="scripts/postthread.php" method="POST" enctype="multipart/form-data" name="submit-thread" id="post-thread">
					<input type="text" name="title" placeholder="title"></br>
					<input type="file" name="file" id="file"></br>
					<input type="submit" value="Submit" name="submit_thread">
				</form>
				<textarea rows="4" cols="50" name="postmsg" form="post-thread">Enter text here...</textarea>
				</div>
			 	</div>
			<div class="thread-container">
			<?php
			include("scripts/dbconnect.php");
			try{
				$pdo = dbConnect();
				if(empty($_GET["search"])){
				$seek = "SELECT posts.postNo, posts.msg, posts.img, posts.title, posts.time, users.status FROM posts JOIN users ON posts.userNo = users.userNo WHERE users.status=1 ORDER BY postNo DESC LIMIT 10";
				$stmt = $pdo->prepare($seek);
				$stmt->execute();
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
					echo "<span>".$row["time"]."</span><br/>";
					echo "<b>".$row["title"]."</b><br/>";
					echo $row["msg"];
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

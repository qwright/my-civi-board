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
			<a href="index.html"><img src ="images/civiboard_logoV1.png" alt ="logo" width="250px"></a>
    </div>
		<div class='profile-img'>
		<a href="#"><img src="images/no-user.png" alt="no-user"></a>
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
				<button type="button" class="btn" id="post-btn">[Post a Thread]</button>
				<div id="post-form" class="post-hid">
				<form action="scripts/postthread.php" method="POST" name="submit-thread" id="post-thread">
					<input type="text" name="title" placeholder="title"></br>
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
				$seek = "SELECT postNo, msg, img, title, time FROM posts ORDER BY postNo DESC LIMIT 10";
				$stmt = $pdo->prepare($seek);
				$stmt->execute();
				while($row = $stmt->fetch()){
					echo "<div id=\"thread-".$row["postNo"]."\">";
					echo "<a href=\"thread.php?p=".$row["postNo"]."\"><img src=\"images/city-park.jpg\"></a>";
					echo "<div class=\"preview\">";
					echo "<span>".$row["time"]."</span><br/>";
					echo "<b>".$row["title"]."</b><br/>";
					echo $row["msg"];
					echo "</div></div>";
				}	
			closeConnection($pdo);
			}catch(PDOException $e){
				die($e->getMessage());
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

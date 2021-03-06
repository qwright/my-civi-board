<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="styles/reset.css" />
    <link rel="stylesheet" href="styles/styles.css" />
		<link rel="icon" type="image/ico" href="images/logo.png" />
		<script src="scripts/script.js"></script>
    <title>MyCiviBoard</title>
</head>

<body>
    <header>
        <div class='logo'>
            <a href="index.php"><img src="images/civiboard_logoV1.png" alt="logo" width="250px"></a>
        </div>
				
			<?php
			include("scripts/header.php");
		?>
            
        </div>
    </header>
		<main>	
				<div class="board-container">
				<span><a href="civiboard.php">[back]</a></span>
					<div id="reply">		
						<button type="button" class="btn" id="reply-btn">[Post a reply]</button>
						<div id="reply-form" class="post-hid">
						<?php 
						echo "<form action=\"scripts/postreply.php?p=".$_GET["p"]."\" method='POST' name='submit-reply' id='reply-thread'>"
						?>
							<textarea rows="4" cols="30" name="replymsg" form="reply-thread"></textarea>
							<br>
							<input type="submit" value="Submit" name="submit_thread">
							
				</form>
				
				</div>
					</div>
					<?php
						include("scripts/dbconnect.php");
						try{
							$pdo = dbConnect();	
							$thread = "SELECT posts.postNo, posts.msg, posts.img, posts.userNo, posts.title, posts.time, users.username FROM users JOIN posts ON users.userNo=posts.userNo WHERE postNo=".$_GET["p"]."";
							$stmt = $pdo->prepare($thread);
							$stmt->execute();
							$rslt = $stmt->fetch();

							//post info query
							echo "<div id=\"post-user\"><b>".$rslt["username"]."</b> <time>".$rslt["time"]."</time></div>";
							echo "<div class=\"post\">";
              echo "<img src=\"data:images/jpeg;base64,".base64_encode($rslt["img"])."\">";
              echo "<div>";
              echo "<h1>".$rslt["title"]."</h1>";
              echo "<p>".$rslt["msg"]."</p>";
							echo "</div></div>";

							//replies query
							$replies = "SELECT replies.replyNo, replies.replymsg, replies.image, replies.time, users.username, users.status FROM replies JOIN users ON users.userNo=replies.userNo WHERE status=1 AND visibility=1 AND postNo=".$_GET["p"]."";
							$stmt2 = $pdo->prepare($replies);
							$stmt2->execute();
							while($row = $stmt2->fetch()){
								
								
								echo "<div class=\"reply\" id=\"reply-".$row["replyNo"]."\" class=\"reply\">";
								echo "<b>".$row["username"]." </b><time>".$row["time"]."</time>";
								echo "<div class=\"reply-content\">";
								echo "<p>".$row["replymsg"]."</p></div>";
								//if(isset($_SESSION["loggedin"])==true){
									if($_SESSION["username"]=="admin"){
										echo "<a href='scripts/deletehandler.php?reply=".$row["replyNo"]."'>[delete]</a>";
									}
								//}
								echo "</div>";
							}
							closeConnection($pdo);
						}catch(PDOException $e){
							die($e->getMessage());
						}
					?>
         </div>
    </main>
    <footer>
        <div class="footer-content">
            <p>Contact Us</p>
            <hr class="footer">
            <p>&copy; Paige Latimer and Quinn Wright</p>
        </div>
    </footer>
</body>

</html>

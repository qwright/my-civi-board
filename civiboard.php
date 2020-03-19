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
			  <div id="thread-1">
			  	<a href="thread.html"><img src="images/city-park.jpg" alt=""></a>
				<div class="preview">
					<b>Title Here</b><br/>
					This is a thread preview
				</div>
			  </div>
			  <div id="thread-2">
			  	<a href=""><img src="images/city-park.jpg" alt=""></a>
				<div class="preview"><b>Title Here</b><br/>
					This is a thread preview</div>
			  </div>
			  <div id="thread-3">
			  	<a href=""><img src="images/city-park.jpg" alt=""></a>
				<div class="preview"><b>Title Here</b><br/>
					This is a thread preview</div>
			  </div>
			  <div id="thread-4">
			  	<a href=""><img src="images/city-park.jpg" alt=""></a>
				<div class="preview"><b>Title Here</b><br/>
					This is a thread preview</div>
			  </div>
			  <div id="thread-5">
			  	<a href=""><img src="images/city-park.jpg" alt=""></a>
				<div class="preview"><b>Title Here</b><br/>
					This is a thread preview</div>
			  </div>
			  <div id="thread-6">
			  	<a href=""><img src="images/city-park.jpg" alt=""></a>
				<div class="preview"><b>Title Here</b><br/>
					This is a thread preview</div>
			  </div>
			  <div id="thread-7">
			  	<a href=""><img src="images/city-park.jpg" alt=""></a>
				<div class="preview"><b>Title Here</b><br/>
					This is a thread preview</div>
			  </div>
			  <div id="thread-8">
			  	<a href=""><img src="images/city-park.jpg" alt=""></a>
				<div class="preview"><b>Title Here</b><br/>
					This is a thread preview</div>
			  </div>
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
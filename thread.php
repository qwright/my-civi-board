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
            <a href="index.html"><img src="images/civiboard_logoV1.png" alt="logo" width="250px"></a>
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
		<main>	
				<div class="board-container">
					<div id="reply">		
						<button type="button" class="btn" id="reply-btn">[Post a reply]</button>
						<div id="reply-form" class="post-hid">
<?php 
						echo "<form action=\"scripts/postreply.php?p=".$_GET["p"]."\" method='POST' name='submit-reply' id='reply-thread'>"
						?>
							<input type="submit" value="Submit" name="submit_thread">
				</form>
				<textarea rows="4" cols="50" name="replymsg" form="reply-thread">Enter text here...</textarea>
				</div>
					</div>
            <div id="post-user"><a href="#">Username</a> <time>24:00/01/01/2000</time></div>
            <div class="post">
                <img src="images/city-park.jpg">
                <div>
                    <h1>Title</h1>
                    <p>This is a thread post</p>
                </div>
            </div>
            <div class="reply" id="reply-1" class="reply">
                <a href="#">Username</a> <time>24:00/01/01/2000</time>
                <div class="reply-content">
                    <p>This is a reply</p>
                </div>
            </div>
            <div id="reply-2" class="reply">
                <a href="#">Username</a> <time>24:00/01/01/2000</time>
                <div class="reply-content">
                    <p>This is a reply"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                </div>
            </div>
            <div id="reply-3" class="reply">
                <a href="#">Username</a> <time>24:00/01/01/2000</time>
                <div class="reply-content">
                    <p>This is a reply"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate</p>
                </div>
            </div>
            <div id="reply-4" class="reply">
                <a href="#">Username</a> <time>24:00/01/01/2000</time>
                <div class="reply-content">
                    <p>This is a reply</p>
                </div>
            </div>
            <div id="reply-5" class="reply">
                <a href="#">Username</a> <time>24:00/01/01/2000</time>
                <div class="reply-content">
                    <p>This is a reply</p>
                </div>
            </div>
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

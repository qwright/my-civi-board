<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="styles/reset.css" />
    <link rel="stylesheet" href="styles/styles.css" />

    <script src="js/script.js"></script>
    <title>MyCiviBoard</title>
    <link rel="icon" type="image/ico" href="images/logo.png" />
</head>

<body>
    <header>
        <div class='logo'>
            <a href="index.php"><img src="images/civiboard_logoV1.png" alt="logo" width="250px"></a>
        </div>
            <?php
            include("scripts/dbconnect.php");
			//Check if the user is logged in with session. If a user is logged in, show a link to profile page
			session_start();
			$pdo=dbConnect();
			if (isset($_SESSION["loggedin"])==true){
				echo "<div class='profile-img'>";
				echo "<a href=\"#\"><img src=\"images/no-user.png\" alt=\"no-user\"></a>";
				echo "<div class='profile-dropdown'>";
				echo "<p>";
				echo "<a href='profile.php' class='loginbutton'>Profile Info</a>";
				echo "</p>";
				echo "</div>";
				echo "</div>";
			}
			else{
				echo "<div class='profile-img'>";
				echo "<a href=\"#\"><img src=\"images/no-user.png\" alt=\"no-user\"></a>";
				echo "<div class='profile-dropdown'>";
				echo "<p>";
				echo "<a href='signin.html' class='loginbutton'>Login/Sign Up</a>";
				echo "</p>";
				echo "</div>";
				echo "</div>";
			}
			?>
    </header>
    <div class="container">
        <div class="profile-spacer" id="ps-1"></div>
        <div class="search-bar">
            <img class="index-banner" src="images/city_illustration.png" alt="downtown-park" />
            <div class="search-container">
                <div class="blurb">
                    <h1>Connect with your Community</h1>
                    <p>Get involved and stay up to date with your city.</p>
                </div>
                <form class="search-form" Action="civiboard.php" Method="GET">
                    <input type="text" name="city" placeholder="Find your city!" class="search-city" />
                    <input type="submit" value="Search" value="Search your city!">
                </form>
            </div>
        </div>

    </div>
    <footer>
        <div class="footer-content">
            <p>Contact Us</p>
            <hr class="footer">
            <p>&copy; Paige Latimer and Quinn Wright</p>
        </div>
    </footer>
</body>

</html>
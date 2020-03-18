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
	<?php include("scripts/dbconnect.php");?>
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
        <div class="conatiner">
            <div class="profile">

                <div class="left-profile">
                    <div class="test">
                        <div class="name">
                            <h1>John Doe</h1>
                        </div>
                        <div class="profile-photo">
                            <figure>
                                <img src="images/profile-image.png" width="100px" />
                                <figcaption>Avatar Picture</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="right-profile">
                    <div class="info-title">
                        <p>Username:</p>
                    </div>
                    <div class="info-content">
                        <p>johndoe23</p>
                    </div>
                    <div class="info-title">
                        <p>First Name:</p>
                    </div>
                    <div class="info-content">
                        <p>John</p>
                    </div>
                    <div class="info-title">
                        <p>Last Name:</p>
                    </div>
                    <div class="info-content">
                        <p>Doe</p>
                    </div>
                    <div class="info-title">
                        <p>Email:</p>
                    </div>
                    <div class="info-content">
                        <p>johndoe23@gmail.com</p>
                    </div>
                    <button type="button" class="btn" style="margin: 1em;">Update Info</button>
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
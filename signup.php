<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="styles/reset.css" />
    <link rel="stylesheet" href="styles/styles.css" />

    <title>MyCiviBoard</title>
    <link rel="icon" type="image/ico" href="images/logo.png" />
</head>

<body>
    <header>
        <div class='logo'>
            <a href="index.php"><img src="images/civiboard_logoV1.png" alt="logo" width="250px"></a>
        </div>
    </header>
    <main>
        <div class="login">
            <div class="login-screen">
                <div class="login-title">
                    <h4>Create Your Account!</h4>
                </div>
                <div class="login-form">
                    <div class="control-group">
                        <form action="scripts/loginhandler.php" method="POST" enctype="multipart/form-data" name="login-form">
                            <input type="text" name="firstName" class="login-field" value="" placeholder="first name" id="fName" required>
                    </div>
                    <div class="control-group">
                        <input type="text" name="lastName" class="login-field" value="" placeholder="last name" id="lName" required>
                    </div>
                    <div class="control-group">
                        <input type="text" name="username" class="login-field" value="" placeholder="username" id="login-name" required>
                    </div>
                    <div class="control-group">
                        <input type="email" name="email" class="login-field" value="" placeholder="email" id="email" required>
                    </div>
                    <div class="control-group">
                        <input type="password" name="password" class="login-field" value="" placeholder="password" id="login-pass" required>
					</div>
					<div class="control-group">
						<input type="file" name="file">
					</div>

                    <input type="submit" value="Sign Up" name="signup">
                    </form>
                    <div class="signup-link">
                        <h5>Already have an account?<a href="signin.html"> Sign in here!</a></h5>
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

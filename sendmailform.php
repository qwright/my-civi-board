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
                    <h4>Enter your Recovery Email</h4>
                </div>
                <div class="login-form">
                    <div class="control-group">
                        <form action="scripts/mailto.php" method="POST" enctype="multipart/form-data" name="password">
                    </div>
                    <div class="control-group">
                    </div>
                    <div class="control-group">
                        <input type="text" name="username" class="login-field" value="" placeholder="username" id="login-name" required>
                    </div>
                    <div class="control-group">
                        <input type="email" name="email" class="login-field" value="" placeholder="email" id="email" required>
                    </div>

                    <input type="submit" value="Send" name="Email">
                    </form>
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

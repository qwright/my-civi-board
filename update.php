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
            <a href="index.php"><img src="images/civiboard_logoV1.png" alt="logo" width="250px"></a>
        </div>
        <?php
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
    <main>
                        <?php
                        try{
                            //COSC 360\my-civi-board\update.php on line 59
                            //session_start();
                            $pdo=dbConnect();
                            //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            if (isset($_POST['submit'])){
                            $username = $_POST["username"];
                            $firstName = $_POST["firstName"]; 
                            $lastName = $_POST["lastName"];
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            $sql = "UPDATE users SET firstName = '$firstName', lastName = '$lastName', pass = '$password', email = '$email', username = '$username' WHERE username = ?";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(1,$_SESSION["username"]);
                            $stmt->execute();
                            header("Location: signin.html");
                            }
                            else{
                            $sql = "SELECT * FROM users WHERE username = ?";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(1,$_SESSION["username"]);
                            $stmt->execute();
                            $userInfo = $stmt->fetch();
                            $username = $userInfo["username"];
                            $firstName = $userInfo["firstName"]; 
                            $lastName = $userInfo["lastName"];
                            $email = $userInfo["email"];
                            $password = $userInfo["password"];
                            echo "<div class='conatiner'>";
                            echo "<div class='profile'>";
                            echo "<div class='left-profile'>";
                            echo "<div class='test'>";
                            echo "<div class='name'>";
                            echo "<h1>Update Information</h1>";
                            echo "</div>";
                            echo "<div class='profile-photo'>";
                            echo "<figure>";
                            echo "<img src='images/profile-image.png' width='100px'/>";
                            echo "<figcaption>Avatar Picture</figcaption>";
                            echo "</figure>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='right-profile'>";
                            echo "<form action='update.php' method='POST' name='update-form'>";
                            echo "<div class='info-title'><p>Username:</p></div>";
                            echo "<div class='input-content'><input name ='username' type='text' value=".$username."></div>";
                            echo "<div class='info-title'><p>First Name:</p></div>";
                            echo "<div class='input-content'><input name ='firstName' type='text' value=".$firstName."></div>";
                            echo "<div class='info-title'><p>Last Name:</p></div>";
                            echo "<div class='input-content'><input name ='lastName' type='text' value=".$lastName."></div>";
                            echo "<div class='info-title'><p>Email:</p></div>";
                            echo "<div class='input-content'><input name ='email' type='text' value=".$email."></div>";
                            echo "<div class='info-title'><p>Password:</p></div>";
                            echo "<div class='input-content'><input name ='password' type='password' value=".$password."></div>";
                            echo "<div class='btn-space'>";
                            echo "<input type ='submit' name ='submit' value='Update'/>";
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                            }
                            
                        }
                        catch(PDOException $e){
                            die($e->getMessage());
                        }
                        ?>
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
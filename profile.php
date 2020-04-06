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
        include("scripts/header.php");
        ?>
    </header>
    <main>
                        <?php
                        try{
                            session_start();
                            $pdo=dbConnect();
                            //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = "SELECT * FROM users WHERE username=?";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(1,$_SESSION["username"]);
                            $stmt->execute();
                            $userInfo = $stmt->fetch();
                            echo "<div class='conatiner'>";
                            echo "<div class='profile'>";
                            echo "<div class='left-profile'>";
                            echo "<div class='test'>";
                            echo "<div class='name'>";
                            echo "<h1>".$userInfo["firstName"]." ".$userInfo["lastName"]."</h1>";
                            echo "</div>";
                            echo "<div class='profile-photo'>";
                            echo "<figure>";
            								echo "<a href=\"#\"><img src=\"data:image/jpeg;base64,".base64_encode($_SESSION["userImg"])."\" alt=\"no-user\"></a>";
                            echo "<figcaption>Avatar Picture</figcaption>";
                            echo "</figure>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='right-profile'>";
                            echo "<div class='info-title'><p>Username:</p></div>";
                            echo "<div class='info-content'><p>".$userInfo["username"]."</p></div>";
                            echo "<div class='info-title'><p>First Name:</p></div>";
                            echo "<div class='info-content'><p>".$userInfo["firstName"]."</p></div>";
                            echo "<div class='info-title'><p>Last Name:</p></div>";
                            echo "<div class='info-content'><p>".$userInfo["lastName"]."</p></div>";
                            echo "<div class='info-title'><p>Email:</p></div>";
                            echo "<div class='info-content'><p>".$userInfo["email"]."</p></div>";
                            echo "<div class='btn-space'>";
                            echo "<form><button formaction='scripts/logout.php' class='btn'>Logout</button></form>";
                            echo "</div>";
                            echo "<div class='btn-space'>";
                            echo "<form><button formaction='update.php' class ='btn'>Update Information</button></form>";
                            echo "</div>";
                            echo "</div>";
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

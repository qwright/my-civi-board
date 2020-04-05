<?php session_start();
			//$pdo=dbConnect();
			if (isset($_SESSION["loggedin"])==true){
                if($_SESSION["username"]=="admin"){
                    echo "<div class='profile-img'>";
				if(!empty($_SESSION["userImg"])){
					echo "<a href=\"#\"><img src=\"data:image/jpeg;base64,".base64_encode($_SESSION["userImg"])."\" alt=\"no-user\"></a>";	
				}else{
					echo "<a href=\"#\"><img src=\"images/no-user.png\" alt=\"no-user\"></a>";
				}
				echo "<div class='profile-dropdown'>";
				echo "<p>";
                echo "<a href='profile.php' class='loginbutton'>Profile Info</a>";
                echo "</p>";
                echo "<p>";
                echo "<a href='admin.php' class='loginbutton'>Admin Page</a>";
				echo "</p>";
				echo "</div>";
				echo "</div>";

                }
                else{
				echo "<div class='profile-img'>";
				if(!empty($_SESSION["userImg"])){
					echo "<a href=\"#\"><img src=\"data:image/jpeg;base64,".base64_encode($_SESSION["userImg"])."\" alt=\"no-user\"></a>";	
				}else{
					echo "<a href=\"#\"><img src=\"images/no-user.png\" alt=\"no-user\"></a>";
				}
				echo "<div class='profile-dropdown'>";
				echo "<p>";
				echo "<a href='profile.php' class='loginbutton'>Profile Info</a>";
				echo "</p>";
				echo "</div>";
                echo "</div>";
            }
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
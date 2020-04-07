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
				echo "<div class='menuspace'>";
                echo "<a href='profile.php' class='menubutton'>Profile Info</a>";
                echo "</div>";
                echo "<div class ='menuspace'>";
                echo "<a href='admin.php' class='menubutton'>Admin Page</a>";
				echo "</div>";
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
				echo "<a href='profile.php' class='menubutton'>Profile Info</a>";
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
				echo "<a href='signin.html' class='menubutton'>Login/Sign Up</a>";
				echo "</p>";
				echo "</div>";
				echo "</div>";
			}
			?>
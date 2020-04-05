<!DOCTYPE html>
<?php include_once("scripts/checkAdmin.php");?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <link rel="stylesheet" href="styles/reset.css" />
  <link rel="stylesheet" href="styles/styles.css" />
	<title>Admin Portal</title>
</head>
<body>
	<header>
      <div class='logo'>
      <a href="index.php"><img src="images/civiboard_logoV1.png" alt="logo" width="250px"></a>
      </div>
			<div class='profile-img'>
			<?php
			session_start();
			if(!empty($_SESSION["userImg"])){
			echo "<a href=\"#\"><img src=\"data:image/jpeg;base64,".base64_encode($_SESSION["userImg"])."\" alt=\"no-user\"></a>";
			}else{
				echo "<a href=\"#\"><img src=\"images/no-user.png\" alt=\"no-user\"></a>";
			}
		?>
            <div class="profile-dropdown">
                <p>
                    <a href='signin.html' class="loginbutton">Login/Sign Up</a>
                </p>
            </div>
        </div>
		</header>
		<main id="userInfo">
		<div>
		<script src="scripts/script.js"></script>
		<input type="text" id="filtertable" onkeyup="filterTable()" placeholder="Search for user...">
		</div>
		<div>
		<table id="userInfoTable">
			<tr><th>userNo</th><th>Name</th><th>email</th><th>userName</th><th>Status</th></tr>
			<?php
			include("scripts/dbconnect.php");
			$pdo = dbConnect();
			$users = $pdo->query("SELECT userNo, firstName, lastName, email, username, status from users");
			while($row = $users->fetch()){
				$status = ($row["status"]==0) ? "banned" : "active";
				echo "<tr><td>".$row["userNo"]."</td><td>".$row["firstName"]." ".$row["lastName"]."</td><td>".$row["email"]."</td><td>".$row["username"]."</td><td>".$status."</td><td><a href=\"scripts/banuser.php?u=".$row["userNo"]."&s=".$row["status"]."\">[Alter Status]</a></td></tr>";
			}
			closeConnection($pdo);
?>
		</table>
		</div>
		</main>

</body>
</html>

<!DOCTYPE html>
<?php include_once("scripts/checkAdmin.php");?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <link rel="stylesheet" href="styles/reset.css" />
  <link rel="stylesheet" href="styles/styles.css" />
	<title>Admin Portal</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<body>
	<header>
      <div class='logo'>
      <a href="index.php"><img src="images/civiboard_logoV1.png" alt="logo" width="250px"></a>
      </div>
			<div class='profile-img'>
			<?php
			//session_start();
			
			if(!empty($_SESSION["userImg"])){
			echo "<a href=\"#\"><img src=\"data:image/jpeg;base64,".base64_encode($_SESSION["userImg"])."\" alt=\"no-user\"></a>";
			}else{
				echo "<a href=\"#\"><img src=\"images/no-user.png\" alt=\"no-user\"></a>";
			}
		?>
            <div class="profile-dropdown">
                <p>
                    <a href='profile.php' class="menubutton">Profile Info</a>
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
		<div class = "canvas-container" id="chartcontainer1"><canvas id="postActivity"></canvas></div>
		<div class = "canvas-container" id="chartcontainer2"><canvas id="commentActivity"></canvas></div>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/Chart.min.js"></script>
		<script>
		<?php include("data.php"); ?>
var ctx = document.getElementById('postActivity').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: <?php echo json_encode($postlabels) ?>,
        datasets: [{
            label: 'User Post Activity',
            data: <?php echo json_encode($postdata) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx2 = document.getElementById('commentActivity').getContext('2d');
var myChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($comlabels) ?>,
        datasets: [{
            label: 'User Comment Activity',
            data: <?php echo json_encode($comdata) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
}); 


</script>
		
		</main>

</body>
</html>

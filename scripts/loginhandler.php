<?php
include("dbconnect.php");
if($_POST["login"]){
	try{
		$pdo=dbConnect();
		$sql = "SELECT userNo, username, pass FROM users WHERE username=? and pass=?";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(1,$_POST["user"]);
		$statement->bindValue(2,$_POST["pass"]);
		$statement->execute();
		if($statement->rowCount() == 1){
			session_start();
			$_SESSION["loggedin"] = true;
			$_SESSION["username"] = $_POST["user"];
			$user = $statement->fetch();
			var_export($user);
			$_SESSION["userNo"] = $user["userNo"];
			closeConnection($pdo);	
			header("Location: ../index.html");
		}
		else{
			header("Location: ../signin.html");
		}
	}
	catch(PDOException $e){
		die($e->getMessage());
	}	
}

if($_POST["signup"]){
	try{
		$pdo=dbConnect();
		$sql = "INSERT INTO users (firstName, lastName, pass, email, username) VALUES (?, ?, ?, ?, ?)";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(1,$_POST["firstName"]);
		$statement->bindValue(2,$_POST["lastName"]);
		$statement->bindValue(3,$_POST["password"]);
		$statement->bindValue(4,$_POST["email"]);
		$statement->bindValue(5,$_POST["username"]);
		$statement->execute();
		header("Location: ../signin.html");
		echo "<h5>Thanks for signing up! <a href=\"../signin.html\">Sign in</a>";
	}
	catch(PDOException $e){
		die($e->getMessage());
	}	
	closeConnection($pdo);
}

?>


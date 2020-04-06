<?php
include("dbconnect.php");
if(!empty($_POST["login"])){
	try{
		$pdo=dbConnect();
		$sql = "SELECT userNo, username, pass, img FROM users WHERE username=? and pass=?";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(1,$_POST["user"]);
		$statement->bindValue(2,$_POST["pass"]);
		$statement->execute();
		if($statement->rowCount() == 1){
			session_start();
			$_SESSION["loggedin"] = true;
			$_SESSION["username"] = $_POST["user"];
			$user = $statement->fetch();
			$_SESSION["userNo"] = $user["userNo"];
			$_SESSION["userImg"] = $user["img"];
			closeConnection($pdo);	
			header("Location: ../index.php");
		}
		else{
			header("Location: ../signin.html");
		}
	}
	catch(PDOException $e){
		die($e->getMessage());
	}	
}

if(!empty($_POST["signup"])){
	try{
		$pdo=dbConnect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO `users` (`firstName`, `lastName`, `pass`, `email`, `username`, img, 'status') VALUES (?, ?, ?, ?, ?, ?, 1)";
		$statement = $pdo->prepare($sql);
		$statement->bindValue(1,$_POST['firstName']);
		$statement->bindValue(2,$_POST['lastName']);
		$statement->bindValue(3,$_POST['password']);
		$statement->bindValue(4,$_POST['email']);
		$statement->bindValue(5,$_POST['username']);
		
		$file = file_get_contents($_FILES["file"]["tmp_name"]);
		$statement->bindValue(6,$file);
		$statement->execute();	
		header("Location: ../signin.html");
	}
	catch(PDOException $e){
		die($e->getMessage());
		header("Location: ../signup.html");
	}	
	closeConnection($pdo);
}

?>


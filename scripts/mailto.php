<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../PHPMailer-master/src/Exception.php';
    require '../PHPMailer-master/src/PHPMailer.php';
    require '../PHPMailer-master/src/SMTP.php';

    include("dbconnect.php");
    $pdo=dbConnect();
    $sql = "SELECT pass FROM users WHERE email=?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1,$_POST["email"]);
    $stmt->execute();
    $userInfo = $stmt->fetch();
    $pass = $userInfo['pass'];
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    
    $mail->SMTPDebug  = 1;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "my.civi.board@gmail.com";
    $mail->Password   = "myciviboard";

    $mail->IsHTML(true);
    $to =$_REQUEST['email'];
    $name = $_REQUEST['username'];
    $mail->AddAddress($to, $name10);
    $mail->SetFrom("my-civi-board@gmail.com", "My Civi Board");
    $mail->Subject = "Password Recovery";
    $content = '<p>Hello, your password is '.$pass.'. You may now log in to myCiviBoard.</p><p>Regards,</p><p>My Civi Board Team</p>';
    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
    } else {
    header("Location: ../signin.html");
}   

    
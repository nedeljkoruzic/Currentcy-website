<?php
use PHPMailer \PHPMailer \PHPMailer;
use PHPMailer \PHPMailer \SMTP;
use PHPMailer \PHPMailer \Exception;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "ogdigitalguy@gmail.com";
    $mail->Password='Insta!5567';
    $mail->Port=587;
    $mail->SMTPSecure="tls";
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("ogdigitalguy@gmail.com");
    $mail->Name = ("$email ($name)");
    $mail->Body = $message;

    if($mail->send()){
        $status = "success";
        $response="Email is sent!";

    }else{
        $status="failed";
        $response="Something is wrong: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}







?>
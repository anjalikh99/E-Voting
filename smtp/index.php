<?php
include('smtp/PHPMailerAutoload.php');

/**
 *  function to send mail from google smtp server. 
 *  @return boolean
 */
function sendMail($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->SMTPDebug  = 0;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "assamunivproj21@gmail.com";
    $mail->Password = "Assamunivproj21@";
    $mail->SetFrom("assamunivproj21@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));

    return $mail->Send();
}

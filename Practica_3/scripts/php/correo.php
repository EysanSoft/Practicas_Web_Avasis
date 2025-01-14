<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';

class Correo
{
    public function enviarCorreo($correo, $asunto, $cuerpo)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.hostinger.com';            //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'pruebas@avasis-ti.com';                //SMTP username
            $mail->Password   = 'C24p*ER.235';                          //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption // PHPMailer::ENCRYPTION_SMTPS
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('pruebas@avasis-ti.com', 'Correo Pruebas');
            $mail->addAddress($correo);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body    = $cuerpo;
            $mail->AltBody = $cuerpo;

            $mail->send();
            return "Correo Enviado.";
        } catch (Exception $e) {
            return "Error al enviar el correo";
        }
    }
}

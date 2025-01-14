<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../../vendor/autoload.php';
class Correo {
    public function enviarCorreo($correo, $asunto, $cuerpo, $cuerpoSinEstilos) {
        $mail = new PHPMailer(true);

        try {
            // Configuraciones
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.hostinger.com';            
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'pruebas@avasis-ti.com';               
            $mail->Password   = 'C24p*ER.235';                         
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
            $mail->Port       = 465;                                  

            // Remitente
            $mail->setFrom('pruebas@avasis-ti.com', 'Correo Pruebas');
            // Destinatario
            $mail->addAddress($correo);    

            //Content
            $mail->isHTML(true);                            
            $mail->Subject = $asunto;
            $mail->Body    = $cuerpo;
            $mail->AltBody = $cuerpoSinEstilos;

            $mail->send();
            return "Correo Enviado.";
        }
        catch (Exception $e) {
            return "Error al enviar el correo";
        }
    }
}

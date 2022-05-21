<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

class Mail {

    public function __construct() {
        
    }

    public function enviar($producto, $persona, $email, $telefono, $asunto, $mensaje) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.hostinger.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'prueba@munidi.gob.pe';                     //SMTP username
            $mail->Password = 'Daledale1234.@';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('prueba@munidi.gob.pe', 'Dseis');
            $mail->addAddress('tuexnin@gmail.com', 'MindFluid');     //Add a recipient

            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "'$asunto'";
            $mail->Body = "<p>Producto: $producto</p>"
                    . "<p>Cliente: $persona</p>"
                    . "<p>Email: $email</p>"
                    . "<p>Telefono: $telefono</p><hr>"
                    . "<p>Mensaje: $mensaje</p>";
            $mail->AltBody = "Producto: $producto\n, Cliente: $persona\n, Email: $email\n, Telefono: $telefono\n, Mensaje: $mensaje";

            $mail->send();
            //echo 'email enviado';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}

?>

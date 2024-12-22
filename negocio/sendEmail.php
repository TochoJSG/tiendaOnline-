<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (!$email || !$message || !$name) {
        echo json_encode(['error' => 'Faltan campos obligatorios.']);
        http_response_code(400);
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Cambiar por el servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@example.com';
        $mail->Password = 'your_password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('your_email@example.com', 'Contacto G-Tocha');
        $mail->addAddress('matprimas.tocha.loc33@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Contacto G-Tocha Tocha';
        $mail->Body = "<p><strong>Nombre:</strong> $name $lname</p>" .
                      "<p><strong>Email:</strong> $email</p>" .
                      "<p><strong>Teléfono:</strong> $phone</p>" .
                      "<p><strong>Mensaje:</strong> $message</p>";

        $mail->send();
        echo json_encode(['message' => 'Correo enviado exitosamente.']);
    } catch (Exception $e) {
        echo json_encode(['error' => "No se pudo enviar el correo: {$mail->ErrorInfo}"]);
        http_response_code(500);
    }
}
?>
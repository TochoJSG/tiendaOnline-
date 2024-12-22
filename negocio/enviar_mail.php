<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Captura de datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
    $tel = htmlspecialchars($_POST['tel']);
    $msg = htmlspecialchars($_POST['msg']);

    // Validar campos obligatorios
    if (!$email || empty($name) || empty($msg)) {
        die("Por favor, completa los campos obligatorios (nombre, email y mensaje).");
    }

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'jjorgess081@gmail.com'; // Tu correo
        $mail->Password = '131176.Nat$%'; // Contraseña o contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encriptación
        $mail->Port = 587; // Puerto para TLS

        // Configuración del remitente y destinatario
        $mail->setFrom('noreply@tudominio.com', 'Formulario de Contacto'); // Remitente fijo
        $mail->addAddress('jjorgess081@gmail.com', 'Destinatario'); // Donde recibirás el mensaje

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje desde el formulario de contacto';
        $mail->Body = "
            <h2>Nuevo mensaje recibido</h2>
            <p><strong>Nombre:</strong> {$name} {$lname}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Teléfono:</strong> {$tel}</p>
            <p><strong>Mensaje:</strong><br>{$msg}</p>
        ";

        // Enviar correo
        $mail->send();
        echo "Mensaje enviado correctamente. Nos pondremos en contacto contigo si es necesario.";
    } catch (Exception $e) {
        echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
} else {
    echo "Acceso no permitido.";
}
?>

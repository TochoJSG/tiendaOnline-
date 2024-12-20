<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';


// Obtener datos enviados desde JavaScript
$input = json_decode(file_get_contents('php://input'), true);

// Validar datos
if (!isset($input['emailCliente'], $input['nombreCliente'], $input['items'], $input['total'])) {
    echo json_encode(['success' => false, 'error' => 'Datos incompletos']);
    exit;
}

$emailCliente = $input['emailCliente'];
$nombreCliente = $input['nombreCliente'];
$items = $input['items'];
$total = $input['total'];

// Crear el contenido del correo
$itemsHtml = '';
foreach ($items as $item) {
    $itemsHtml .= "<li>{$item['name']} (Cantidad: {$item['quantity']}, Precio: {$item['unit_amount']['value']} MXN)</li>";
}

$contenidoCorreo = "
<h2>Notificación de Venta</h2>
<p>Cliente: $nombreCliente</p>
<p>Correo: $emailCliente</p>
<p>Total: $total MXN</p>
<h3>Detalles de la compra:</h3>
<ul>$itemsHtml</ul>
";

// Configurar PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.tu-servidor.com'; // Cambiar al servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'jjorgess081@gmail.com';
    $mail->Password = '131176.Nat$%';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configuración del correo
    $mail->setFrom('notificaciones@mi-tienda.com', 'Mi Tienda');
    $mail->addAddress('oagcoronel@gmail.com', 'Administrador');
    $mail->isHTML(true);
    $mail->Subject = 'Nueva Venta Realizada';
    $mail->Body = $contenidoCorreo;

    // Enviar correo
    $mail->send();
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $mail->ErrorInfo]);
}
?>

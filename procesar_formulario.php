<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuración de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir la clase PHPMailer
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$name = $_POST['fullName'];
$email = $_POST['email'];
$phone = $_POST['number'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host        = 'smtp.gmail.com'; // Cambia esto al servidor SMTP que estés usando
    $mail->SMTPAuth   = true;
    $mail->Username   = ''; // Cambia esto a tu dirección de correo electrónico
    $mail->Password   = ''; // Cambia esto a tu contraseña
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    // Remitente y destinatario
    $mail->setFrom($email, $name);
    $mail->addAddress('recipient@example.com', 'Recipient Name');
    
    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Nuevo mensaje desde el formulario';
    $mail->Body    = "Nombre: {$name}<br>Email: {$email}<br>Teléfono: {$phone}<br>Mensaje: {$message}";

    // Enviar el correo
    $mail->send();
    echo 'Form submission successful!';
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}


$response = array('message' => 'Form submission successful!');
echo json_encode($response);
?>

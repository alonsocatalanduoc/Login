<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener el correo electrónico enviado desde el formulario
  $email = $_POST['email'];

  // Validar el correo electrónico (puedes agregar tu propia validación aquí)

  // Generar un código o enlace único para restablecer la contraseña
  $resetCode = generarCodigoUnico(); // Función para generar un código único

  // Guardar el código o enlace en una base de datos o archivo para su posterior verificación

  // Enviar el correo electrónico con el enlace para restablecer la contraseña
  $subject = "Restablecimiento de contraseña";
  $message = "Hola, has solicitado restablecer tu contraseña. Haz clic en el siguiente enlace para continuar:\n\n";
  $message .= "http://tu-sitio-web.com/restablecer.php?code=" . urlencode($resetCode); // Reemplaza "tu-sitio-web.com" con tu propio dominio o ruta del archivo
  $headers = "From: no-reply@tu-sitio-web.com"; // Reemplaza "tu-sitio-web.com" con tu propio dominio o dirección de correo electrónico

  if (mail($email, $subject, $message, $headers)) {
    echo "Se ha enviado un correo electrónico con instrucciones para restablecer la contraseña.";
  } else {
    echo "Ha ocurrido un error al enviar el correo electrónico.";
  }
}

function generarCodigoUnico() {
  // Implementa tu lógica para generar un código único aquí
  // Puede ser un código aleatorio, un hash único, etc.
  // Aquí hay un ejemplo simple que genera una cadena al azar de longitud 10
  $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $codigo = '';
  for ($i = 0; $i < 10; $i++) {
    $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
  }
  return $codigo;
}
?>

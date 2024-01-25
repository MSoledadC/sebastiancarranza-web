<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validar los datos
    $errors = array();

    // Validar nombre y apellido
    if (empty($firstname) || empty($lastname)) {
        $errors[] = "Por favor, ingresa tanto el nombre como el apellido.";
    }

    // Validar dirección de correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Por favor, ingresa una dirección de correo electrónico válida.";
    }

    // Puedes agregar más validaciones según tus necesidades, por ejemplo, para el asunto y el mensaje

    // Verificar si hay errores antes de procesar los datos
    if (empty($errors)) {
        // Procesar los datos (puedes enviar un correo electrónico, almacenar en una base de datos, etc.)
        
        // Ejemplo de envío de correo electrónico (requiere configuración del servidor)
        $to = "destinatario@example.com";
        $headers = "From: $email";
        $email_subject = "Nuevo mensaje de contacto: $subject";
        $email_body = "Has recibido un nuevo mensaje de contacto:\n\n" .
                      "Nombre: $firstname $lastname\n" .
                      "Email: $email\n" .
                      "Asunto: $subject\n" .
                      "Mensaje:\n$message";

        mail($to, $email_subject, $email_body, $headers);

        // Puedes redirigir al usuario a una página de agradecimiento
        header("Location: gracias.html");
        exit();
    } else {
        // Si hay errores, puedes hacer algo con ellos, por ejemplo, mostrar mensajes de error al usuario
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    }
}
?>
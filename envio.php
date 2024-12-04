<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Tu correo electrónico para recibir la reserva
        $destino = "abrigo.tarazona@gmail.com";

        // Obtener los datos del formulario
        $name = $_POST["name"];
        $celular = $_POST["celular"];
        $person = $_POST["person"];
        $fechareserva = $_POST["fechareserva"];
        $hora = $_POST["hora"];
        $mensaje = $_POST["mensaje"];
        $email = $_POST["email"]; // El correo electrónico del cliente

        // Construir el contenido del correo que recibirás tú
        $contenido = "Nombre: " . $name . "\n";
        $contenido .= "Celular: " . $celular . "\n";
        $contenido .= "Número de personas: " . $person . "\n";
        $contenido .= "Fecha de la reserva: " . $fechareserva . "\n";
        $contenido .= "Hora: " . $hora . "\n";
        $contenido .= "Mensaje: " . $mensaje . "\n";
        $contenido .= "Correo electrónico del cliente: " . $email . "\n";

        // Enviar correo a tu dirección
        mail($destino, "Nueva Reserva", $contenido);

        // Construir el contenido del correo de confirmación para el cliente
        $contenido_cliente = "Hola " . $name . ",\n\n";
        $contenido_cliente .= "Gracias por hacer una reserva en nuestro restaurante. Aquí están los detalles de tu reserva:\n";
        $contenido_cliente .= "Fecha: " . $fechareserva . "\n";
        $contenido_cliente .= "Hora: " . $hora . "\n";
        $contenido_cliente .= "Número de personas: " . $person . "\n\n";
        $contenido_cliente .= "Mensaje: " . $mensaje . "\n\n";
        $contenido_cliente .= "Nos pondremos en contacto contigo si hay algún cambio en tu reserva.\n";
        $contenido_cliente .= "¡Esperamos verte pronto!\n\n";
        $contenido_cliente .= "Saludos,\n";
        $contenido_cliente .= "Tu Restaurante";

        // Enviar correo de confirmación al cliente
        mail($email, "Confirmación de Reserva", $contenido_cliente);

        // Redireccionar o mostrar un mensaje de éxito
        echo "¡Gracias por tu reserva! Se ha enviado un correo de confirmación a " . $email;
    }
?>

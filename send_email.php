<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email_address'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = $email;
        $subject = "Gracias por suscribirte!";
        $message = "Hola!\n\nGracias por suscribirte. Te mantendremos informado sobre nuestras últimas noticias y ofertas.\n\nSaludos,\nRestaurant Tano's";
        $headers = "From: abrigo.tarazona@gmail.com\r\n";
        $headers .= "Reply-To: abrigo.tarazona@gmail.com\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "Correo enviado con éxito.";
        } else {
            echo "No se pudo enviar el correo.";
        }
    } else {
        echo "Dirección de correo no válida.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>

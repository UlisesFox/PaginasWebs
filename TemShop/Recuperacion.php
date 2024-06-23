<?php

include 'Conexion.php';

if (isset($_POST['correo2'])) {
    $correo2 = $_POST['correo2'];

    // Verificar si el correo2 existe en la base de datos
    $stmt = $connect->prepare("SELECT correo2 FROM registros WHERE correo2 = ?");
    $stmt->bind_param("s", $correo2);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($correo);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        // Generar un código de verificación de 6 dígitos
        $codigo = mt_rand(100000, 999999);
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // El código expira en 1 hora

        // Almacenar el código en la base de datos
        $stmt = $connect->prepare("INSERT INTO password_resets (correo, codigo, expiry) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $correo, $codigo, $expiry);
        $stmt->execute();

        // Enviar el correo electrónico
        $subject = 'Recuperación de Contraseña';
        $message = "Su código de verificación es: $codigo";
        $headers = 'From: ulises_reyes020607@outlook.com' . "\r\n" .
                   'Reply-To: ulises_reyes020607@outlook.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        if (mail($correo2, $subject, $message, $headers)) {
            echo '<script>alert("Se ha enviado un código de verificación a su correo electrónico."); window.location.href = "verificacion.html";</script>';
        } else {
            echo '<script>alert("Se ha enviado un código de verificación a su correo electrónico."); window.location.href = "verificacion.html";</script>';
            //echo '<script>alert("Error al enviar el correo electrónico."); window.location.href = "Recuperacion.html";</script>';
        }
    } else {
        echo '<script>alert("El correo electrónico no está registrado."); window.location.href = "Recuperacion.html";</script>';
    }

    $stmt->close();
    $connect->close();
} else {
    echo '<script>alert("Datos incompletos."); window.location.href = "Recuperacion.html";</script>';
}

?>

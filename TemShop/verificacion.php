<?php

include 'Conexion.php';

if (isset($_POST['codigo']) && isset($_POST['contra'])) {
    $codigo = $_POST['codigo'];
    $contra = $_POST['contra'];

    // Verificar el código
    $stmt = $connect->prepare("SELECT correo, expiry FROM password_resets WHERE codigo = ?");
    $stmt->bind_param("s", $codigo);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($correo, $expiry);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && strtotime($expiry) > time()) {
        // Validar la nueva contraseña
        $regex = '/^(?=.*\d)(?=.*[a-z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/';

        if (preg_match($regex, $contra)) {
            // Hashear la nueva contraseña
            $contra = password_hash($contra, PASSWORD_DEFAULT);

            // Actualizar la contraseña en la base de datos
            $stmt = $connect->prepare("UPDATE registros SET contra = ? WHERE correo2 = ?");
            $stmt->bind_param("ss", $contra, $correo);
            if ($stmt->execute()) {
                // Eliminar el código de la base de datos
                $stmt = $connect->prepare("DELETE FROM password_resets WHERE codigo = ?");
                $stmt->bind_param("s", $codigo);
                $stmt->execute();

                header('location: Login.html');
            } else {
                echo '<script>alert("Error al actualizar la contraseña."); window.location.href = "verificacion.html";</script>';
            }
        } else {
            echo '<script>alert("La contraseña debe contener al menos una minúscula, mayúscula, número, un carácter especial y 8 caracteres como mínimo."); window.location.href = "verificacion.html";</script>';
        }
    } else {
        echo '<script>alert("Código no válido o caducado."); window.location.href = "Recuperacion.html";</script>';
    }

    $stmt->close();
    $connect->close();
} else {
    echo '<script>alert("Datos incompletos."); window.location.href = "verificacion.html";</script>';
}

?>
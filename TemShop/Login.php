<?php
// Incluir el archivo de conexión a la base de datos
include 'Conexion.php';

// Iniciar la sesión
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los datos POST existen antes de usarlos
    if (isset($_POST['correo']) && isset($_POST['contra'])) {
        $correo = $_POST['correo'];
        $contra = $_POST['contra'];

        // Preparar la consulta SQL para evitar la inyección de SQL
        $stmt = $connect->prepare("SELECT id, correo, contra, Tipo FROM registros WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();

            // Verificar la contraseña usando password_verify
            if (password_verify($contra, $usuario['contra'])) {
                // Almacenar los datos del usuario en la sesión
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['correo'] = $usuario['correo'];
                $_SESSION['Tipo'] = $usuario['Tipo'];

                $stmt->close();
                $connect->close();

                // Redirigir según el tipo de usuario
                if ($_SESSION['Tipo'] == '1') {
                    header("Location: PagPrincipalG.php");
                } else if ($_SESSION['Tipo'] == '2') {
                    header("Location: PagPrincipalA.php");
                } else {
                    header("Location: PagPrincipal.php");
                }
                exit();
            } else {
                // Contraseña incorrecta
                echo '<script>alert("Correo o contraseña incorrectos."); window.location.href = "Login.html";</script>';
            }
        } else {
            // Usuario no encontrado
            echo '<script>alert("Correo o contraseña incorrectos."); window.location.href = "Login.html";</script>';
        }

        $stmt->close();
    } else {
        echo '<script>alert("Por favor complete todos los campos."); window.location.href = "Login.html";</script>';
    }

    $connect->close();
} else {
    echo '<script>alert("Método de solicitud no válido."); window.location.href = "Login.html";</script>';
}
?>
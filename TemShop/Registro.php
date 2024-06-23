<?php

include 'Conexion.php';

// Función para validar el correo electrónico
function validarEmail($email) {
    $regex = '/^([\w\.-_]+)@([a-z\d-]+)\.([a-z]{2,6})(\.[a-z]{2,6})?$/i';
    return preg_match($regex, $email) === 1;
}

// Verificar si los datos POST existen antes de usarlos
if (isset($_POST["nombreu"]) && isset($_POST["nombres"]) && isset($_POST["apellidop"]) && isset($_POST["apellidom"]) && isset($_POST["edad"]) && isset($_POST["fecha"]) && isset($_POST["correo"]) && isset($_POST["correo2"]) && isset($_POST["contra"])) {
    $nombreu = $_POST["nombreu"];
    $nombres = $_POST["nombres"];
    $apellidop = $_POST["apellidop"];
    $apellidom = $_POST["apellidom"];
    $edad = $_POST["edad"];
    $fecha = $_POST["fecha"];
    $correo = $_POST["correo"];
    $correo2 = $_POST["correo2"];
    $contra = $_POST["contra"];

    // Validar los correos electrónicos
    if (validarEmail($correo) && validarEmail($correo2)) {
        // Verificar si el nombre de usuario o los correos electrónicos ya existen
        $stmt = $connect->prepare("SELECT * FROM registros WHERE nombreu = ? OR correo = ? OR correo2 = ?");
        $stmt->bind_param("sss", $nombreu, $correo, $correo2);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Si existe una coincidencia, enviar una alerta y redirigir
            echo '<script>alert("El nombre de usuario o el correo electrónico ya existen."); window.location.href = "Registro.html";</script>';
        } else {
            // Expresión regular para validar la contraseña
            $regex = '/^(?=.*\d)(?=.*[a-z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/';

            // Validar la contraseña
            if (preg_match($regex, $contra)) {
                // Hashear la contraseña
                $contraHashed = password_hash($contra, PASSWORD_DEFAULT);

                // Preparar la consulta SQL
                $stmt = $connect->prepare("INSERT INTO registros (nombreu, nombres, apellidop, apellidom, edad, fecha, correo, correo2, contra) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                if ($stmt) {
                    // Bindear los parámetros
                    $stmt->bind_param("sssssssss", $nombreu, $nombres, $apellidop, $apellidom, $edad, $fecha, $correo, $correo2, $contraHashed);

                    // Ejecutar la consulta
                    if ($stmt->execute()) {
                        header('location: Login.html');
                    } else {
                        header('location: Registro.html');
                    }

                    // Cerrar la declaración
                    $stmt->close();
                } else {
                    header('location: Registro.html');
                }
            } else {
                // Si la contraseña no cumple con los requisitos, enviar una alerta y redirigir
                echo '<script>alert("El password debe contener minúscula, mayúscula, número, un carácter especial y ser mayor a 8 caracteres."); window.location.href = "Registro.html";</script>';
            }
        }
        // Cerrar la declaración
        $stmt->close();
    } else {
        // Si los correos electrónicos no son válidos, enviar una alerta y redirigir
        echo '<script>alert("El correo electrónico no es válido."); window.location.href = "Registro.html";</script>';
    }

    // Cerrar la conexión
    $connect->close();
} else {
    echo '<script>alert("Datos incompletos."); window.location.href = "Registro.html";</script>';
}

?>
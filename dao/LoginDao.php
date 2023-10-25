<?php
require_once '../util/ConexionBD.php'; 
// Asegúrate de incluir el archivo de la clase de conexión.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    $conexionBD = new ConexionBD();
    $cn = $conexionBD->getConexionBD();

    if (validarUsuario($cn, $usuario, $contrasena)) {
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: ../app/controlador/usu_controlador.php?accion=navegar_a_cursos");
    } else {
        echo "Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
    }
}

function validarUsuario($cn, $usuario, $contrasena) {
    // Utiliza la conexión a la base de datos para verificar las credenciales
    $consulta = "SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?";
    $stmt = mysqli_prepare($cn, $consulta);
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
        return true;
    } else {
        return false;
    }
}
?>

<?php

require_once('../util/ConexionBD.php'); 
// Búsqueda en la base de datos
class ConsultaBD
{
    public function obtenerNombresPorFiltro($filtro)
    {
        $conexionBD = new ConexionBD();
        $cn = $conexionBD->getConexionBD();

        if ($cn) {
            $filtro = mysqli_real_escape_string($cn, $filtro); // Evitar inyección SQL

            $query = "SELECT nombre FROM area WHERE nombre LIKE '$filtro%'";
            $result = mysqli_query($cn, $query);

            if ($result) {
                $nombres = array();

                while ($row = mysqli_fetch_assoc($result)) {
                    $nombres[] = $row['nombre'];
                }

                mysqli_free_result($result);
                mysqli_close($cn);

                return $nombres;
            } else {
                mysqli_close($cn);
                return false;
            }
        } else {
            return false;
        }
    }
}

// Uso de la clase para obtener nombres por filtro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"));

    if ($data && isset($data->filter)) {
        $consultaBD = new ConsultaBD();
        $nombres = $consultaBD->obtenerNombresPorFiltro($data->filter);

        if ($nombres !== false) {
            // Devolver los nombres encontrados como respuesta JSON
            header('Content-Type: application/json');
            echo json_encode($nombres);
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            echo json_encode(array("message" => "Error en la consulta"));
        }
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo json_encode(array("message" => "Parámetros incorrectos"));
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo json_encode(array("message" => "Método no permitido"));
}
?>

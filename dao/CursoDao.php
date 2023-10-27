<?php

require_once '../util/ConexionBD.php';
require_once '../bean/CursoBean.php';

class CursoDao
{

    public  function  ListarCursos()
    {
        try {
            $sql = "select * from curso";
            $objc = new ConexionBD();
            $cn = $objc->getConexionBD();
            $rs = mysqli_query($cn, $sql);
    
            $lista = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                $lista[] = $fila;
            }
            mysqli_close($cn);
        } catch (Exception $cn) {
            // Manejo de errores
        }
        return $lista;

    }

    public function EliminarCursos($codigo)
   {
    }

    public  function  ModificarCursos()
    {

    }

    public  function  AgregarCursos($objCursoBean)
    {
        // Obtiene los valores del objeto CursoBean
        $codCurso = $objCursoBean->getCodCurso();
        $nombCurso = $objCursoBean->getNomCurso();
        $grupoCurso = $objCursoBean->getGrupoCurso();
        $horaEntrada = $objCursoBean->getHoraEntrada();
        $horaSalida = $objCursoBean->getHoraSalida();
        $modoCurso = $objCursoBean->getModoCurso();
        $diaCurso = $objCursoBean->getDiaCurso();
        $profesorApe = $objCursoBean->getProfesorApe();
        $profesorNomb = $objCursoBean->getProfesorNomb();
        $codArea = $objCursoBean->getCodArea();
        // Utiliza la instancia de ConexionBD que ya tienes
        $objc = new ConexionBD();
        $cn = $objc->getConexionBD();
        // Construye y ejecuta la consulta SQL para insertar el área en la base de datos
        $sql = "INSERT INTO curso (codigo_curso, nombre, grupo, hora_entrada, hora_salida, modo, dia, profesor_ape, profesor_nomb, codigo_area) 
        VALUES ('$codCurso', '$nombCurso', '$grupoCurso', '$horaEntrada', '$horaSalida', '$modoCurso', '$diaCurso', '$profesorApe', '$profesorNomb', '$codArea')";
        // Ejecuta la consulta SQL
        $res = mysqli_query($cn, $sql);
        
        // Cierra la conexión
        mysqli_close($cn);
        // Devuelve el resultado de la ejecución (true o false, por ejemplo)
        return $res;

    }
}

?>
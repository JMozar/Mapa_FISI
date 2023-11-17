<?php

//require_once '../util/ConexionBD.php';
//require_once '../bean/CursoBean.php';

class CursoDao
{

    public  function  ListarCursos()
    {
        try {
            $sql = "select * from curso  WHERE estado = 'A'";
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
    public  function  ListarCod()
    {
        try {
            $sql = "select * from area";
            $objc = new ConexionBD();
            $cn = $objc->getConexionBD();
            $rs = mysqli_query($cn, $sql);
    
            $lista1 = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                $lista1[] = $fila;
            }
            mysqli_close($cn);
        } catch (Exception $cn) {
            // Manejo de errores
        }
        return $lista1;

    }

    public function EliminarCursos($codCurso)
   {
    $objc = new ConexionBD();
    $cn = $objc->getConexionBD();

    $sql = "UPDATE curso SET estado = 'B'
            WHERE codigo_curso = '$codCurso'";

    $res = mysqli_query($cn, $sql);

    mysqli_close($cn);

    return $res;
    }

    public function EditarCursos($objCursoBean)
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
        
        // Construye y ejecuta la consulta SQL para actualizar el curso en la base de datos
        $sql = "UPDATE curso
                SET nombre = '$nombCurso', grupo = '$grupoCurso', hora_entrada = '$horaEntrada', 
                    hora_salida = '$horaSalida', modo = '$modoCurso', dia = '$diaCurso', 
                    profesor_ape = '$profesorApe', profesor_nomb = '$profesorNomb', codigo_area = '$codArea'
                WHERE codigo_curso = '$codCurso'";
        
        // Ejecuta la consulta SQL
        $res = mysqli_query($cn, $sql);
        
        // Cierra la conexión
        mysqli_close($cn);
        
        // Devuelve el resultado de la ejecución (true o false, por ejemplo)
        return $res;
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

        $sql = "UPDATE curso SET estado = 'A'
        WHERE codigo_curso = '$codCurso'";
        $res = mysqli_query($cn, $sql);
        // Cierra la conexión
        mysqli_close($cn);
        // Devuelve el resultado de la ejecución (true o false, por ejemplo)
        return $res;

    }
}


?>

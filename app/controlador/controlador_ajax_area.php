<?php
 require_once '../../dao/AreaDao.php';
 require_once '../../util/ConexionBD.php';
 $codigo=$_POST['codigo'];



$objAreaDao=new AreaDao();
$lista=$objAreaDao->infoArea($codigo);

$cursos=$objAreaDao->cursosArea($codigo);

foreach($lista  as $reg  ){}

echo '<p class="cabecera_salon">'.$reg['nombre'].'</p>';


    echo   '
            <u><b>DETALLES:</b></u><br>
            <table class="table table_bordered">
            <tr>
            <td>Pabellón:</td><td>'.$reg['pabellon'].'</td>
            </tr>
            <tr>
            <td>Aforo:</td><td>'.$reg['aforo'].' personas</td>
            </tr>
            <tr>
            <td>Piso:</td><td>'.$reg['piso'].'° piso</td>
            </tr>
            </table>
            <td><u><b>ACTIVIDADES:</b></u></td><br>';

    if($cursos!=null){
        foreach($cursos as $reg2){
        echo 
       '<table class="table table_bordered">
        <tr><td>Codigo: </td><td>'.$reg2['codigo_curso'].'</td></tr>
        <tr><td>Curso: </td><td>'.$reg2['nombre'].'</td></tr>
        <tr><td>Grupo: </td><td>'.$reg2['grupo'].'°</td></tr>
        <tr><td>Docente:</td><td>'.$reg2['profesor_ape'].'</td></tr>
        <tr><td></td><td>'.$reg2['profesor_nomb'].'</td></tr>
        <tr><td>Tipo:</td><td>'.$reg2['modo'].'</td></tr>
        <tr><td>Dia:</td><td>'.$reg2['dia'].'</td></tr>
        <tr><td>Inicio:</td><td>'.$reg2['hora_entrada'].'</td></tr>
        <tr><td>Fin:</td><td>'.$reg2['hora_salida'].'</td></tr><br></table>';
        }
        //echo $reg2['hora_entrada']." ".$reg2['nombre'];
    }else{
        echo "NO SE REALIZA NINGUN CURSO EN ESTA AREA.";
    }
    

?>


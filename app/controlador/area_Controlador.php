<?php
session_start();//me permite  iniciar una  sesion
require_once "../../util/ConexionBD.php";
require_once '../../dao/AreaDao.php';
require_once '../../bean/AreaBean.php';

$op=$_REQUEST['op'];

switch($op)
{
  case 1: {//mostrar;
    $objAreaDao=new AreaDao();
    $lista=$objAreaDao->ListarAreas();
    $_SESSION['LISTA']=$lista; // estoy guardado en  SEsion;
    //$_SESSION['LISTA1']=$lista1; // estoy guardado en  SEsion;
    header('Location:../vista/frm_areas.php');
    
    break;}

case 2: {//eliminar;
    $objAreaDao = new AreaDao();
  
    $codArea = $_POST["codigo_area"]; // Obtén el código del área a eliminar
  
    // Llama a un método en AreaDao para eliminar el área
    $res = $objAreaDao->EliminarAreas($codArea);
  
    if ($res) {
        $response["estado"] = "Área eliminada correctamente";
    } else {
        $response["estado"] = "Error al eliminar el área";
    }
  
    echo json_encode($response);
  
    // Redirige a la página frm_areas.php
    $objAreaDao = new AreaDao();
    $lista = $objAreaDao->ListarAreas();
    $_SESSION['LISTA'] = $lista;
    header('Location:../vista/frm_areas.php');
    break;
}

    case 3: {//editar;
      $objAreaDao = new AreaDao();
  
      $codArea = $_POST["campo1"];
      $aforo = $_POST["campo2"];
      $nombArea = $_POST["campo3"];
      $tipoArea = $_POST["campo4"];
      $pabellonArea = $_POST["campo5"];
      $piso = $_POST["campo6"];
      $notas = $_POST["campo7"];
  
      $objAreaBean = new AreaBean();
      $objAreaBean->setCodArea($codArea);
      $objAreaBean->setAforo($aforo);
      $objAreaBean->setNombArea($nombArea);
      $objAreaBean->setTipoArea($tipoArea);
      $objAreaBean->setPabellonArea($pabellonArea);
      $objAreaBean->setPiso($piso);
      $objAreaBean->setNotas($notas);
  
      $res = $objAreaDao->EditarAreas($objAreaBean);
      $response["estado"]=$men;
      echo json_encode($response);
  
      $objAreaDao = new AreaDao();
      $lista = $objAreaDao->ListarAreas();
      $_SESSION['LISTA'] = $lista; // Estoy guardando en la sesión;
      header('Location:../vista/frm_areas.php');
  
      break;
  }
  


    case 4: {//agregar
      $objAreaDao = new AreaDao();
      
      $codArea = $_POST["campo1"];
      $aforo = $_POST["campo2"];
      $nombArea = $_POST["campo3"];
      $tipoArea = $_POST["campo4"];
      $pabellonArea = $_POST["campo5"];
      $piso = $_POST["campo6"];
      $notas = $_POST["campo7"];
      $objAreaBean=new AreaBean();
      $objAreaBean->setCodArea($codArea);
      $objAreaBean->setNombArea($nombArea);
      $objAreaBean->setTipoArea($tipoArea);
      $objAreaBean->setPabellonArea($pabellonArea);
      $objAreaBean->setPiso($piso);
      $objAreaBean->setAforo($aforo);
      $objAreaBean->setNotas($notas);
      $res = $objAreaDao->AgregarAreas($objAreaBean);
      $response["estado"]=$men;
      echo json_encode($response);

      $objAreaDao=new AreaDao();
      $lista=$objAreaDao->ListarAreas();
      $_SESSION['LISTA']=$lista; // estoy guardado en  SEsion;
      // Redirige a la página frm_areas.php
      header('Location:../vista/frm_areas.php');
      break;
  }

  case 5: {  
    $objAreaDao=new AreaDao();
    $lista=$objAreaDao->ListarPersonas();
    $_SESSION['LISTA']=$lista; // estoy guardado en  SEsion;
    header('Location:../vista/frm_mapa.php');
    break;}  
      
}

?>

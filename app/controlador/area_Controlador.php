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
    header('Location:../vista/frm_areas.php');
    
    break;}
  case 2: {//eliminar;
    break;}
  case 3: {//editar;
    break;}
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

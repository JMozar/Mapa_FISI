<?php
session_start();//me permite  iniciar una  sesion
require_once "../../util/ConexionBD.php";
require_once '../../dao/AreaDao.php';
require_once '../../bean/AreaBean.php';

$op=$_REQUEST['op'];

switch($op)
{
  case 1: {//mostrar;
    break;}
  case 2: {//eliminar;
    break;}
  case 3: {//editar;
    break;}
  case 4: {//agregar;
    break;}
  case 5: {  
    $objAreaDao=new AreaDao();
    $lista=$objAreaDao->ListarPersonas();
    $_SESSION['LISTA']=$lista; // estoy guardado en  SEsion;
    header('Location:../vista/frm_mapa.php');
    break;}  
      
}

?>

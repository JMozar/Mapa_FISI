<?php

session_start();//me permite  iniciar una  sesion
require_once "../../util/ConexionBD.php";

require_once '../../dao/CursoDao.php';
require_once '../../bean/CursoBean.php';

$op=$_REQUEST['op'];

switch($op)
{
  case 1: {//mostrar;
    $objCursoDao=new CursoDao();
    $lista=$objCursoDao->ListarCursos();
    $_SESSION['LISTA']=$lista; // estoy guardado en  SEsion;
    header('Location:../vista/frm_cursos.php');

    break;}
  case 2: {//eliminar;
    break;}
  case 3: {//editar;
    break;}

    case 4: // Agregar un curso
      {
      $objCursoDao = new CursoDao();
  
      // Obtén los valores del formulario
      $codCurso = $_POST["campo1"];
      $nombCurso = $_POST["campo3"];
      $grupoCurso = $_POST["campo4"];
      $horaEntrada = $_POST["campo7"];
      $horaSalida = $_POST["campo8"];
      $modoCurso = $_POST["campo5"];
      $diaCurso = $_POST["campo6"];
      $profesorApe = $_POST["campo9"];
      $profesorNomb = $_POST["campo10"];
      $codArea = $_POST["campo2"]; // Asumiendo que el área se selecciona en "campo2"
  
      // Crea un objeto CursoBean y asigna los valores
      $objCursoBean = new CursoBean();
      $objCursoBean->setCodCurso($codCurso);
      $objCursoBean->setNombCurso($nombCurso);
      $objCursoBean->setGrupoCurso($grupoCurso);
      $objCursoBean->setHoraEntrada($horaEntrada);
      $objCursoBean->setHoraSalida($horaSalida);
      $objCursoBean->setModoCurso($modoCurso);
      $objCursoBean->setDiaCurso($diaCurso);
      $objCursoBean->setProfesorApe($profesorApe);
      $objCursoBean->setProfesorNomb($profesorNomb);
      $objCursoBean->setCodArea($codArea);
  
      $res = $objCursoDao->AgregarCursos($objCursoBean);
      $response["estado"]=$men;
      echo json_encode($response);


      // Redirige a la página frm_areas.php
      $objCursoDao=new CursoDao();
      $lista=$objCursoDao->ListarCursos();
      $_SESSION['LISTA']=$lista; // estoy guardado en  SEsion;
      header('Location:../vista/frm_cursos.php');
      break;
    }
  }

?>

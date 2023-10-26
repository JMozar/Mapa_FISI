<?php 
 session_start();// la sesion se esta manteniendo activa
 $lista=$_SESSION['LISTA'];
 require_once '../../dao/AreaDao.php';
 require_once '../../dao/CursoDao.php';
 require_once '../../util/ConexionBD.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link rel="stylesheet" href="../../public/css/estilo_curso.css">
    <!--Agregar BootStrap al proyecto (CSS)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
        <script>
        function redirigir_cursos() {
        window.location.href = "../controlador/curso_controlador.php?op=1";
        }
        function redirigir_areas() {
            window.location.href = "../controlador/area_Controlador.php?op=1";
        }
        function redirigir_login() {
        window.location.href = "../controlador/usu_controlador.php?accion=navegar_a_login";
        }
        function abrirModal() {
        var modal = document.getElementById('modalAgregarArea');
        modal.style.display = 'block';
        }

        function cerrarModal() {
        var modal = document.getElementById('modalAgregarArea');
        modal.style.display = 'none';
        }
    </script>
</head>
<body id="body">
<header>
        <div id="cabecera">
            <img src="../../public/img/logo-fisi.png" alt="Logo de la FISI">
            <h3>Mapa Interactivo de la FISI</h3>
            <button onclick="redirigir_login()"><img src="../../public/img/usuario.png" alt="imagen" >Cerrar sesión</button>   
        </div>
    </header>
    <div class="contenedor">
        <article>
        <div class="boton-bloque" onclick="redirigir_cursos()" style="background-color: #68141C; color: white;">Cursos</div>
        <div class="boton-bloque" onclick="redirigir_areas()">Áreas</div>
          </article>
    <aside>
        <div>
            <h2 class="h2_aside">ADMINISTRACIÓN DE CURSOS</h2>  
            <div class="boton-bloque-agregar" onclick="abrirModal()">Agregar Curso</div>       
        </div>
        <table class="tabla_aside">
            <center>
            <tr>
                <td>Código</td>
                <td>Nombre</td>
                <td>Grupo</td>
                <td>Entrada</td>
                <td>Salida</td>
                <td>Modo</td>
                <td>Día</td>
                <td colspan="2">Profesor</td>
                <td>id_area</td>
                <td>Acción</td>
            </tr>
    <?php
            foreach ($lista as $reg) {
        echo '<tr id="fila">';
        echo '<td>' . $reg['codigo_curso'] . '</td>';
        echo '<td>' . $reg['nombre'] . '</td>';
        echo '<td>' . $reg['grupo'] . '</td>';
        echo '<td>' . $reg['hora_entrada'] . '</td>';
        echo '<td>' . $reg['hora_salida'] . '</td>';
        echo '<td>' . $reg['modo'] . '</td>';
        echo '<td>' . $reg['dia'] . '</td>';
        echo '<td>' . $reg['profesor_ape'] . '</td>';
        echo '<td>' . $reg['profesor_nomb'] . '</td>';
        echo '<td>' . $reg['codigo_area'] . '</td>';
        echo '<td><img src="/public/img/editar.png"><img src="/public/img/eliminar.png"></td>';
        echo '</tr>';
    }
    ?> 
            
        </center>
        </table>      
    </aside>
    </div>
<!-- Modal para agregar áreas -->
<form method="POST" action="../controlador/curso_controlador.php?op=4">
<div class="modal" id="modalAgregarArea" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="position: relative;left: 25%; font-size: 28px;">DATOS DEL CURSO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <label for="campo1" id="campo1text">Código:</label>
            <label for="campo2"style="position: relative;right: 5%" id="campo2text">Área:</label>
            <br>
            <input type="text" id="campo1" name="campo1" placeholder="Codigo del curso" required>

            <select id="campo2" name="campo2" placeholder="Selección">
            <option value="">Selección</option>
            <option value="SA105">Aula 105</option>
            <option value="opcion2">Aula 103</option>
            <option value="opcion3">LAB 04</option>
            </select>
    </div>



            <label for="campo3" id="campo3text">Nombre del curso:</label>
            <input type="text" id="campo3" name="campo3" required>
            <br>
            <label for="campo9" id="campo3text">Apellido del Profesor:</label>
            <input type="text" id="campo9" name="campo9" required>
            <br>
            <label for="campo10" id="campo3text">Nombre del Profesor:</label>
            <input type="text" id="campo10" name="campo10" required>



    <div class="modal-body">
        <label for="campo4" id="campo4text">Grupo:</label>
        <label for="campo5" id="campo5text">Modo:</label>
        <label for="campo6" id="campo6text">Dia:</label>
        <br>
            <select id="campo4" name="campo4" >
            <option value="">Selección</option>
            <option value=1>1</option>
            <option value=2>2</option>
        </select>

   
        
            <select id="campo5" name="campo5" >
            <option value="">Selección</option>
            <option value="TEO">Teoría</option>
            <option value="LABO">Laboratorio</option>
        </select>
 
    
            <select id="campo6" name="campo6" >
            <option value="">Selección</option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sabado">Sábado</option>
        </select>

        </div>
  
        <div class="modal-body">
    <label for="campo7" id="campo7text">Hora Inicio:</label>
    <label for="campo8" id="campo8text">Hora Fin:</label>
    <br>

            <select id="campo7" name="campo7"  >
            <option value="">Selección</option>
            <option value="08:00:00">08:00 AM</option>
            <option value="09:00:00">09:00 AM</option>
            <option value="10:00:00">10:00 AM</option>
            <option value="11:00:00">11:00 AM</option>
            <option value="12:00:00">12:00 AM</option>
            <option value="13:00:00">1:00 PM</option>
        </select>

    
            <select id="campo8" name="campo8" >
            <option value="">Selección</option>
            <option value="09:00:00">09:00 AM</option>
            <option value="10:00:00">10:00 AM</option>
            <option value="11:00:00">11:00 AM</option>
            <option value="12:00:00">12:00 AM</option>
            <option value="13:00:00">1:00 PM</option>
            <option value="14:00:00">2:00 PM</option>
        </select>
        </div>
  
        <br>
        <button type="submit" class="btn btn-primary" style="background-color: #68141C;position: relative;left: 42%; width:100px;bottom:20px" name="btnagregar" value="ok" >Listo</button>
      </div>
    </div>
  </div>
  </div>
    </aside>
    </div>
</form>
    <footer>
        Mapa Interactivo de la fisi
    </footer>
</body>
</html>
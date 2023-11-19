<?php 
 session_start();// la sesion se esta manteniendo activa
 $lista=$_SESSION['LISTA'];
 $lista1=$_SESSION['LISTA1'];
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

        function eliminarCookies() {
            document.cookie = 'recordar_usuario=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            document.cookie = 'recordar_contrasena=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
        }
    
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

        function cargarD(){
            window.location.href = "../controlador/curso_Controlador.php?op=5";
        }

        function abrirEditar(button) {
    var modal = document.getElementById('modalEditarCurso');

    // Obtener los valores de los atributos de datos del botón
    var codigoCurso = button.getAttribute('data-codigo-curso');
    var codigoArea = button.getAttribute('data-codigo-area');
    var nombreCurso = button.getAttribute('data-nombre-curso');
    var grupoCurso = button.getAttribute('data-grupo-curso');
    var modoCurso = button.getAttribute('data-modo-curso');
    var diaCurso = button.getAttribute('data-dia-curso');
    var horaEntrada = button.getAttribute('data-hora-entrada');
    var horaSalida = button.getAttribute('data-hora-salida');
    var profesorApe = button.getAttribute('data-profesor-ape');
    var profesorNomb = button.getAttribute('data-profesor-nomb');

    // Rellenar los campos del modal con los valores
    document.getElementById('campo1').value = codigoCurso;
    document.getElementById('campo2').value = codigoArea;
    document.getElementById('campo3').value = nombreCurso;
    document.getElementById('campo4').value = grupoCurso;
    document.getElementById('campo5').value = modoCurso;
    document.getElementById('campo6').value = diaCurso;
    document.getElementById('campo7').value = horaEntrada;
    document.getElementById('campo8').value = horaSalida;
    document.getElementById('campo9').value = profesorApe;
    document.getElementById('campo10').value = profesorNomb;

    modal.style.display = 'block';
}


        function cerrarEditar() {
        var modal = document.getElementById('modalEditarCurso');
        modal.style.display = 'none';
        }


    </script>
</head>
<body id="body">
<header>
        <div id="cabecera">
            <img src="../../public/img/logo-fisi.png" alt="Logo de la FISI">
            <h3>Mapa Interactivo de la FISI</h3>
            <button onclick="eliminarCookies(),redirigir_login()"><img src="../../public/img/usuario.png" alt="imagen" >Cerrar sesión</button>   
        </div>
    </header>
    <div class="contenedor">
        <aside>
        <div class="boton-bloque" onclick="redirigir_cursos() ,cargarD()" style="background-color: #68141C; color: white;">Cursos</div>
        <div class="boton-bloque" onclick="redirigir_areas()">Áreas</div>
          </aside>
    <article>
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
        echo '<td> <button class="boton-editar" onclick="abrirEditar(this)" ' .
            'data-codigo-curso="' . $reg['codigo_curso'] . '" ' .
            'data-codigo-area="' . $reg['codigo_area'] . '" ' .
            'data-nombre-curso="' . $reg['nombre'] . '" ' .
            'data-grupo-curso="' . $reg['grupo'] . '" ' .
            'data-modo-curso="' . $reg['modo'] . '" ' .
            'data-dia-curso="' . $reg['dia'] . '" ' .
            'data-hora-entrada="' . $reg['hora_entrada'] . '" ' .
            'data-hora-salida="' . $reg['hora_salida'] . '" ' .
            'data-profesor-ape="' . $reg['profesor_ape'] . '" ' .
            'data-profesor-nomb="' . $reg['profesor_nomb'] . '"><img src="/public/img/editar.png" alt="Editar"></button>';
            echo '<td>' .
            '<form method="POST" action="../controlador/curso_controlador.php?op=2" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este curso?\');">' .
            '<input type="hidden" name="codigo_curso" value="' . $reg['codigo_curso'] . '">' .
            '<button type="submit" class="boton-eliminar"> <img src="/public/img/eliminar.png" alt="Eliminar"></button>' .
            '</form>' .
            '</td>';
             
        echo '</tr>';
    }
    ?> 
            
        </center>
        </table>      
    </article>
    </div>

<!-- Modal para editar cursos -->
<form method="POST" action="../controlador/curso_controlador.php?op=3">
<div class="modal" id="modalEditarCurso" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="position: relative;left: 25%; font-size: 28px;">EDITAR CURSO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarEditar()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <label for="campo1" id="campo1text">Código:</label>
            <label for="campo2"style="position: relative;right: 5%" id="campo2text">Área:</label>
            <br>
            <input type="text" id="campo1" name="campo1" placeholder="Codigo del curso" required oninput="this.value = this.value.toUpperCase();">

            <select id="campo2" name="campo2" placeholder="Selección">
            <option value="">Selección</option>

            <?php
            foreach ($lista1 as $reg) {
        echo '<option value=' . $reg['codigo_area'] . '>' . $reg['nombre'] . '</option>';
    }
    ?> 
            </select>
    </div>


            <label for="campo3" id="campo3text">Nombre del curso:</label>
            <input type="text" id="campo3" name="campo3" required oninput="this.value = this.value.toUpperCase();">
            <br>
            <label for="campo9" id="campo3text">Apellido del Profesor:</label>
            <input type="text" id="campo9" name="campo9" required oninput="this.value = this.value.toUpperCase();">
            <br>
            <label for="campo10" id="campo3text">Nombre del Profesor:</label>
            <input type="text" id="campo10" name="campo10" required oninput="this.value = this.value.toUpperCase();">



    <div class="modal-body">
        <label for="campo4" id="campo4text">Grupo:</label>
        <label for="campo5" id="campo5text">Modo:</label>
        <label for="campo6" id="campo6text">Dia:</label>
        <br>
            <select id="campo4" name="campo4" >
            <option value="">Selección</option>
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
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
            <select id="campo7" name="campo7" >
            <option value="">Selección</option>
            <option value="08:00:00">08:00 AM</option>
            <option value="09:00:00">09:00 AM</option>
            <option value="10:00:00">10:00 AM</option>
            <option value="11:00:00">11:00 AM</option>
            <option value="12:00:00">12:00 AM</option>
            <option value="13:00:00">1:00 PM</option>
            <option value="14:00:00">2:00 PM</option>
            <option value="15:00:00">3:00 PM</option>
            <option value="16:00:00">4:00 PM</option>
            <option value="17:00:00">5:00 PM</option>
            <option value="18:00:00">6:00 PM</option>
            <option value="19:00:00">7:00 PM</option>
            <option value="20:00:00">8:00 PM</option>
            <option value="21:00:00">9:00 PM</option>
            </select>
    
            <select id="campo8" name="campo8" >
            <option value="">Selección</option>
            <option value="09:00:00">09:00 AM</option>
            <option value="10:00:00">10:00 AM</option>
            <option value="11:00:00">11:00 AM</option>
            <option value="12:00:00">12:00 AM</option>
            <option value="13:00:00">1:00 PM</option>
            <option value="14:00:00">2:00 PM</option>
            <option value="15:00:00">3:00 PM</option>
            <option value="16:00:00">4:00 PM</option>
            <option value="17:00:00">5:00 PM</option>
            <option value="18:00:00">6:00 PM</option>
            <option value="19:00:00">7:00 PM</option>
            <option value="20:00:00">8:00 PM</option>
            <option value="21:00:00">9:00 PM</option>
            <option value="22:00:00">10:00 PM</option>
        </select>
        </div>
  
        <br>
        <button type="submit" class="btn btn-primary" style="background-color: #68141C;position: relative;left: 42%; width:100px;bottom:10px" name="btnGuardar" value="ok" >Guardar</button>
      </div>
    </div>
  </div>
  </div>
  </aside>
    </div>
</form>
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
            <input type="text" id="campo1" name="campo1" placeholder="Codigo del curso" required oninput="this.value = this.value.toUpperCase();">

            <select id="campo2" name="campo2" placeholder="Selección">
            <option value="">Selección</option>
            <?php
            foreach ($lista1 as $reg) {
        echo '<option value=' . $reg['codigo_area'] . '>' . $reg['nombre'] . '</option>';
    }
    ?> 
            </select>
    </div>



            <label for="campo3" id="campo3text">Nombre del curso:</label>
            <input type="text" id="campo3" name="campo3" required oninput="this.value = this.value.toUpperCase();">
            <br>
            <label for="campo9" id="campo3text">Apellido del Profesor:</label>
            <input type="text" id="campo9" name="campo9" required oninput="this.value = this.value.toUpperCase();">
            <br>
            <label for="campo10" id="campo3text">Nombre del Profesor:</label>
            <input type="text" id="campo10" name="campo10" required oninput="this.value = this.value.toUpperCase();">



    <div class="modal-body">
        <label for="campo4" id="campo4text">Grupo:</label>
        <label for="campo5" id="campo5text">Modo:</label>
        <label for="campo6" id="campo6text">Dia:</label>
        <br>
            <select id="campo4" name="campo4" >
            <option value="">Selección</option>
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
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
            <option value="14:00:00">2:00 PM</option>
            <option value="15:00:00">3:00 PM</option>
            <option value="16:00:00">4:00 PM</option>
            <option value="17:00:00">5:00 PM</option>
            <option value="18:00:00">6:00 PM</option>
            <option value="19:00:00">7:00 PM</option>
            <option value="20:00:00">8:00 PM</option>
            <option value="21:00:00">9:00 PM</option>
        </select>

    
            <select id="campo8" name="campo8" >
            <option value="">Selección</option>
            <option value="09:00:00">09:00 AM</option>
            <option value="10:00:00">10:00 AM</option>
            <option value="11:00:00">11:00 AM</option>
            <option value="12:00:00">12:00 AM</option>
            <option value="13:00:00">1:00 PM</option>
            <option value="14:00:00">2:00 PM</option>
            <option value="15:00:00">3:00 PM</option>
            <option value="16:00:00">4:00 PM</option>
            <option value="17:00:00">5:00 PM</option>
            <option value="18:00:00">6:00 PM</option>
            <option value="19:00:00">7:00 PM</option>
            <option value="20:00:00">8:00 PM</option>
            <option value="21:00:00">9:00 PM</option>
            <option value="22:00:00">10:00 PM</option>
        </select>
        </div>
  
        <br>

        <button type="submit" class="btn btn-primary" style="background-color: #68141C;position: relative;left: 42%; width:100px;bottom:10px" name="btnagregar" value="ok">Listo</button>

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

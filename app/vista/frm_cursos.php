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
        window.location.href = "../controlador/usu_controlador.php?accion=navegar_a_cursos";
        }
        function redirigir_areas() {
        window.location.href = "../controlador/usu_controlador.php?accion=navegar_a_areas";
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
                <td>Profesor</td>
                <td>id_area</td>
                <td>Acción</td>
            </tr>
            <tr id="fila">
                <td>202W1003T</td>
                <td>PRÁCTICA PRE PROFESIONAL</td>
                <td>1</td>
                <td>14:00</td>
                <td>16:00</td>
                <td>TEO</td>
                <td>SÁBADO</td>
                <td>MURAKAMI DE LA CRUZ, SUMIKO ELIZABETH </td>
                <td>SA105</td>
                <td><img src="/public/img/editar.png"><img src="/public/img/eliminar.png"></td>              
            </tr>
            <tr id="fila">
                <td>202W0701T</td>
                <td>ARQUITECTURA DE SOFTWARE</td>
                <td>1</td>
                <td>8:00</td>
                <td>12:00</td>
                <td>TEO</td>
                <td>SÁBADO</td>
                <td>MENENDEZ MUERAS, ROSA </td>
                <td>SA102</td>
                <td><img src="/public/img/editar.png"><img src="/public/img/eliminar.png"></td>              
            </tr>
            
        </center>
        </table>      
    </aside>
    </div>
<!-- Modal para agregar áreas -->
<div class="modal" id="modalAgregarArea">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="position: relative;left: 25%; font-size: 28px;">DATOS DEL CUSO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div>
            <label for="campo1">Código:</label>
            <input type="text" id="campo1" name="campo1" placeholder="Codigo del curso">
        </div>
        <div>
            <label for="campo2"style="position: relative;right: 5%">Área:</label>
            <select id="campo2" name="campo2" placeholder="Selección">
            <option value="">Selección</option>
            <option value="opcion1">Aula 101</option>
            <option value="opcion2">Aula 103</option>
            <option value="opcion3">LAB 04</option>
            </select>
    </div>
        </form>
    <br>
        <form>
        <div>
            <label for="campo3">Nombre:</label>
            <input type="text" id="campo3" name="campo3" placeholder="Nombre del curso">
        </div>
    </form>
    <br>
        <form>
        <div>
        <label for="campo4">Grupo:</label>
            <select id="campo4" name="campo4" >
            <option value="">Selección</option>
            <option value="opcion1">1</option>
            <option value="opcion2">2</option>
        </select>
        </div>
        <div>
        <label for="campo5">Modo:</label>
            <select id="campo5" name="campo5" >
            <option value="">Selección</option>
            <option value="opcion1">Teoría</option>
            <option value="opcion2">Práctica</option>
        </select>
    </div>
    <div>
    <label for="campo6">Dia:</label>
            <select id="campo6" name="campo6" >
            <option value="">Selección</option>
            <option value="opcion1">Lunes</option>
            <option value="opcion2">Martes</option>
            <option value="opcion3">Miercoles</option>
            <option value="opcion4">Jueves</option>
            <option value="opcion5">Viernes</option>
            <option value="opcion6">Sábado</option>
        </select>
    </div>
        </form>
        <br>
        <form>
    <div>
    <label for="campo7">Hora Inicio:</label>
            <select id="campo7" name="campo7" >
            <option value="">Selección</option>
            <option value="opcion1">08:00 AM</option>
            <option value="opcion2">09:00 AM</option>
            <option value="opcion3">10:00 AM</option>
            <option value="opcion4">11:00 AM</option>
            <option value="opcion5">12:00 AM</option>
            <option value="opcion6">1:00 PM</option>
        </select>
    </div>
    <div>
    <label for="campo8">Hora Fin:</label>
            <select id="campo8" name="campo8" >
            <option value="">Selección</option>
            <option value="opcion1">09:00 AM</option>
            <option value="opcion2">10:00 AM</option>
            <option value="opcion3">11:00 AM</option>
            <option value="opcion4">12:00 AM</option>
            <option value="opcion5">1:00 PM</option>
            <option value="opcion6">2:00 PM</option>
        </select>
    </div>
        </form>
        <br>
        <button type="submit" class="btn btn-primary" style="background-color: #68141C;position: relative;left: 44%;">Listo</button>
      </div>
    </div>
  </div>
</div>
    </aside>
    </div>
    <footer>
        Mapa Interactivo de la fisi
    </footer>
</body>
</html>
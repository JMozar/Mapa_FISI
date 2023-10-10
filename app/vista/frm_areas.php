<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Areas</title>
    <link rel="stylesheet" href="../../public/css/estilo_area.css">
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
            <button><img src="../../public/img/usuario.png" alt="imagen">Acceder</button>   
        </div>
    </header>
    <div class="contenedor">
        <article>
            <div class="boton-bloque" onclick="redirigir_cursos()">Cursos</div>
            <div class="boton-bloque" onclick="redirigir_areas()" style="background-color: #68141C; color: white;">Áreas</div>
          </article>
    <aside>
        <div>
            <h2 class="h2_aside">ADMINISTRACIÓN DE ÁREAS</h2>  
            <div class="boton-bloque-agregar" onclick="abrirModal()">Agregar Áreas</div>       
        </div>
        <table class="tabla_aside">
            <center>
            <tr>
                <td>id_area</td>
                <td>Nombre</td>
                <td>Tipo</td>
                <td>Pabellón</td>
                <td>Piso</td>
                <td>Aforo</td>
                <td>Notas</td>
                <td>Acción</td>
            </tr>
            <tr id="fila">
                <td>SA105</td>
                <td>Salón 105</td>
                <td>S</td>
                <td>ANT</td>
                <td>1</td>
                <td>40</td>
                <td>-En mantenimiento</td>
                <td><img src="/public/img/editar.png"><img src="/public/img/eliminar.png"></td>              
            </tr>
            <tr id="fila">
                <td>LA004</td>
                <td>Laboratorio 4</td>
                <td>L</td>
                <td>ANT</td>
                <td>3</td>
                <td>20</td>
                <td>-Támbien llamado CENPRO</td>
                <td><img src="/public/img/editar.png"><img src="/public/img/eliminar.png"></td>              
            </tr>
            
        </center>
        </table>
<!-- Modal para agregar áreas -->
<div class="modal" id="modalAgregarArea">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="position: relative;left: 25%; font-size: 28px;">DATOS DEL ÁREA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div>
            <label for="campo1">Identificador:</label>
            <input type="text" id="campo1" name="campo1" placeholder="ID del área">
        </div>
        <div>
            <label for="campo2"style="position: relative;right: 5%">Aforo:</label>
            <select id="campo2" name="campo2" placeholder="Selección">
            <option value="">Selección</option>
            <option value="opcion1">20 personas</option>
            <option value="opcion2">40 personas</option>
            <option value="opcion3">50 personas</option>
            </select>
    </div>
        </form>
    <br>
        <form>
        <div>
            <label for="campo3">Nombre:</label>
            <input type="text" id="campo3" name="campo3" placeholder="Nombre del área">
        </div>
    </form>
    <br>
        <form>
        <div>
        <label for="campo4">Tipo:</label>
            <select id="campo4" name="campo4" >
            <option value="">Selección</option>
            <option value="opcion1">Aula</option>
            <option value="opcion2">Laboratorio</option>
            <option value="opcion3">Oficina</option>
        </select>
        </div>
        <div>
        <label for="campo5">Pabellón:</label>
            <select id="campo5" name="campo5" >
            <option value="">Selección</option>
            <option value="opcion1">Antiguo</option>
            <option value="opcion2">Nuevo</option>
        </select>
    </div>
    <div>
    <label for="campo6">Piso:</label>
            <select id="campo6" name="campo6" >
            <option value="">Selección</option>
            <option value="opcion1">1</option>
            <option value="opcion2">2</option>
            <option value="opcion3">3</option>
        </select>
    </div>
        </form>
        <br>
        <form>
        <div>
            <label for="campo7">Notas:</label>
            <input type="text" id="campo7" name="campo7" placeholder="ID del área">
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
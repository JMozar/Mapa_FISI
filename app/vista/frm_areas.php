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
    <title>Areas</title>
    <link rel="stylesheet" href="../../public/css/estilo_area.css">
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
        function cargarD(){
            window.location.href = "../controlador/curso_Controlador.php?op=5";
        }
        function abrirModal() {
        var modal = document.getElementById('modalAgregarArea');
        modal.style.display = 'block';
        }
        function cerrarModal() {
        var modal = document.getElementById('modalAgregarArea');
        modal.style.display = 'none';
        }

        function mostrarinfo()
    {
        window.location.href = "../controlador/curso_controlador.php?op=1";      

    }

    function abrirEditarA(button) {
    var modal = document.getElementById('modalEditarArea');

    // Obtener los valores de los atributos de datos del botón
    var codigoArea = button.getAttribute('data-codigo-area');
    var nombreArea = button.getAttribute('data-nombre-area');
    var tipoArea = button.getAttribute('data-tipo-area');
    var pabellonArea = button.getAttribute('data-pabellon-area');
    var piso = button.getAttribute('data-piso');
    var aforo = button.getAttribute('data-aforo');
    var notas = button.getAttribute('data-notas');

    // Rellenar los campos del modal con los valores
    document.getElementById('campo1').value = codigoArea;
    document.getElementById('campo2').value = aforo;
    document.getElementById('campo3').value = nombreArea;
    document.getElementById('campo4').value = tipoArea;
    document.getElementById('campo5').value = pabellonArea;
    document.getElementById('campo6').value = piso;
    document.getElementById('campo7').value = notas;


    modal.style.display = 'block';
    }


        function cerrarEditarA() {
        var modal = document.getElementById('modalEditarArea');
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
            <div class="boton-bloque" onclick="redirigir_cursos()">Cursos</div>
            <div class="boton-bloque" onclick="redirigir_areas()" style="background-color: #68141C; color: white;">Áreas</div>
    </aside>
    <article>
        <div>
            <h2 class="h2_aside">ADMINISTRACIÓN DE ÁREAS</h2>  
            <div class="boton-bloque-agregar" onclick="abrirModal()">Agregar Áreas</div>       
        </div>
        <table class="tabla_aside">
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
<?php  

    foreach ($lista as $reg) {
        echo '<tr id="fila">';
        echo '<td>' . $reg['codigo_area'] . '</td>';
        echo '<td>' . $reg['nombre'] . '</td>';
        echo '<td>' . $reg['tipo'] . '</td>';
        echo '<td>' . $reg['pabellon'] . '</td>';
        echo '<td>' . $reg['piso'] . '</td>';
        echo '<td>' . $reg['aforo'] . '</td>';
        echo '<td>' . $reg['notas'] . '</td>';
        echo '<td> <button class="boton-editar" onclick="abrirEditarA(this)" ' .
            'data-codigo-area="' . $reg['codigo_area'] . '" ' .
            'data-nombre-area="' . $reg['nombre'] . '" ' .
            'data-tipo-area="' . $reg['tipo'] . '" ' .
            'data-pabellon-area="' . $reg['pabellon'] . '" ' .
            'data-piso="' . $reg['piso'] . '" ' .
            'data-aforo="' . $reg['aforo'] . '" ' .
            'data-notas="' . $reg['notas'] . '"><img src="/public/img/editar.png" alt="Editar"></button>';
        echo '<td>' .
        '<form method="POST" action="../controlador/area_controlador.php?op=2" onsubmit="return confirm(\'¿Estás seguro de que deseas eliminar este curso?\');">' .
        '<input type="hidden" name="codigo_area" value="' . $reg['codigo_area'] . '">' .
        '<button type="submit" class="boton-eliminar"> <img src="/public/img/eliminar.png" alt="Eliminar"></button>' .
        '</form>' .
        '</td>';
        echo '</tr>';
    }

    ?> 
             
        </table>

    </article>


<!-- Modal para Editar áreas -->
<form method="POST" action="../controlador/area_Controlador.php?op=3" id=areas>
    <div class="modal" id="modalEditarArea">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="position: relative; left: 25%; font-size: 28px;">DATOS DEL ÁREA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarEditarA()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

<label for="campo1" id="campo1text">Identificador:</label>
<label for="campo2" id="campo2text">Aforo:</label>
<br>

<input type="text" id="campo1" name="campo1" placeholder="ID del área" required oninput="this.value = this.value.toUpperCase();" readonly>


<select id="campo2" name="campo2">
<option value="">Selección</option>
<option value="20">20 personas</option>
<option value="40">40 personas</option>
<option value="50">50 personas</option>
</select>
</div>
<div class="modal-body">

    <label for="campo3" id="campo3text">Nombre:</label>
<br>
    <input type="text" id="campo3" name="campo3" placeholder="Nombre del área" required oninput="this.value = this.value.toUpperCase();">

</div>
<div class="modal-body">
    <label for="campo4" id="campo4text">Tipo:</label>
    <label for="campo5" id="campo5text">Pabellón:</label>
    <label for="campo6" id="campo6text">Piso:</label>
    <br>
    <select id="campo4" name="campo4">
        <option value="">Selección</option>
        <option value="A">Aula</option>
        <option value="L">Laboratorio</option>
        <option value="O">Oficina</option>
        <option value="X">Otro</option>

    </select>


    <select id="campo5" name="campo5">
        <option value="">Selección</option>
        <option value="ANT">Antiguo</option>
        <option value="NUE">Nuevo</option>
        <option value="OTR">Otro</option>

    </select>

    <select id="campo6" name="campo6">
    <option value="">Selección</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    </select>
    </div>
    
    <div class="modal-body">
    <label for="campo7" id="campo7text" style="position: relative;
    left: 10%; ">Notas:</label>
    <br>
    <input type="text" id="campo7" name="campo7" placeholder="Notas del área">
    <br><br>

 
                    <button type="submit" class="btn btn-primary" style="background-color: #68141C;position: relative;left: 44%;" name="btnagregar" value="ok" onclick="GuardarA()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</aside>
</div>
</form>

<!-- Modal para agregar áreas -->
<form method="POST" action="../controlador/area_Controlador.php?op=4" id=areas>
    <div class="modal" id="modalAgregarArea">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="position: relative; left: 25%; font-size: 28px;">DATOS DEL ÁREA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <label for="campo1" id="campo1text">Identificador:</label>
                    <label for="campo2" id="campo2text">Aforo:</label>
                    <br>
                    <input type="text" id="campo1" name="campo1" placeholder="ID del área" required oninput="this.value = this.value.toUpperCase();">
                    

                    <select id="campo2" name="campo2">
                    <option value="">Selección</option>
                    <option value="20">20 personas</option>
                    <option value="40">40 personas</option>
                    <option value="50">50 personas</option>
                    </select>
                </div>
                    <div class="modal-body">

                        <label for="campo3" id="campo3text">Nombre:</label>
                    <br>
                        <input type="text" id="campo3" name="campo3" placeholder="Nombre del área" required oninput="this.value = this.value.toUpperCase();">
                   
</div>
<div class="modal-body">
                        <label for="campo4" id="campo4text">Tipo:</label>
                        <label for="campo5" id="campo5text">Pabellón:</label>
                        <label for="campo6" id="campo6text">Piso:</label>
                        <br>
                        <select id="campo4" name="campo4">
                            <option value="">Selección</option>
                            <option value="A">Aula</option>
                            <option value="L">Laboratorio</option>
                            <option value="O">Oficina</option>
                            <option value="X">Otro</option>
                        </select>

 
                        <select id="campo5" name="campo5">
                            <option value="">Selección</option>
                            <option value="ANT">Antiguo</option>
                            <option value="NUE">Nuevo</option>
                            <option value="OTR">Otro</option>
                        </select>

                        <select id="campo6" name="campo6">
                        <option value="">Selección</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        </select>
                        </div>
                        
                        <div class="modal-body">
                        <label for="campo7" id="campo7text" style="position: relative;
                        left: 10%; ">Notas:</label>
                        <br>
                        <input type="text" id="campo7" name="campo7" placeholder="Notas del área">
                        <br><br>
   
                        
 
                    <button type="submit" class="btn btn-primary" style="background-color: #68141C;position: relative;left: 44%;" name="btnagregar" value="ok" onclick="cargarD()">Listo</button>
                    </div>      </div>
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

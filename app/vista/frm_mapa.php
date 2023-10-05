<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Mapa Fisi</title>
    <link rel="stylesheet" href="../../public/css/estilo_mapa.css">
    <link rel="stylesheet" href="../../public/css/estilo_modal.css">
    rel

    <!--API de mapbox-->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <!--Agregar BootStrap al proyecto (CSS)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
</head>

<body>
    <!--Parte superior de la página-->
    <header>
        <div id="cabecera">
            <h3>Mapa de la fisi</h3>
            <img src="../../public/img/logo-fisi.png" alt="Logo de la FISI">
        </div>
    </header>

        <!-- BÚSQUEDA-->
        <form class="buscador d-flex" role="search">
            <input id="txtSearch" class="form-control me-2" type="search" placeholder="¿A donde vamos?"
                aria-label="Search">
            <button id="btnSearch" class="btn btn-outline-success" type="submit">Buscar</button>
        </form>

        <!-- Lista para mostrar los resultados -->
        <ul id="searchResults">
            <!-- Aquí se agregarán los elementos coincidentes -->
        </ul>

    <div id="pantalla_mapa">
        <!--Pantala principal del mapa-->


        
        <div class="botones" id="cambia_horarioMapa">
            <button type="button" onclick="cambia_mapa_horario()">Horarios</button>
        </div>
        <div class="navegador">
            <button type="button">1</button>
            <button type="button">2</button>
            <button type="button">3</button>
        </div>
        <button id="mostrarInfo">Mostrar Información del Aula</button>

    </div>

    <!--botón para mostrar los horarios-->
    <div class="botones" id="cambia_horarioMapa">
    <button type="button" onclick="mostrarHorarios()">Horarios</button>
    </div>

    <div id="pantalla_horario" style="display: none;">
        <!-- Pantalla de los horarios -->
        <div class="tabla-horarios">
            <p>Horarios</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>PROFESOR</th>
                        <th>CURSO</th>
                        <th>AULA</th>
                        <th>HORARIO ENTRADA</th>
                        <th>HORARIO SALIDA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>PETRLINK AZABACHE IVAN CARLO</td>
                        <td>(2018) EXPERIENCIA DE USUARIO Y USABILIDAD</td>
                        <td>NP 201</td>
                        <td>16:00</td>
                        <td>20:00</td>
                    </tr>
                    <tr>
                        <td>HERRERA QUISPE JOSÉ ALFREDO</td>
                        <td>(2018) METODOLOGÍA DE LA ELABORACIÓN DE TESIS</td>
                        <td>102</td>
                        <td>19:00</td>
                        <td>22:00</td>
                    </tr>
                    <!-- Puedes agregar más filas aquí si es necesario -->
                </tbody>
            </table>
            <button type="button" onclick="cerrarHorarios()">Cerrar</button>
        </div>
    </div>


    <!--Información de areas-->
    <div id="ventanaEmergente" class="ventana">
        <div class="contenido_ventana">
            <span class="cerrar" id="cerrarVentana">&times;</span>
            <h2>Información del Aula</h2>
            <br>
            <center>
                <table style="text-align: center;" border="1px">
                    <tr>
                        <th>Aula</th>
                        <th>Piso</th>
                        <th>Pabellón</th>
                    </tr>
                    <tr>
                        <td id="aula">Aula 101</td>
                        <td id="piso">2</td>
                        <td id="pabellon">Antiguo Pabellón</td>
                    </tr>
                </table>
        </div>
        </center>
    </div>

    <!-- Hacer la unión con el botón Agregar curso de CRUD AREAS"  (modificar si hace falta) -->
    <button id="btnAgregarCurso" onclick="mostrarModalAgregarCurso()">Agregar curso</button>

    <!-- Pantalla de Agregar/Modificar Áreas (no olvidar meter el botón para que se vea )-->
    <div id="pantalla_agregar_modificar_areas" class="modal">
        <div class="cuadro-pequeno">
            
            <!-- Agrega el botón "x" para cerrar la ventana modal -->
            <span class="cerrar" id="cerrarModal">&times;</span>

            <h2>DATOS DEL CURSO</h2>
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo"><br>

            <label for="area">Área:</label>
            <select id="area" name="area">
                <option value="opcion1">Opción 1</option>
                <option value="opcion2">Opción 2</option>
                <option value="opcion3">Opción 3</option>
            </select><br>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre"><br>

            <label for="grupo">Grupo:</label>
            <select id="grupo" name="grupo">
                <option value="1">1</option>
                <option value="2">2</option>
            </select><br>

            <label for="modo">Modo:</label>
            <select id="modo" name="modo">
                <option value="Virtual">Virtual</option>
                <option value="Presencial">Presencial</option>
            </select><br>

            <label for="dia">Día:</label>
            <select id="dia" name="dia">
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miércoles">Miércoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sábado">Sábado</option>
            </select><br>

            <label for="hora_inicio">Hora inicio:</label>
            <input type="time" id="hora_inicio" name="hora_inicio"><br>

            <label for="hora_fin">Hora fin:</label>
            <input type="time" id="hora_fin" name="hora_fin"><br>

            <button id="btnListo" onclick="guardarDatos()">Listo</button>
        </div> 
    </div>


    <<!--coloqué esto aquí, pero iría en el usu_controlador-->
    <script>

        // Función para mostrar los horarios
        function mostrarHorarios() {
            var pantallaHorario = document.getElementById('pantalla_horario');
            pantallaHorario.style.display = 'block';
        }

        // Función para cerrar los horarios
        function cerrarHorarios() {
            var pantallaHorario = document.getElementById('pantalla_horario');
            pantallaHorario.style.display = 'none';
        }
    </script>
    
    <script>
            // Función para mostrar el modal
            function mostrarModalAgregarArea() {
                var modal = document.getElementById('pantalla_agregar_modificar_areas');
                modal.style.display = 'block';
            }

            // Función para cerrar el modal
            function cerrarModalAgregarArea() {
                var modal = document.getElementById('pantalla_agregar_modificar_areas');
                modal.style.display = 'none';
            }

    </script>

    <script>
        // Función para mostrar el modal de agregar curso
        function mostrarModalAgregarCurso() {
            var modal = document.getElementById('pantalla_agregar_modificar_areas');
            modal.style.display = 'block';
        }

        // Función para cerrar el modal de agregar curso
        function cerrarModalAgregarCurso() {
            var modal = document.getElementById('pantalla_agregar_modificar_areas');
            modal.style.display = 'none';
        }
    </script>

</body>

 <!-- NO OLVIDES Incluir el archivo controlador -->

<script type="text/javascript" src="../../public/js/mapa_config.js"></script>

</html>

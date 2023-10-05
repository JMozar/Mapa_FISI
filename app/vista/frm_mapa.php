<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Mapa Fisi</title>
    <link rel="stylesheet" href="../../public/css/estilo_mapa.css">

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
            <img src="../../public/img/logo-fisi.png" alt="Logo de la FISI">
            <h3>Mapa Interactivo de la FISI</h3>
            <button><img src="../../public/img/usuario.png" alt="imagen">Ingresar</button>   
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
            <button type="button" onclick="cambia_horario_mapa()">Cerrar</button>
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

    <!--AGREGAR BOOTSTRAP (JSCRIPT)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="../../public/js/mapa.js"></script>
</body>
<script type="text/javascript" src="../../public/js/mapa_config.js"></script>

</html>
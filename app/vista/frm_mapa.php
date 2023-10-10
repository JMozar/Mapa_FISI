<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Mapa Fisi</title>
    <link rel="stylesheet" href="../../public/css/estilo_mapa.css">
    <link rel="stylesheet" href="../../public/css/estilo_horarios.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
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
            <button><img src="../../public/img/usuario.png" alt="imagen">Acceder</button>   
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

    <div id="pantalla_mapa" >
        <!--Pantala principal del mapa-->        
        <div class="botones" id="cambia_MapaHorario">
            <button type="button" onclick="cambia_mapa_horario()">Ver Horario</button>
        </div>

        <div id="temporal">
            <button type="button" onclick="mostrarRuta()">Ruta</button>
        </div>
     </div>
  
<!-- Zonas flotantes-->    
  <div class="navegador">
        <button type="button">1P</button>
        <button type="button">2P</button>
        <button type="button">3P</button>
    </div>
    <div class="zoom">
         <button type="button">+</button>
         <button type="button">-</button>
    </div>
  
<!-- función para vista horarios-->
<div>
    <button id="vista_horario">Vista horario</button>
    </div>


    <div id="ventanaEmergenteHorario" style="display: none;">
    <div class="ventana_horarios">
        <div class="cabecera">
            <h2 class="h2_horarios">HOJA DE HORARIOS</h2>
            <span class="cerrar" id="cerrarVentanaHorarioBtn">&times;</span>
     </div>
        
        <table class="tabla_horarios">
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
                <td>Salón</td>
            </tr>
            <tr id="fila_horarios">
                <td>202W1003T</td>
                <td>PRÁCTICA PRE PROFESIONAL</td>
                <td>1</td>
                <td>14:00</td>
                <td>16:00</td>
                <td>TEO</td>
                <td>Sábado</td>
                <td>MURAKAMI DE LA CRUZ, SUMIKO ELIZABETH </td>
                <td>105</td>
            </tr>
            <tr id="fila_horarios">
                <td>202W0701T</td>
                <td>ARQUITECTURA DE SOFTWARE</td>
                <td>1</td>
                <td>8:00</td>
                <td>12:00</td>
                <td>TEO</td>
                <td>Sábado</td>
                <td>MENENDEZ MUERAS, ROSA </td>
                <td>102</td>
            </tr>
            <tr id="fila_horarios">
                <td>202W0705</td>
                <td>INTELIGENCIA ARTIFICIAL</td>
                <td>1</td>
                <td>14:00</td>
                <td>18:00</td>
                <td>TEO</td>
                <td>Lúnes</td>
                <td>GAMARRA MORENO, JUAN</td>
                <td>104</td>
            </tr>
            <tr id="fila_horarios">
                <td>202W0804</td>
                <td>MINERÍA DE DATOS</td>
                <td>2</td>
                <td>16:00</td>
                <td>22:00</td>
                <td>TEO</td>
                <td>Martes</td>
                <td>CALDERON VILCA, HUGO DAVID</td>
                <td>106</td>
            </tr>
            <tr id="fila_horarios">
                <td>202W0905</td>
                <td>GESTIÓN RIESGO DEL SW</td>
                <td>1</td>
                <td>16:00</td>
                <td>22:00</td>
                <td>TEO</td>
                <td>Viernes</td>
                <td>MACHADO VICENTE, JOEL FERNANDO</td>
                <td>209</td>
            </tr>
        <!-- Agrega más filas según sea necesario -->
        </table>
    </div>
    </div>

<!--Boton salones-->
    <div>
        <button id="mostrarInfo" style="background-color: #efe4b0;">105</button>
    </div>
    <div>
    <button id="mostrarInfo2" style="background-color: #efe4b0;">106</button>
    </div>
<!-- Contenido salones--> 
    <!-- Salón 105-->
    <div id="ventanaEmergenteSalon" class="ventana">
        <div class="contenido_ventana_salon">
            <span class="cerrar" id="cerrarSalonBtn">&times;</span>
            <img src="../../public/img/Salon1.png" alt="Imagen del salón" style="max-width: 100%; max-height: 80vh;">
            <div class="info_salon">
                <p class="cabecera_salon">Salón 105
                <table class="tabla_infosalon">
                    <tr>
                    <td><u><b>DETALLES:</b></u></td>
                    </tr>
                    <tr>
                    <td>Pabellón Antiguo</td>
                    </tr>
                    <tr>
                    <td>Aforo: 40 personas</td>
                    </tr>
                    <tr>
                    <td>Primer piso</td>
                    </tr>
                    <tr>
                    <td><u><b>ACTIVIDADES:</b></u></td>
                    </tr>
                    <tr>
                    <td>Curso: 202W1003</td>
                    </tr>
                    <tr>
                    <td>PRÁCTICA PRE PROFESIONAL</td>
                    </tr>
                    <tr>
                    <td>Profesora: MURAKAMI DE LA CRUZ, SUMIKO ELIZABETH</td>
                    </tr>
                    <tr>
                    <td>Matriculados: 25 estudiantes</td>
                    </tr>
                    <tr>
                    <td>Día: Sábado</td>
                    </tr>
                    <tr>
                    <td>Hora Teoría: 14:00 a 18:00</td>
                    </tr>
                    <tr>
                    <td>Hora Laboratorio: 18:00 a 20:00</td>
                    </tr>
                    <p></p>
                    <table class="tabla_infosalon">
                    <p></p>
                    <p></p>
                    <b>----------------------</b>
                    <p></p>
                    <td>Curso: 202W1003</td>
                    </tr>
                    <tr>
                    <td>PRÁCTICA PRE PROFESIONAL</td>
                    </tr>
                    <tr>
                    <td>Profesora: MURAKAMI DE LA CRUZ, SUMIKO ELIZABETH</td>
                    </tr>
                    <tr>
                    <td>Matriculados: 25 estudiantes</td>
                    </tr>
                    <tr>
                    <td>Día: Sábado</td>
                    </tr>
                    <tr>
                    <td>Hora Teoría: 14:00 a 18:00</td>
                    </tr>
                    <tr>
                    <td>Hora Laboratorio: 18:00 a 20:00</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <!-- Salón 106-->
    <div id="ventanaEmergenteSalon2" class="ventana">
        <div class="contenido_ventana_salon2">
            <span class="cerrar" id="cerrarSalonBtn2">&times;</span>
            <img src="../../public/img/Salon2.png" alt="Imagen del salón" style="max-width: 100%; max-height: 80vh;">
            <div class="info_salon">
                <p class="cabecera_salon">Salón 106
                <table class="tabla_infosalon">
                    <tr>
                    <td><u><b>DETALLES:</b></u></td>
                    </tr>
                    <tr>
                    <td>Pabellón Antiguo</td>
                    </tr>
                    <tr>
                    <td>Aforo: 40 personas</td>
                    </tr>
                    <tr>
                    <td>Primer piso</td>
                    </tr>
                    <tr>
                    <td><u><b>ACTIVIDADES:</b></u></td>
                    </tr>
                    <tr>
                    <td>Curso: 202W1003</td>
                    </tr>
                    <tr>
                    <td>PRÁCTICA PRE PROFESIONAL</td>
                    </tr>
                    <tr>
                    <td>Profesora: MURAKAMI DE LA CRUZ, SUMIKO ELIZABETH</td>
                    </tr>
                    <tr>
                    <td>Matriculados: 25 estudiantes</td>
                    </tr>
                    <tr>
                    <td>Día: Sábado</td>
                    </tr>
                    <tr>
                    <td>Hora Teoría: 14:00 a 18:00</td>
                    </tr>
                    <tr>
                    <td>Hora Laboratorio: 18:00 a 20:00</td>
                    </tr>
                    <p></p>
                    <table class="tabla_infosalon">
                    <p></p>
                    <p></p>
                    <b>----------------------</b>
                    <p></p>
                    <td>Curso: 202W1003</td>
                    </tr>
                    <tr>
                    <td>PRÁCTICA PRE PROFESIONAL</td>
                    </tr>
                    <tr>
                    <td>Profesora: MURAKAMI DE LA CRUZ, SUMIKO ELIZABETH</td>
                    </tr>
                    <tr>
                    <td>Matriculados: 25 estudiantes</td>
                    </tr>
                    <tr>
                    <td>Día: Sábado</td>
                    </tr>
                    <tr>
                    <td>Hora Teoría: 14:00 a 18:00</td>
                    </tr>
                    <tr>
                    <td>Hora Laboratorio: 18:00 a 20:00</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
      
     <!--Vista de rutas-->
    <div id="ruta" style="display: none;">
        <div id=central>
            <button type="button">a</button>
            <img src="" alt="imagen RUTA">
            <button type="button">a</button>
        </div>
        <div id=aceptar>
            <button type="button" onclick="mostrarMapa()">Aceptar</button>
        </div>
        
    </div>


    <!--AGREGAR BOOTSTRAP (JSCRIPT)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="../../public/js/mapa.js"></script>

    <script>
// Variables para botón 105
var botonAula105 = document.getElementById('mostrarInfo');
var ventanaEmergenteSalon = document.getElementById('ventanaEmergenteSalon');
var cerrarSalonBtn = document.getElementById('cerrarSalonBtn');
// Variables para botón 106
var botonAula106 = document.getElementById('mostrarInfo2');
var ventanaEmergenteSalon2 = document.getElementById('ventanaEmergenteSalon2');
var cerrarSalonBtn2 = document.getElementById('cerrarSalonBtn2');
// Variables para Vista Horario
var botonMostrarHorario = document.getElementById('vista_horario');
var ventanaEmergenteHorario = document.getElementById('ventanaEmergenteHorario');
var cerrarVentanaHorarioBtn = document.getElementById('cerrarVentanaHorarioBtn');
// Función para ocultar ventana y mostrar botón
function ocultarVentanaYMostrarBoton(ventana, boton) {
    ventana.style.display = 'none';
    boton.style.display = 'block';
}
// Agrega un evento de clic al botón "105"
botonAula105.addEventListener('click', function() {
    ventanaEmergenteSalon.style.display = 'block';
    botonAula105.style.display = 'block';
    botonMostrarHorario.style.display = 'none';
    botonAula105.style.borderWidth = '13px';
    botonAula105.style.borderColor = '#68141C';
    botonAula105.style.borderStyle = 'solid';
});
// Agrega un evento de clic al botón de cierre de la ventana del salón 105
cerrarSalonBtn.addEventListener('click', function() {
    ocultarVentanaYMostrarBoton(ventanaEmergenteSalon, botonAula105);
    ocultarVentanaYMostrarBoton(ventanaEmergenteSalon, botonMostrarHorario);
    botonAula105.style.borderWidth = '2px';
    botonAula105.style.borderColor = 'black';
    botonAula105.style.borderStyle = 'solid';
});
// Agrega un evento de clic al botón "106"
botonAula106.addEventListener('click', function() {
    ventanaEmergenteSalon2.style.display = 'block';
    botonAula106.style.display = 'block';
    botonMostrarHorario.style.display = 'none';
    botonAula106.style.borderWidth = '13px';
    botonAula106.style.borderColor = '#68141C';
    botonAula106.style.borderStyle = 'solid';
});
// Agrega un evento de clic al botón de cierre de la ventana del salón 106
cerrarSalonBtn2.addEventListener('click', function() {
    ocultarVentanaYMostrarBoton(ventanaEmergenteSalon2, botonAula106);
    ocultarVentanaYMostrarBoton(ventanaEmergenteSalon2, botonMostrarHorario);
    botonAula106.style.borderWidth = '2px';
    botonAula106.style.borderColor = 'black';
    botonAula106.style.borderStyle = 'solid';
});
// Agrega un evento de clic al botón "Vista horario"
botonMostrarHorario.addEventListener('click', function() {
    ventanaEmergenteHorario.style.display = 'block';
    botonMostrarHorario.style.display = 'none';
    botonAula105.style.display = 'none';
    botonAula106.style.display = 'none';
});
// Agrega un evento de clic al botón de cierre de la ventana de horario
cerrarVentanaHorarioBtn.addEventListener('click', function() {
    ventanaEmergenteHorario.style.display = 'none';
    botonMostrarHorario.style.display = 'block';
    botonAula105.style.display = 'block';
    botonAula106.style.display = 'block';
});
</script>
</body>
<script type="text/javascript" src="../../public/js/mapa_config.js"></script>

</html>

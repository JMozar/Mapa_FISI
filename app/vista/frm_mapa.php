<?php 
 session_start();// la sesion se esta manteniendo activa

 //$lista=$_SESSION['LISTA'];
 require_once '../../dao/AreaDao.php';
 require_once '../../util/ConexionBD.php';


 $objAreaDao=new AreaDao();
 $codigo="AR001";
 $info=$objAreaDao->infoArea($codigo);

foreach($info  as $reg  ){}
 
?>


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/@turf/turf@latest/turf.min.js"></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <!--Agregar BootStrap al proyecto (CSS)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <script>
        function redirigir_login() {
        window.location.href = "../controlador/usu_controlador.php?accion=navegar_a_login";
        }

        function mostrar_info() {
            <?php
                 //$info=$objAreaDao->infoArea("LA004");
            ?>
            ventanaEmergenteSalon.style.display = 'block';
            //botonAula105.style.display = 'block';
            botonMostrarHorario.style.display = 'none';
            //botonAula105.style.borderWidth = '13px';
            //botonAula105.style.borderColor = '#68141C';
            //botonAula105.style.borderStyle = 'solid';
        }
    </script>
    <style>
        
    </style>
    <script>
        // Función para alternar la selección de los botones
        function toggleButton(buttonId) {
            var buttons = document.querySelectorAll(".toggle-button");
            buttons.forEach(function(button) {
                if (button.id === buttonId) {
                    button.classList.add("active"); // Selecciona el botón clicado
                } else {
                    button.classList.remove("active"); // Deselecciona los demás botones
                }
            });
        }
    </script>
    
</head>
<body>
<form name="form" method="post">
    <input type="hidden" name="op"/>
    <input type="hidden" name="codigoArea"/>
</form>

    <!--Parte superior de la página-->
    <header>
        <div id="cabecera">
            <img src="../../public/img/logo-fisi.png" alt="Logo de la FISI">
            <h3>Mapa Interactivo de la FISI</h3>
            <!--Aqui se guardan los datos-->


            <button onclick="redirigir_login()"><img src="../../public/img/usuario.png" alt="imagen" >Acceder</button>   
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
        

        <input type="hidden" name="op"/> <!--OPPPPPPPPP-->
        <!--Pantala principal del mapa-->        
        <div class="botones" id="cambia_MapaHorario">
            <button type="button">Ver Horario</button>

        </div>

     </div>

    
  
<!-- Zonas flotantes
<button class="toggle-button" id="button1" onclick="toggleLayer(1)">1</button>
-->    
  <div class="navegador">
  <button class="toggle-button active" id="button1" onclick="toggleButton('button1'), toggleLayer(1)">1</button>
    <button class="toggle-button" id="button2" onclick="toggleButton('button2'), toggleLayer(2)">2</button>
    <button class="toggle-button" id="button3" onclick="toggleButton('button3'), toggleLayer(3)">3</button>

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


<!-- Contenido salones--> 
    <!-- Salón 105-->
    <div id="ventanaEmergenteSalon" class="ventana">
        <div class="contenido_ventana_salon">
            <span class="cerrar" id="cerrarSalonBtn">&times;</span>
            <img src="../../public/img/Salon1.png" alt="Imagen del salón" style="max-width: 100%; max-height: 80vh;">
            <div class="info_salon">

                <div id='mostrar_datos'></div>

            </div>
        </div>
    </div>

      
     <!--Vista de rutas-->
    <div id="ruta" style="display: none;">
        <div id=central>
            <button type="button"></button>
            <img src="" alt="imagen RUTA">
            <button type="button"></button>
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
var botonMostrarHorario = document.getElementById('cambia_MapaHorario');
var ventanaEmergenteHorario = document.getElementById('ventanaEmergenteHorario');
var cerrarVentanaHorarioBtn = document.getElementById('cerrarVentanaHorarioBtn');
// Función para ocultar ventana y mostrar botón
function ocultarVentanaYMostrarBoton(ventana, boton) {
    ventana.style.display = 'none';
    boton.style.display = 'block';
}

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
<!--Prueba!>
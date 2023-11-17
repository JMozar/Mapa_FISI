
//A
// Obtén una referencia al formulario de búsqueda, el campo de búsqueda y la lista de resultados.
const searchForm = document.querySelector('.buscador');
const searchInput = document.getElementById('txtSearch');
const searchResults = document.getElementById('searchResults');

// Agrega un evento de envío (submit) al formulario de búsqueda.
searchForm.addEventListener('submit', function(event) {
  event.preventDefault(); // Evita que se realice la acción de envío predeterminada (recargar la página).

  // Realiza la búsqueda cuando se envía el formulario.
  realizarBusqueda();
});

// Agrega un evento de entrada al campo de búsqueda.
searchInput.addEventListener('input', function() {
  realizarBusqueda();
});
/* 
foreach ($lista as $reg) {
        echo '<tr id="fila">';
        echo '<td>' . $reg['codigo_area'] . '</td>';
*/


// ...

// Busqueda 
function realizarBusqueda() {
    const filter = document.getElementById('txtSearch').value.toUpperCase();

    // Realiza una solicitud AJAX para buscar en la base de datos.
    fetch('../../dao/BarraBusquedaDao.php', { // Ajusta la ruta al archivo PHP de consulta.
        method: 'POST',
        body: JSON.stringify({ filter }), // Envía el filtro como datos POST.
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Limpia los resultados anteriores si el campo de búsqueda está vacío.
        if (filter === '') {
            document.getElementById('searchResults').innerHTML = '';
        } else {
            // Muestra los resultados encontrados.
            document.getElementById('searchResults').innerHTML = '';
            data.forEach(result => {
                const resultItem = document.createElement('li');

                const resultLink = document.createElement('a');
                //resultLink.href = ''; // Agrega la URL de destino.
                

                resultLink.textContent = result['nombre']+"-"+result['pabellon']; // Suponiendo que el resultado tiene una propiedad "nombre".
                
                resultItem.appendChild(resultLink);

                document.getElementById('searchResults').appendChild(resultItem);

                //Agregamos el evento para mostrar la info de las areas
                resultLink.addEventListener('click', function(){
                  //alert (result['codigo_area']);
                  
                  //generamos los eventos en el mapa
                  const polygonCode = result['codigo_area'];
                  colorear_mostrar(polygonCode)

                  //guarda el piso del area buscada
                  var piso=result['piso']
                  //borrar los resultados de la busqueda
                  var input = document.getElementById('txtSearch');
                  input.value = '';
                  //resultLink.textContent = null;
                  document.getElementById('searchResults').innerHTML = '';

                  //selecciona el piso y lo carga
                  toggleButton("button"+piso);
                  toggleLayer(piso);
                  //mostrar(result['codigo_area']);
                  //mostrar_info();
                });
            });
        }
    })
    .catch(error => {
        console.error('Error al realizar la búsqueda:', error);
    });
}


function mostrarRuta(){
    document.getElementById("pantalla_mapa").style.display="none";
    document.getElementById("ruta").style.display="block";
}

function mostrarMapa(){
  document.getElementById("pantalla_mapa").style.display="block";
  document.getElementById("ruta").style.display="none";
}
  
  


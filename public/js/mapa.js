

//Funcion para ventana emergente de la información del area seleccionada
document.addEventListener("DOMContentLoaded", function () {
    const botonMostrar = document.getElementById("mostrarInfo");
    const ventanaEmergente = document.getElementById("ventanaEmergente");
    const botonCerrar = document.getElementById("cerrarVentana");

    botonMostrar.addEventListener("click", function () {
        ventanaEmergente.style.display = "block";
    });

    botonCerrar.addEventListener("click", function () {
        ventanaEmergente.style.display = "none";
    });
});


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

// ...

function realizarBusqueda() {
    const filter = searchInput.value.toUpperCase();
  
    // Realiza una solicitud para cargar el contenido del archivo.
    fetch('../../bd/salones.txt')
      .then(response => response.text())
      .then(data => {
        // Divide el contenido del archivo en líneas.
        const lines = data.split('\n');
  
        // Filtra las líneas que coincidan con la búsqueda.
        const matchingLines = lines.filter(line => line.toUpperCase().includes(filter));
  
        // Limpia los resultados anteriores si el campo de búsqueda está vacío.
        if (filter === '') {
          searchResults.innerHTML = '';
        } else {
          // Muestra los resultados encontrados.
          searchResults.innerHTML = '';
          matchingLines.forEach(result => {
            const resultItem = document.createElement('li'); // Crea un elemento <li> para cada resultado.
  
            // Crea un enlace (<a>) y establece su atributo href.
            const resultLink = document.createElement('a');
            resultLink.href = ''; // Reemplaza 'tu_pagina_destino.html' con la URL de destino.
  
            // Establece el texto del enlace y agrega el enlace al elemento <li>.
            resultLink.textContent = result;
            resultItem.appendChild(resultLink);
  
            // Agrega el elemento <li> a la lista de resultados.
            searchResults.appendChild(resultItem);
          });
        }
      })
      .catch(error => {
        console.error('Error al cargar el archivo:', error);
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
  
  


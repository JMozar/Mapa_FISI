//Configuraciones del mapa
mapboxgl.accessToken = "pk.eyJ1Ijoiam1vemFyIiwiYSI6ImNsbXNkaXl6cjBkZWgya21yMmN2YWxlMHcifQ.MqRofl-Zw2eQfn5eTVbw7w";
var map = new mapboxgl.Map({
    container: 'pantalla_mapa',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [-77.08555632370167, -12.053057801094083],
    zoom: 18
    });
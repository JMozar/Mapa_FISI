//Configuraciones del mapa
mapboxgl.accessToken = "pk.eyJ1Ijoiam1vemFyIiwiYSI6ImNsbXNkaXl6cjBkZWgya21yMmN2YWxlMHcifQ.MqRofl-Zw2eQfn5eTVbw7w";
var map = new mapboxgl.Map({
    container: 'pantalla_mapa',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [-77.08555632370167, -12.053057801094083],
    zoom: 18
});

var geojson = {
    "type": "FeatureCollection",
    "features": [
        {
            "type": "Feature",
            "properties": {"tipo":"otro"},
            "geometry": {
                "coordinates": [
                    [
                        [
                            -77.08530457467964,
                            -12.05340548008978
                        ],
                        [
                            -77.08524751426371,
                            -12.053397105045633
                        ],
                        [
                            -77.08525720058603,
                            -12.053321583938526
                        ],
                        [
                            -77.08532241703722,
                            -12.053337991589203
                        ],
                        [
                            -77.08530457467964,
                            -12.05340548008978
                        ]
                    ]
                ],
                "type": "Polygon"
            }
        },
        {
            "type": "Feature",
            "properties": {"tipo":"salon"},
            "geometry": {
                "coordinates": [
                    [
                        [
                            -77.0852140871959,
                            -12.053200242028822
                        ],
                        [
                            -77.08518166213064,
                            -12.053425068227781
                        ],
                        [
                            -77.08505589490827,
                            -12.053412233046387
                        ],
                        [
                            -77.08509655207905,
                            -12.053180490454679
                        ],
                        [
                            -77.0852140871959,
                            -12.053200242028822
                        ]
                    ]
                ],
                "type": "Polygon"
            }
        }
    ]
}


map.on('load', () => {
    // Add a data source containing GeoJSON data.
    map.addSource('maine', {
        'type': 'geojson',
        'data': geojson
    });

            // Add a new layer to visualize the polygon.
            map.addLayer({
                'id': 'maine',
                'type': 'fill',
                'source': 'maine', // reference the data source
                'layout': {},
                'paint': {
                    'fill-color': [
                        'match',
                        ['get','tipo'],
                        'otro','red',
                        'salon','blue',
                        'white'
    
                    ], // colores por tipos
                    'fill-opacity': 0.5
                }
            });
        // Add a black outline around the polygon.
        map.addLayer({
            'id': 'outline',
            'type': 'line',
            'source': 'maine',
            'layout': {},
            'paint': {
                'line-color': '#000',
                'line-width': 2
            }
        });
    });

    //Eventos

    map.on('click', 'maine',function() {
        // Tu código a ejecutar cuando se hace clic en el marcador
        //alert('Marcador clickeado');
        
        document.getElementById("ventanaEmergente").style.display = "block";

        const botonCerrar = document.getElementById("cerrarVentana");
    
        botonCerrar.addEventListener("click", function () {
            ventanaEmergente.style.display = "none";
        });
    });
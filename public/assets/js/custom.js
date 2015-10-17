//Contact Page Map
                var domain = "http://planyourtours.com/public/assets/";
                /*
                Map Settings
                Find the Latitude and Longitude of your address:    
                - http://universimmedia.pagesperso-orange.fr/geo/loc.htm    
                - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/
            */
          
            // Map Markers
            var mapMarkers = [{
                address: "House No. 14, MHADA Colony, Talegaon Chakan Road, Pune 410506",
                html: "<strong>Main Office Office</strong><br>MHADA Colony, Talegaon Chakan Road, Pune 410506<br><br><a href='#' onclick='mapCenterAt({latitude: 18.7200, longitude: 73.6800, zoom: 16}, event)'>[+] zoom here</a>",
                icon: {
                    image: domain+"img/img-theme/pin.png",
                    iconsize: [26, 46],
                    iconanchor: [12, 46]
                }
            }];

            // Map Initial Location
            var initLatitude = 18.7200;
            var initLongitude = 73.6800;

            // Map Extended Settings
            var mapSettings = {
                controls: {
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    scaleControl: true,
                    streetViewControl: true,
                    overviewMapControl: true
                },
                scrollwheel: false,
                markers: mapMarkers,
                latitude: initLatitude,
                longitude: initLongitude,
                zoom: 5
            };
            
            $("#map").gMap(mapSettings);

            // Map Center At
            var mapCenterAt = function(options, e) {
                e.preventDefault();
                $("#map").gMap("centerAt", options);
            }

        
//map autocomplete
function initialize() {

var hotel = document.getElementById('hotellocation');
var carloc = document.getElementById('carlocation');
var vacloc = document.getElementById('vaclocation');



var autocomplete_hotel = new google.maps.places.Autocomplete(hotel);    
var autocomplete_car = new google.maps.places.Autocomplete(carlocs);
var autocomplete_vaction = new google.maps.places.Autocomplete(vacloc);

}

google.maps.event.addDomListener(window, 'load', initialize);

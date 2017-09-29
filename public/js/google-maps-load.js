/**
 * Created by Eduardo on 03/08/2017.
 */

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

function initMap() {

    var latitude=document.getElementById("latitude").value;
    var longitude=document.getElementById("longitude").value;

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        clickableIcons: false,
    });
    var input = /** @type {!HTMLInputElement} */(
        document.getElementById('pac-input'));


    var types = document.getElementById('type-selector');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();

    var marker;

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No se han encontrado datos para la dirección: '" + place.name + "'");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
        }

        marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');


        }
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);

        placeMarker(place.geometry.location);
    });

    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    function setupClickListener(id, types) {
        var radioButton = document.getElementById(id);
        radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
        });
    }

    google.maps.event.addListener(map, 'click', function(event) {
        placeMarker(event.latLng);
    });

    google.maps.event.addListenerOnce(map, 'idle', function(){
        var relocate = new google.maps.LatLng(latitude, longitude);
        placeMarker(relocate);
        map.setCenter(relocate);
        map.setZoom(18);
    });

    function placeMarker(location) {
        if ( marker ) {
            marker.setPosition(location);

        } else {
            marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
        document.getElementById("latitude").value = location.lat();
        document.getElementById("longitude").value = location.lng();
        map.panTo(location);
    }

    setupClickListener('changetype-all', []);
    setupClickListener('changetype-address', ['address']);
    setupClickListener('changetype-establishment', ['establishment']);
    setupClickListener('changetype-geocode', ['geocode']);
}/**
 * Created by Eduardo on 01/08/2017.
 */

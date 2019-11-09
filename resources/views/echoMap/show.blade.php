{{-- {{ dd($originName, $destName) }} --}}

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions Service</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
    <b>Start: </b>
    <select id="start">
    <option value="{{ $originGeo }}">{{ $originName }}</option>
    </select>
    <b>End: </b>
      <select id="end">
        <option value="{{ $destGeo }}">{{ $destName }}</option>
      </select>
    </div>
    <div id="map"></div>
    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: {lat: 1.352132, lng: 103.819936}
        });
        directionsRenderer.setMap(map);

        // This is a test to check to show the direction on page load
        calculateAndDisplayRoute(directionsService, directionsRenderer);


        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsRenderer);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        directionsService.route(
            {
              origin: {query: document.getElementById('start').value},
              destination: {query: document.getElementById('end').value},
              travelMode: 'DRIVING'
            },
            function(response, status) {
              if (status === 'OK') {
                directionsRenderer.setDirections(response);
              } else {
                window.alert('Directions request failed due to ' + status);
              }
            });
      }


    //   function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    //     directionsService.route(
    //         {
    //         //   origin: '1.285411, 103.848173',
    //           origin: {{ $originGeo }}
    //           destination: '1.308896, 103.882801',
    //           travelMode: 'DRIVING'
    //         },
    //         function(response, status) {
    //           if (status === 'OK') {
    //             directionsRenderer.setDirections(response);
    //           } else {
    //             window.alert('Directions request failed due to ' + status);
    //           }
    //         });
    //   }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDaVr44a8KAetha90PyNoFIKsEdHW0rzg
    &callback=initMap">
    </script>
  </body>
</html>
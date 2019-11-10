
<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    
        <title>Album example for Bootstrap</title>
        
    
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">
    
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Material Design Bootstrap -->
        <link href="/css/mdb.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="/css/app.css" rel="stylesheet">
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
              </style>
      </head>
  <body>
      <!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light blue-grey lighten-5 mb-4">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">Navbar</a>
      
        <!-- Collapse button -->
        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"></span></button> --}}
      
        <!-- Collapsible content -->
        {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
      
          <!-- Links -->
          {{-- <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul> --}}
          <!-- Links -->

          <!-- Search form -->
         <div class="container">
            <div class="col-md-6">
                <div class="md-form active-pink active-pink-2 mb-3 mt-0 text-center">
                 <label for="originName">From</label>
                  <input type="hidden" name="searchLatOrigin" id="search-lat-origin">
                  <input type="hidden" name="searchLngOrigin" id="search-lng-origin">
                  <input class="form-control" type="text" id="origin" placeholder="" aria-label="Search">
                  <input type="hidden" id="start" value="{{ $originGeo }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="md-form active-pink active-pink-2 mb-3 mt-0 text-center">
                    <label for="destName">To</label>
                    <input type="hidden" name="searchLatDest" id="search-lat-destination">
                    <input type="hidden" name="searchLngDest" id="search-lng-destination">
                    <input class="form-control" type="text" id="destination" placeholder="" aria-label="Search">
                    <input type="hidden" id="end" value="{{ $destGeo}}">
                </div>
            </div>
         </div>
        </div>
        <!-- Collapsible content -->
      
      </nav>
      <!--/.Navbar-->
      {{-- <div id="map"></div> --}}
      <!--Section: Contact v.1-->
      <div class="container">
      <section class="section pb-5">
        <!--Section heading-->
        {{-- <h2 class="section-heading h1 pt-4">Contact us</h2> --}}
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-3 mb-4">
        
                <!--Form with header-->
                <div class="card">
        
                    <div class="card-body">
            
                        <!--Body-->
                        <div class="md-form">
                        <label for="customRange3">Sustainability</label>
                        <input type="range" class="custom-range" min="0" max="5" step="0.5" id="customRange3">
                        </div>

                        <!--Body-->
                        <div class="md-form">
                            <label for="customRange3">Comfort</label>
                            <input type="range" class="custom-range" min="0" max="5" step="0.5" id="customRange3">
                        </div>

                        <div class="text-center mt-4">
                        <button class="btn btn-light-blue">Submit</button>

                    </div>
        
                </div>
        
                </div>
                <!--Form with header-->
        
            </div>
            <!--Grid column-->
        
            <!--Grid column-->
            <div class="col-lg-9">
                <!--Google map-->
                <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: 400px">
                <div id="map"></div>
            </div>
            <!--Grid column-->
        </div>
        </section>
      </div>
      <!--Section: Contact v.1-->

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
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.17.0"></script>
    {{-- <script>
            // Origin
            var placesOrigin = places({
              appId: 'plG5O0UAXZKG',
              apiKey: '8fff983280e5a4da5f6c4a431736f16f',
              container: document.querySelector('#origin'),
            });
            placesOrigin.on('change', function resultSelected(e) {
              document.querySelector('#search-lat-origin').value = e.suggestion.latlng.lat || '';
              document.querySelector('#search-lng-origin').value = e.suggestion.latlng.lng || '';
            })

            // Destination
            var placesDestination = places({
              appId: 'plG5O0UAXZKG',
              apiKey: '8fff983280e5a4da5f6c4a431736f16f',
              container: document.querySelector('#destination')
            });
            placesDestination.on('change', function resultSelected(e) {
              document.querySelector('#search-lat-destination').value = e.suggestion.latlng.lat || '';
              document.querySelector('#search-lng-destination').value = e.suggestion.latlng.lng || '';
            })
    </script> --}}
    
  </body>
</html>
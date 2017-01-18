@extends('welcome')

@section('title', 'Inicio')

@section('content')


<div class="container theme-showcase" role="main">

  <div class="page-header">
    <h1>Ubicación</h1>
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-4 center">
     
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Ubicación de Clientes</h3>
        </div>
        <div class="panel-body">
        
		   <div class="col-lg-12 col-md-12 col-sm-12">
				<div class="form-group col-md-12 col-sm-12">
					<input style="width:60%;" id="pac-input" class="controls" type="text" placeholder="Search Box">
					<div id="map" style="width:100%;height:350px;border:2px solid violet;"></div>
					<input type="hidden" id="data" value="{{$data}}">
		  		</div> 
			</div>
        </div>
    </div><!-- /.col-sm-4 -->

    </div>
  </div>
</div> <!-- /container -->



<script>


	function initAutocomplete() {

		var input, autocomplete, map, marker;

		autocomplete = new google.maps.places.Autocomplete(
		  /** @type {!HTMLInputElement} */(document.getElementById('location')),
		  {types: ['geocode']});


		  map = new google.maps.Map(document.getElementById('map'), {
		    center: {
		      lat: 9.0000000, 
		      lng: -80.0000000
		    },
		      zoom: 1,
		    //mapTypeId: google.maps.MapTypeId.ROADMAP
		  });

		  var data = $('#data').val(); 

		if ( data != null ){
			data_split = data.split("/");


			for (var i = 0; i < data_split.length-1; i++) {
			    array = data_split[i].split("&");
				
			    var marker = new google.maps.Marker({
			      position: {
			      	lat: parseFloat(array[0]), 
			      	lng: parseFloat(array[1])
			      },
			      map: map,
			      draggable: true
			    });
			    

			};
		}

		google.maps.event.addListener(marker,'dragend',function(){

		    var lat = marker.getPosition().lat();
		    var lng = marker.getPosition().lng();
		    console.log(marker);

		});

		input = document.getElementById('pac-input');

		var searchBox = new google.maps.places.SearchBox(input);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

		// Bias the SearchBox results towards current map's viewport.
		map.addListener('bounds_changed', function() {
		   searchBox.setBounds(map.getBounds());
		});

		searchBox.addListener('places_changed', function() {
		 	var places = searchBox.getPlaces();



		    if (places.length == 0) {
		      return;
		    }

		    marker.setMap(null);

		    markers = [];

		    // For each place, get the icon, name and location.
		    var bounds = new google.maps.LatLngBounds();
		    places.forEach(function(place) {
		      
		      

		      // Create a marker for each place.
		      markers = new google.maps.Marker({
		        map: map,
		        title: place.name,
		        position: place.geometry.location,
		        draggable: true

		      });

		       lat = markers.getPosition().lat();
		       lng = markers.getPosition().lng();



		      google.maps.event.addListener(markers,'dragend',function(){

		        lat = markers.getPosition().lat();
		        lng = markers.getPosition().lng();

		      });


		      if (place.geometry.viewport) {
		        // Only geocodes have viewport.
		        bounds.union(place.geometry.viewport);
		      } else {
		        bounds.extend(place.geometry.location);
		      }
		    });
		    map.fitBounds(bounds);
		  });

		}


</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrjaEonlzUg7eHM61efapnjNXDn-Gjut4&libraries=places&callback=initAutocomplete"
     async defer></script>

@stop
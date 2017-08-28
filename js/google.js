//ask the user if they would like to share their location
if(navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(display, error);
}

//if yes use the coordinates to be the center of the map
function display(position) {

//https://developers.google.com/maps/documentation/javascript/directions

(function () {
	var directionsService = new google.maps.DirectionsService(),
		directionsDisplay = new google.maps.DirectionsRenderer(),
		createMap = function (start) {

			var nextgig		= new google.maps.LatLng(-41.2940596, 174.7754097);
			var current 	= new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

			var travel = {
					origin : (start.coords)? new google.maps.LatLng(start.lat, start.lng) : start.address,
					destination : "171 Cuba St, Te Aro, Wellington",
					travelMode : google.maps.DirectionsTravelMode.DRIVING
				},
				mapOptions = {
					zoom: 10,
					center : new google.maps.LatLng(59.3325215, 18.0643818),
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};

			map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
			directionsDisplay.setMap(map);

			var marker = new google.maps.Marker({
				animation: google.maps.Animation.DROP, //BOUNCE
				position: nextgig,
				map: map,
				title: 'San Fransico Bath House',
			});

			var markerInfoWindow = new google.maps.InfoWindow({
				content: '<div class="info"><h3>The Meeks - Escapade Tour</h3><ul><li>Saturday 02 February 2013</li><li>San Fransico Bath House</li><li>Wellington, New Zealand</li></ul></div>'

			});

			//markerInfoWindow.open(map, marker);

			google.maps.event.addListener(marker, 'click', function() {
				//open the marker info window
				markerInfoWindow.open(map, marker);
				
				map.panTo(marker.getPosition());
			});

			directionsDisplay.setPanel(document.getElementById("direction-canvas"));
			directionsService.route(travel, function(result, status) {
				if (status === google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(result);
				}
			});
		};

		// Check for geolocation support	
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {


					createMap({
						coords : true,
						lat : position.coords.latitude,
						lng : position.coords.longitude
					});
				}, 

		function () {
					createMap({
						coords : false,
						address : "Wellington, New Zealand"
					});

					}
			);

		} else {
			createMap({
				coords : false,
				address : "Wellington Airport, Wellington, New Zealand"
			});
		}
				

})();

}

function error(e) {
	console.log(e);
}















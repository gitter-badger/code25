<!DOCTYPE html>
<html lang="en">
<head>

<title>Ruaven</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="http://localhost/code25/public/angular-1.2.9.min.js"></script>

<script>
(function () {
window.onload = function () 
{
	var mapDiv =  document.getElementById('map');
	 
	var options = {
	zoom: 3,
	center: new google.maps.LatLng(37.09, -95.71),
	mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(mapDiv, options);
	var bounds = google.maps.LatLngBounds(
	new google.maps.LatLng(37.775, -122.419),
	new google.maps.LatLng(47.620, -73.986)
	);
	
	
	
	var infowindow;
	//creating our bounds here
	var bounds = google.maps.LatLngBounds();

	
	var cities = [];
	cities.push(new google.maps.LatLng(40.756, -73.986));
	cities.push(new google.maps.LatLng(37.775, -122.419));
	cities.push(new google.maps.LatLng(47.620, -122.347));
 
	var infowindow;
	for (var i = 0; i<cities.length; i++) 
	{
		// bounds.extend(cities[i]);
		//create markers for each city
		var marker = new google.maps.Marker({
		position: cities[i],
		map: map,
		title: "City Number " + i
		});
	 
		(function (i, marker) {
		//create even listeners (closures at work)
		google.maps.event.addListener(marker, 'click', function () {
			
		if (!infowindow) {
		infowindow = new google.maps.InfoWindow();
		}
		//set content
		infowindow.setContent('City number ' + i);
		//open the window
		infowindow.open(map, marker);
		});
		})(i, marker);
		
		
	}
	
	
};
})();
</script>

<body>
 <div id="map" style="width: 320px; height: 480px;"></div>
  <div>
    <input id="address" type="textbox" value="Sydney, NSW">
    <input type="button" value="Encode">
  </div>
</body>
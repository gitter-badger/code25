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

var geocoder;
  var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
      zoom:8,
      center: latlng
    }
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	google.maps.event.addListener(map, "bounds_changed", function() {
	   // console.log(map.getCenter());
	   // console.log(map.getZoom());
	   // map.setZoom(10);
	   // map.setZoom(11);
	   // map.setZoom(12);
	   // map.setZoom(13);
	   // map.setZoom(14);
	   // map.setZoom(15);
	   // map.setZoom(16);
	   // map.setZoom(17);
	   // map.setZoom(18);
	   // map.setZoom(19);
	   // map.setZoom(20);
	   console.log(map.getBounds());
	   console.log(map.getZoom());
	   
	
    });
 } 
	

  function codeAddress() {
	
    var address = document.getElementById("address").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
		console.log(results);
		var address = {
			lat:results[0].geometry.location,
			lng:results[0].geometry.location
			};
		var lat = address['lat']['k'];
		var lng = address['lat']['A'];
		// console.log("Longitude:" + lng);
		// console.log("Latitude:" + lat);
		
        map.setCenter(results[0].geometry.location);
		map.setZoom(20);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
</script>

<body onload="initialize()">
 <div id="map-canvas" style="width: 320px; height: 480px;"></div>
  <div>
    <input id="address" type="textbox" value="Sydney, NSW">
    <input type="button" value="Encode" onclick="codeAddress()">
  </div>
</body>
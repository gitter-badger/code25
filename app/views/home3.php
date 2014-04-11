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

function initialize() {
  var myOptions = {
    zoom: 10,
    center: new google.maps.LatLng(0, 0),
    mapTypeId: google.maps.MapTypeId.HYBRID
  }
  var map = new google.maps.Map(
    document.getElementById("map-canvas"),
    myOptions);
  setMarkers(map, beaches);
}

var beaches = [
  ['Bondi Beach', -34.397, 150.644, 4],
  ['Coogee Beach', -33.923036, 161.259052, 5],
  ['Cronulla Beach', -36.028249, 153.157507, 3],
  ['Manly Beach', -31.80010128657071, 151.38747820854187, 2],
  ['Maroubra Beach', -33.950198, 151.159302, 1]
];

function setMarkers(map, locations) {

  var path ="http://localhost/code25/public/img/plane-green1.png";
  console.log(path);
  var image = new google.maps.MarkerImage(path,
    new google.maps.Size(20, 32),
    new google.maps.Point(0,0),
    new google.maps.Point(0, 32));
	
  var shadow = new google.maps.MarkerImage(path + 'img/plane-green1.png',
    new google.maps.Size(37, 32),
    new google.maps.Point(0,0),
    new google.maps.Point(0,49));
  var shape = {
    coord: [1, 1, 1, 20, 18, 20, 18 , 1],
    type: 'poly'
  };
  var bounds = new google.maps.LatLngBounds();
  for (var i = 0; i < locations.length; i++) {
    var beach = locations[i];
    var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
	console.log(myLatLng);
	
    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      shadow: shadow,
      icon: image,
      shape: shape,
      title: beach[0],
      zIndex: beach[3]
    });
	
    bounds.extend(myLatLng);
  }
  map.fitBounds(bounds);
}
</script>

<body onload="initialize()">
 <div id="map-canvas" style="width: 320px; height: 480px;"></div>
  <div>
    <input id="address" type="textbox" value="Sydney, NSW">
    <input type="button" value="Encode" >
  </div>
</body>
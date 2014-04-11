<!DOCTYPE html>
<html lang="en" ng-app="ruaven">
<head>

<title>Ruaven</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="">
<style>
#flight-map-canvas {
width:100%;
height: 550px;
margin: 0px;
padding: 0px
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="http://localhost/code25/public/angular-1.2.9.min.js"></script>
<script>

	var myApp = angular.module('ruaven', []);

	myApp.controller('MapCtrl', ['$scope', '$http',function($scope,$http){
	$scope.loadMap = function() 
	{
		var flightPath,
		map,
		marker,
		markers = [],
		flightPaths = [];

		var mapOptions = {
		zoom : 12,
		mapTypeId: google.maps.MapTypeId.HYBRID,
		center : new google.maps.LatLng(8.461506, 123.791199)
		};

		map = new google.maps.Map( document.getElementById('flight-map-canvas'),mapOptions)
		
		flightPath = new google.maps.Polyline({
		strokeColor : 'green',
		strokeOpacity : 1.0,
		strokeWeight : 1
		});

		flightPath.setMap(map);
		
		google.maps.event.addListener(map, 'click', function(event)
		{
			var path = flightPath.getPath();
			path.push(event.latLng);
			
			var waypoint = {
			lat:event.latLng,
			lng:event.latLng
			};
			
			console.log("Waypoint:" + waypoint);
			
			var lat = waypoint['lat']['k'];
			var lng = waypoint['lat']['A'];
			
			console.log("Latitude:" + lat);
			console.log("Longitude:" + lng);
			
			$http({
				method: 'POST',
				url: 'addwaypoint',
				data:{lat:lat,lng:lng}
			})
			.success(function(data)
			{
				console.log(data);
			});	
	    });
	};
}]);
</script>
</head>
<body ng-init="loadMap()" ng-controller="MapCtrl">
<div id="flight-map-canvas"></div>
<div class="flight-plan-controls">
<div class="fpc-container">
<ul class="ul-fpc">
<li><a href="#" onClick="save_waypoints()">Create</a></li>
<li><a href="#">Retrieve</a></li>
<li><a href="#">Update</a></li>
<li><a href="#">Delete</a></li>
<!--li><a href="#" onclick="clearFlightPath();">Clear FlightPath</a></li-->
</ul>
</div>
</div>
</body>
</html>
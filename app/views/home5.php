<!DOCTYPE html>
<html>
    <head>
        <title>My Map</title>
        <style>
            #map-id {
                width: 512px;
                height: 256px;
            }
        </style>
		<script src="http://localhost/code25/public/OpenLayer/OpenLayers.js"></script>
    </head>
    <body>
        <h1>My Map</h1>
        <div id="map-id"></div>
        <script>
            var map = new OpenLayers.Map("map-id");
            var imagery = new OpenLayers.Layer.WMS(
                "Tangub City",
                "http://maps.googleapis.com/maps/api/staticmap?&maptype=satellite&center=Tangub&zoom=17&size=900x900&sensor=false",
                {layers: "bluemarble"}
            );
            map.addLayer(imagery);
			
			 var imagery2 = new OpenLayers.Layer.WMS(
                "Tangub City",
                "http://maps.googleapis.com/maps/api/staticmap?&maptype=satellite&center=Tangub&zoom=10&size=900x900&sensor=false",
                {layers: "bluemarble"}
            );
            map.addLayer(imagery2);
			
            map.zoomToMaxExtent();
        </script>
    </body>
</html>
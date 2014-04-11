

<html>
<head>
<title>OpenLayers Example</title>
<script src="http://openlayers.org/api/OpenLayers.js"></script>
</head>
<body>
<div style="width:100%; height:100%" id="map"></div>
<script defer="defer" type="text/javascript">
var options = {
singleTile: true,
ratio: 1,
isBaseLayer: true,
wrapDateLine: true,
getURL: function() {
var center = this.map.getCenter().transform("EPSG:3857", "EPSG:4326"),
size = this.map.getSize();
return [
this.url, "&center=", center.lat, ",", center.lon,
"&zoom=", this.map.getZoom(), "&size=", size.w, "x", size.h
].join("");
}
};

var map = new OpenLayers.Map({
div: "map",
projection: "EPSG:3857",
numZoomLevels: 22,
layers: [
// the same layer again, but scaled to allow map sizes up to 1280x1280 pixels
new OpenLayers.Layer.Grid(
"Google Satellite (scale=2)",
"http://maps.googleapis.com/maps/api/staticmap?&maptype=satellite&center=Tangub&zoom=17&size=900x900&sensor=false",
null, OpenLayers.Util.applyDefaults({
getURL: function() {
var center = this.map.getCenter().transform("EPSG:3857", "EPSG:4326"),
size = this.map.getSize();
return [
this.url, "&center=", center.lat, ",", center.lon,
"&zoom=", (this.map.getZoom() - 1),
"&size=", Math.floor(size.w / 2), "x", Math.floor(size.h / 2)
].join("");
}
}, options)
)
],
center: new OpenLayers.LonLat(10.2, 48.9).transform("EPSG:4326", "EPSG:3857"),
zoom: 5
});
map.addControl(new OpenLayers.Control.LayerSwitcher());
</script>

</body>
</html>



<?php

include_once(public_path() . '\GoogleMap.php');
include_once(public_path() . '\JSMin.php');

$MAP_OBJECT = new GoogleMapAPI(); $MAP_OBJECT->_minify_js = isset($_REQUEST["min"])?FALSE:TRUE;
$MAP_OBJECT->addMarkerByAddress("Denver, CO","Marker Title", "Marker Description");
$MAP_OBJECT->enableStreetViewControls();
?>
<html>
<head>
<?=$MAP_OBJECT->getHeaderJS();?>
<?=$MAP_OBJECT->getMapJS();?>
</head>
<body>
<?=$MAP_OBJECT->printOnLoad();?>
<?=$MAP_OBJECT->printMap();?>
<?=$MAP_OBJECT->printSidebar();?>
</body>

</html>

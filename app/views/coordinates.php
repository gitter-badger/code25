<!DOCTYPE html>
<html>
<head>
<script>
function show_coords(event)
{
var x=event.clientX;
var y=event.clientY;
alert("X coords: " + x + ", Y coords: " + y);
}
</script>
</head>

<body>
<div onmousedown="show_coords(event)">
<h1>dfgdfgdfg</h1>
<p>Click this paragraph, and an alert box will alert the x and y coordinates of the mouse pointer.</p>
<h1>dfgdfgdfg</h1>
</div>

</body>
</html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="http://localhost/code25/public/style.css">
<link rel="stylesheet" type="text/css" href="http://localhost/code25/public/normal.css">
<script src="http://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script>
<script type="text/javascript" src="http://localhost/code25/public/OpenLayer/OpenLayers.js"></script>
<script type="text/javascript" src="http://localhost/code25/public/offline-storage.js"></script>
  </head>
  <body onload="init()">
    <h1 id="title">Offline Storage Example</h1>

    <div id="tags">
        mobile, local storage, persistence, cache, html5
    </div>

    <div id="shortdesc">Caching viewed tiles</div>

    <div id="map" class="smallmap"></div>
    <div>Cache status: <span id="hits"></span> <span id="status"></span></div>
    <div><input id="read" type="checkbox">Read from cache [<input id="tileloadstart" name="type" type="radio">try cache first] [<input id="tileerror" name="type" type="radio">try online first<sup>1</sup>]</div>
    <div><input id="write" type="checkbox">Write to cache</div>
    <div><button id="clear">Clear cached tiles</button><button id="seed">Seed current extent</button>
    <br>
    <p><sup>1</sup> <small>Disconnect your device from the network to test - only works for same origin layers.</small></p>
    <br>
    <div id="docs">
        <p>This example shows how to use the CacheWrite control to cache tiles
        that are being viewed in the browser's local storage, and how to use
        the CacheRead control to use cached tiles when offline or on a slow
        connection. See <a href="offline-storage.js">offline-storage.js</a>
        for the source code.</p>
    </div>
  </body>
</html>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Removing Polylines</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
      <input onclick="removeLine();" type=button value="Remove line">
      <input onclick="addLine();" type=button value="Restore line">
    </div>
    <div id="map"></div>
    <script>

      // This example adds a UI control allowing users to remove the polyline from the
      // map.

      var flightPath;
      var map;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: -0.484549, lng: 117.126789},
          mapTypeId: 'roadmap'
        });

        var flightPathCoordinates = [
          {lat: -0.484549, lng: 117.126789},
          {lat: -0.483970, lng: 117.126655},
          {lat: -18.142, lng: 178.431},
          {lat: -27.467, lng: 153.027}
        ];

        flightPath = new google.maps.Polyline({
          path: flightPathCoordinates,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        addLine();
      }

      function addLine() {
        flightPath.setMap(map);
      }

      function removeLine() {
        flightPath.setMap(null);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuMfmEvT4gnBGN-QDuGH6TTrd3NqsNIsM&callback=initMap">
</script>

  </body>
</html>
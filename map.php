<?php
include 'database.php';

$sql = "SELECT * FROM reports WHERE resolved = 0";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Map</title>
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
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      <?php 
        echo "var reportMap = {";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo $row["cust_phone"].":{ center: {lat: ".$row["cord_lat"].", lng: ".$row["cord_long"]."}, severity: ".$row["severity"]."},";
            }
          }
        echo "};";
      ?>

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: {lat: 39.955072, lng: -75.187796},
          mapTypeId: 'terrain'
        });

        for (var circle in reportMap) {
          setColor = ""
          switch (reportMap[circle].severity){
            case 1: setColor = "#FFFF00"; break;
            case 2: setColor = "#FF9800"; break;
            case 3: setColor = "#FF5722"; break;
          }
          var reportCircle = new google.maps.Circle({
            strokeColor: setColor,
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: setColor,
            fillOpacity: 0.5,
            map: map,
            center: reportMap[circle].center,
            radius: 50
          });
        }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFU9Qbd1TPO5LxPXMWMJQXLJ4rnJ8RVbI&callback=initMap">
    </script>
  </body>
</html>
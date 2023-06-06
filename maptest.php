<!DOCTYPE html>
<html>
<head>
  <style>
    #map {
      height: 400px;
      width: 100%;
    }
  </style>
</head>
<body>
  <h3>My Map</h3>
  <div id="map"></div>

  <script>
   let map;

async function initMap() {
  // The location of Uluru
  const position = { lat: -25.344, lng: 131.031 };
  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

  // The map, centered at Uluru
  map = new Map(document.getElementById("map"), {
    zoom: 4,
    center: position,
    mapId: "DEMO_MAP_ID",
  });

  // Create a car icon
  const carIcon = {
    url: 'img/background.jpg', // Path to the car image file
    scaledSize: new google.maps.Size(40, 40), // Adjust the size as needed
    origin: new google.maps.Point(0, 0),
    anchor: new google.maps.Point(20, 20)
  };

  // The car marker, positioned at Uluru
  const carMarker = new AdvancedMarkerElement({
    map: map,
    position: position,
    icon: carIcon,
    title: "Uluru",
  });
}

initMap();

  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDcWMz2uaG90XlTtaHixGvTK-vUyrwv8A&callback=initMap" async defer></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>Integracion</title>
</head>
<body>
  <h1>Integracion de python con php</h1>
    <?php
	    $output = array();
			exec("E:/prueba.py",$output);
			echo $output[0];
	    if (isset($output))
	    {
				exec("C:/xampp/htdocs/proyecto/python/prueba.py",$output);
	      if (!empty($output))
	      {
	          echo $output[0];
	      }
	      else
	      {
	          echo '<script language="javascript">alert("La variable esta vacio");</script>';
	      }
	    }
    ?>
</body>
</html>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>OSM</title>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css">
</head>
<body>
<h1>Integracion de openstreetmap con php</h1>
<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
<div id="map" class="map map-home" style="margin:12px 0 12px 0;height:400px;"></div>
<script>
	var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
		osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
		osm = L.tileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});
	var map = L.map('map').setView([-2.0998346999999997,  -79.92236639999999], 17).addLayer(osm);
	L.marker([-2.0998346999999997,  -79.92236639999999])
		.addTo(map)
		.bindPopup('Usted esta aqui!.')
		.openPopup();
</script>
  </body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>LESSTRAFFIC</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
	<script src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="js/leaflet.css" />
	<script src="js/leaflet.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>

</head>
<body>
	<h1 align="center">LESSTRAFFIC</h1>
	<div id="mapid" style="margin:12px 0 12px 0;height:650px;"></div>

	<script>
	//<link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
		var contador_data=0;
		var latlngs = new Array();
		var latlngs_data= new Array();
		var arr=new Array();
		var arr_lat_lng=new Array();
		var newcoor_data = new Array();
		var cont_id0=0;
		var cont_id1=0;
		var cont_id2=0;
		var cont_id3=0;
		var cont_id4=0;
		var cont_id5=0;
		var cont_id6=0;
		var cont_id7=0;
		var cont_id8=0;
		var cont_id9=0;
		var cont_id10=0;
		var cont_id11=0;
		var cont_id12=0;
		var cont_id13=0;
		var cont_id14=0;
		cont=0;
		var mymap = L.map('mapid').setView([39.984655,  116.318263], 10);
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'mapbox.streets'
		}).addTo(mymap);
		L.marker([39.984655,  116.318263]).addTo(mymap);
		function onMapClick(e) {
			//latitud = X || longitud = Y
			var lat=e.latlng.lat;
			var lng=e.latlng.lng;
			var newcoor = new Array();
          newcoor[0] =lat;
					newcoor[1] =lng;
       latlngs.push(newcoor);
			 arr_lat_lng[cont]=e.latlng;
			 cont=cont+1;

			 if(cont==1||cont==2)
			 {
				 L.marker(newcoor, {icon: Icon_limite}).addTo(mymap);
				 console.log("newcoor: ",newcoor[0]);
				 console.log("newcoor2: ",newcoor[1]);
			 }
			 if(cont==2)
			 {
				 var distancia_km=distancia(mymap,arr_lat_lng[0],arr_lat_lng[1]);
				 console.log("distancia funcion: ",distancia_km);
				 var polyline = L.polyline(latlngs, {color: 'blue'});
				 //L.circle([39.984655,  116.318263], {radius: 200}).addTo(mymap);
				 //console.log("length_acumulada: "+length_acumulada(polyline))

			 }
			 if (cont==3)
			 {
				 var latlngA=arr_lat_lng[0];
				 //console.log("INI: "+latlngA.distanceTo);
				 var latlngB=arr_lat_lng[1];
				 //console.log("FIN: "+latlngB);
/*
				 var latlng=arr_lat_lng[2];
				 var tolerance = tolerance === undefined ? 0.2 : tolerance;
				 var hypotenuse = latlngA.distanceTo(latlngB),
				 delta = latlngA.distanceTo(latlng) + latlng.distanceTo(latlngB) - hypotenuse;
				 var result=delta/hypotenuse < tolerance
				 console.log(result);
*/
				 carga_puntos(latlngA,latlngB);

			}
//[INI]Calcular la distancia total a lo largo de la linea
/*			 var coords =polyline.getLatLngs();
			 if (coords.length === 0)
					 return [];
			 var total = 0,
					 lengths = [0];
			 for (var i = 0, n = coords.length - 1; i< n; i++)
			 {
					 total += coords[i].distanceTo(coords[i+1]);
					 lengths.push(total);
					 //console.log(lengths);
			 }
	*/
//[FIN]url: "carga_data.php?lat=" + latlngA + "&lng=" + latlngB,
		}
		mymap.on('click', onMapClick);
		function length_acumulada(coords)
		{
			if (typeof coords.getLatLngs == 'function') {
					coords = coords.getLatLngs();
			}
			if (coords.length === 0)
					return [];
			var total = 0,
					lengths = [0];
			for (var i = 0, n = coords.length - 1; i< n; i++) {
					total += coords[i].distanceTo(coords[i+1]);
					console.log(total);
					lengths.push(total);
			}
			return lengths;

		}
		function distancia(map, latlngA, latlngB) {
        return map.latLngToLayerPoint(latlngA).distanceTo(map.latLngToLayerPoint(latlngB));
    }
		function carga_puntos(latlngA,latlngB)
		{
			$.ajax(
				{
					type:"GET",
					url: "carga_data.php",
					success: function(result)
					{
						var JsonResult = JSON.parse(JSON.parse(result));
						for(i=0;i<JsonResult.latlngs.length;i++)
						{
							var id_user=JsonResult.latlngs[i][0];
							var lat_d=JsonResult.latlngs[i][1];
							var lng_d=JsonResult.latlngs[i][2];

							var point=new L.LatLng(lat_d,lng_d);

							var tolerance = tolerance === undefined ? 0.2 : tolerance;
		 				  var hypotenuse = latlngA.distanceTo(latlngB),
		 				 	delta = latlngA.distanceTo(point) + point.distanceTo(latlngB) - hypotenuse;
		 				 	var result=delta/hypotenuse < tolerance

							if(result)
							{
								contador_data=contador_data+1;

								var point_data = new Array();
										point_data[0] =id_user;
										point_data[1] =lat_d;
										point_data[1] =lng_d;
								//console.log(point_data[0]);
								//if(point_data[0]==14){console.log("14 kev");}

								if(point_data[0]==0){cont_id0=cont_id0+1;}
								if(point_data[0]==1){cont_id1=cont_id1+1;}
								if(point_data[0]==2){cont_id2=cont_id2+1;}
								if(point_data[0]==3){cont_id3=cont_id3+1;}
								if(point_data[0]==4){cont_id4=cont_id4+1;}
								if(point_data[0]==5){cont_id5=cont_id5+1;}
								if(point_data[0]==6){cont_id6=cont_id6+1;}
								if(point_data[0]==7){cont_id7=cont_id7+1;}
								if(point_data[0]==8){cont_id8=cont_id8+1;}
								if(point_data[0]==9){cont_id9=cont_id9+1;}
								if(point_data[0]==10){cont_id10=cont_id10+1;}
								if(point_data[0]==11){cont_id11=cont_id11+1;}
								if(point_data[0]==12){cont_id12=cont_id12+1;}
								if(point_data[0]==13){cont_id13=cont_id13+1;}
								if(point_data[0]==14){cont_id14=cont_id14+1;}
								//console.log("id: "+point_data[0]+"||lat: "+point_data[1]+"||lng: "+point_data[2]);
								latlngs_data.push(point_data);
								L.marker(point, {icon: Icon_data}).addTo(mymap);

							}
						}
						console.log("vehiculos 0: "+cont_id0);
						console.log("vehiculos 1: "+cont_id1);
						console.log("vehiculos 2: "+cont_id2);
						console.log("vehiculos 3: "+cont_id3);
						console.log("vehiculos 4: "+cont_id4);
						console.log("vehiculos 5: "+cont_id5);
						console.log("vehiculos 6: "+cont_id6);
						console.log("vehiculos 7: "+cont_id7);
						console.log("vehiculos 8: "+cont_id8);
						console.log("vehiculos 9: "+cont_id9);
						console.log("vehiculos 10: "+cont_id10);
						console.log("vehiculos 11: "+cont_id11);
						console.log("vehiculos 12: "+cont_id12);
						console.log("vehiculos 13: "+cont_id13);
						console.log("vehiculos 14: "+cont_id14);
						//console.log("latlngs bd: "+latlngs_data);
						console.log("Total de vehiculos: "+contador_data);
					}
				});
		}

		var Icon_all = L.Icon.extend({
			options:{
								shadowUrl: 'images/marker_shadow.png',
								iconSize:     [38, 95], // size of the icon
						    shadowSize:   [50, 64], // size of the shadow
						    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
						    shadowAnchor: [4, 62],  // the same for the shadow
						    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
							}
		});
		var Icon_data = new Icon_all({iconUrl: 'images/marker_data.png'}),
    		Icon_limite = new Icon_all({iconUrl: 'images/limite.png'});
		L.icon = function (options) {return new L.Icon(options);};
	</script>
</body>
</html>

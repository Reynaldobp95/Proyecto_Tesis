
<!doctype html>
<html>
  <head>
		<title>LESSTRAFFIC</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<!-- OSM -->
		<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
		<!--<link rel="stylesheet" href="js/leaflet.css" />-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
   integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
   crossorigin=""/>

  </head>
</head>
<body>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<!-- OSM -->
	<!--<script src="js/leaflet.js"></script>-->
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
  integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
  crossorigin=""></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<!-- OSM -->

	<div id="mapid" style="width: 100%;height:100vh;"></div>
	<script>
//<div id="mapid" style="width: 100%;height:100vh;"></div>----------------------------------------------
//<div class="container-fluid"  id="mapid" style="width: 100%;height:100vh;">
//<div id="mapid" style="margin:12px 0 12px 0;height:650px;"></div>
//<div id="mapid" style="margin:-20px 0 0px 0;width: 100%;height:680px;"></div>
/*
<div class="container-fluid" >
	<div class="row">
			<nav class="navbar navbar-light" style="background-color:#000000;">
				<a class="navbar-brand" href="">
					<strong>LESSTRAFFIC<strong>
				</a>
			</nav>
			<div id="mapid" style="margin:-20px 0 0px 0;width: 100%;height:93vh;"></div>
		</div>
	</div>
</div>
*/

		var latlngs = new Array();
		var latlngs_data= new Array();
		var arr=new Array();
		var arr_lat_lng=new Array();
		var newcoor_data = new Array();
		var cont_id0=0;		var cont_id1=0;		var cont_id2=0;		var cont_id3=0;		var cont_id4=0;		var cont_id5=0;		var cont_id6=0;		var cont_id7=0;
		var cont_id8=0;		var cont_id9=0;		var cont_id10=0;		var cont_id11=0;		var cont_id12=0;		var cont_id13=0;		var cont_id14=0;
		var contador_data=0;		cont=0;
		var cont_secciones=0;
		var mymap = L.map('mapid').setView([39.984655,  116.318263], 10);
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'mapbox.streets'
		}).addTo(mymap);

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
       }
			 if(cont==2)
			 {
				 var polyline = L.polyline(latlngs, {color: ''}).addTo(mymap);
				 var centro_linea=polyline.getCenter();
				 //L.marker(centro_linea, {icon: Icon_limite}).addTo(mymap);
				 console.log("centro: "+polyline.getCenter());
				 var distancia_km=parseInt(distancia(mymap,arr_lat_lng[0],arr_lat_lng[1]));
				 console.log("distancia funcion: ",distancia_km);
				 var circulo=L.circle(centro_linea, {radius: distancia_km*80}).addTo(mymap);
			 }
			 if (cont==3)
			 {
				 var latlngA=arr_lat_lng[0];
				 //console.log("INI: "+latlngA.distanceTo);
				 var latlngB=arr_lat_lng[1];
				 var latlng=arr_lat_lng[2];
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
							cont_secciones=cont_secciones+1
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
										point_data[2] =lng_d;
                latlngs_data.push(point_data);

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
								//L.marker(point, {icon: Icon_data}).addTo(mymap);
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
						console.log("Total de vehiculos: "+contador_data);
            capa_point(latlngs_data);
            //console.log("id: "+latlngs_data[0]+"||lat: "+latlngs_data[1]+"||lng: "+latlngs_data[2]);
					}

				});
        //console.log(latlngs_data);

		}
		var Icon_all = L.Icon.extend({
			options:{
								//shadowUrl: 'images/marker_shadow.png',
								iconSize:     [28, 35], // size of the icon [38, 95]
						    //shadowSize:   [50, 64], // size of the shadow [50, 64]
						    iconAnchor:   [12, 34], // point of the icon which will correspond to marker's location [22, 94]
						    //shadowAnchor: [4, 62],  // the same for the shadow [4, 62]
						    //popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor [-3, -76]
							}
		});

		var Icon_data = new Icon_all({iconUrl: 'images/marker_data.png'}),
    		Icon_limite = new Icon_all({iconUrl: 'images/limite.png'});
		L.icon = function (options) {return new L.Icon(options);};

    function capa_point(cordenada)
    {
      var arr_puntos0=new Array();      var arr_puntos1=new Array();      var arr_puntos2=new Array();      var arr_puntos3=new Array();
      var arr_puntos4=new Array();      var arr_puntos5=new Array();      var arr_puntos6=new Array();      var arr_puntos7=new Array();
      var arr_puntos8=new Array();      var arr_puntos9=new Array();      var arr_puntos10=new Array();      var arr_puntos11=new Array();
      var arr_puntos12=new Array();      var arr_puntos13=new Array();      var arr_puntos14=new Array();
      var user_id0;      var user_id1;      var user_id2;      var user_id3;      var user_id4;      var user_id5;      var user_id6;      var user_id7;
      var user_id8;      var user_id9;      var user_id10;      var user_id11;      var user_id12;      var user_id13;      var user_id14;
      var layerControl = false;
      var puntos_mapa;
      for(i=0;i<cordenada.length;i++)
      {
        if(cordenada[i][0]==0)
        {
          user_id0=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos0.push(user_id0);
        }
        if(cordenada[i][0]==1)
        {
          user_id1=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos1.push(user_id1);
        }
        if(cordenada[i][0]==2)
        {
          user_id2=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos2.push(user_id2);
        }
        if(cordenada[i][0]==3)
        {
          user_id3=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos3.push(user_id3);
        }
        if(cordenada[i][0]==4)
        {
          user_id4=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos4.push(user_id4);
        }
        if(cordenada[i][0]==5)
        {
          user_id5=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos5.push(user_id5);
        }
        if(cordenada[i][0]==6)
        {
          user_id6=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos6.push(user_id6);
        }
        if(cordenada[i][0]==7)
        {
          user_id7=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos7.push(user_id7);
        }
        if(cordenada[i][0]==8)
        {
          user_id8=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos8.push(user_id8);
        }
        if(cordenada[i][0]==9)
        {
          user_id9=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos9.push(user_id9);
        }
        if(cordenada[i][0]==10)
        {
          user_id10=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos10.push(user_id10);
        }
        if(cordenada[i][0]==11)
        {
          user_id11=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos11.push(user_id11);
        }
        if(cordenada[i][0]==12)
        {
          user_id12=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos12.push(user_id12);
        }
        if(cordenada[i][0]==13)
        {
          user_id13=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos13.push(user_id13);
        }
        if(cordenada[i][0]==14)
        {
          user_id14=L.marker([cordenada[i][1],cordenada[i][2]], {icon: Icon_data});
          arr_puntos14.push(user_id14);
        }
      }

      if(layerControl === false) {
          layerControl = L.control.layers().addTo(mymap);
      }
      var puntos_mapa0=L.layerGroup(arr_puntos0).addTo(mymap);
      var puntos_mapa1=L.layerGroup(arr_puntos1).addTo(mymap);
      var puntos_mapa2=L.layerGroup(arr_puntos2).addTo(mymap);
      var puntos_mapa3=L.layerGroup(arr_puntos3).addTo(mymap);
      var puntos_mapa4=L.layerGroup(arr_puntos4).addTo(mymap);
      var puntos_mapa5=L.layerGroup(arr_puntos5).addTo(mymap);
      var puntos_mapa6=L.layerGroup(arr_puntos6).addTo(mymap);
      var puntos_mapa7=L.layerGroup(arr_puntos7).addTo(mymap);
      var puntos_mapa8=L.layerGroup(arr_puntos8).addTo(mymap);
      var puntos_mapa9=L.layerGroup(arr_puntos9).addTo(mymap);
      var puntos_mapa10=L.layerGroup(arr_puntos10).addTo(mymap);
      var puntos_mapa11=L.layerGroup(arr_puntos11).addTo(mymap);
      var puntos_mapa12=L.layerGroup(arr_puntos12).addTo(mymap);
      var puntos_mapa13=L.layerGroup(arr_puntos13).addTo(mymap);
      var puntos_mapa14=L.layerGroup(arr_puntos14).addTo(mymap);
      layerControl.addOverlay(puntos_mapa0, "Vehiculo 0")
                  .addOverlay(puntos_mapa1, "Vehiculo 1")
                  .addOverlay(puntos_mapa2, "Vehiculo 2")
                  .addOverlay(puntos_mapa3, "Vehiculo 3")
                  .addOverlay(puntos_mapa4, "Vehiculo 4")
                  .addOverlay(puntos_mapa5, "Vehiculo 5")
                  .addOverlay(puntos_mapa6, "Vehiculo 6")
                  .addOverlay(puntos_mapa7, "Vehiculo 7")
                  .addOverlay(puntos_mapa8, "Vehiculo 8")
                  .addOverlay(puntos_mapa9, "Vehiculo 9")
                  .addOverlay(puntos_mapa10, "Vehiculo 10")
                  .addOverlay(puntos_mapa11, "Vehiculo 11")
                  .addOverlay(puntos_mapa12, "Vehiculo 12")
                  .addOverlay(puntos_mapa13, "Vehiculo 13")
                  .addOverlay(puntos_mapa14, "Vehiculo 14");
    }
/*
    var puntos_mapa=L.layerGroup().addLayer(L.marker([39.984655,  116.318263]))
                                  .addLayer(L.marker([39.986655,  116.5163]))
                                  .addLayer(L.marker([39.987655,  116.611263])).addTo(mymap);
    if(layerControl === false) {
        layerControl = L.control.layers().addTo(mymap);
    }
    layerControl.addOverlay(puntos_mapa, "Gardens");
*/
	</script>
</body>
</html>

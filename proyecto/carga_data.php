<?php
$cont_lat=0;
$cont_long=0;
$cont=0;
$conn_string = "host='localhost' port='5432' dbname='postgres' user='postgres' password='root'";
$dbconn = pg_connect($conn_string)or die('No se ha podido conectar: ' . pg_last_error());
//$query_all   ="select user_id,latitud,longitud from dataset limit 10000";
$query_all   ="select user_id,latitud,longitud from dataset where fecha >= '2008-10-23 06:00:00' and fecha <= '2008-10-24 12:00:00'";
//$query_all   ="select latitud,longitud from dataset where user_id=14 and fecha >= '2008-10-23 06:00:00' and fecha <= '2008-10-23 12:00:00'";
$result_all  = pg_query($query_all);
while($row_all=pg_fetch_row($result_all))
{
  $arr_latlngs[$cont]=$row_all;
  $cont=$cont+1;
}
$myJSON_latlngs = json_encode($arr_latlngs);
pg_close($dbconn);
$array = '{"latlngs":'. $myJSON_latlngs.'}';
echo(json_encode($array));
?>

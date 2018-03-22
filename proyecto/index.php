<!DOCTYPE html>
<html>
<head>
  <title>Integracion</title>
</head>
<body>
  <h1>Integracion de python con php</h1>
    <?php
	    $output = array();
			$parametro=10;
	    if (isset($output))
	    {
				exec("C:\Users\Amy\AppData\Local\Programs\Python\Python36-32\python.exe C:/xampp/htdocs/proyecto/python/prueba.py $parametro",$output);
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

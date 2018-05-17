<?php

	include ("conexion.php");
	
	if (!$con) {
    	die('No pudo conectarse: ' . mysqli_error());
	}
		$busqueda = $_REQUEST["busqueda"];
		//$busqueda = '1';
		echo $busqueda;
		
        $query = "SELECT COUNT(num_animalito) AS CANT FROM ruleta_activa where num_animalito LIKE '".$busqueda."%'  LIMIT 0, 20";
        //echo $query;
		//$result = $con->query($query); 
	    $result = mysqli_query($con,$query);
		//if(mysqli_num_rows($result)==0) echo("email was not found"); else echo("email was found");

		while($row = mysqli_fetch_array($result)) {
			//cantidad = rs.getInt("CANT");
			$cantidad = $row['CANT'];

		}

		//mysqli_close($con);
  	
		
		if ($cantidad == 0) {
			/* 0: no se vuelve por mas resultados
			vacio: cadena a mostrar, en este caso no se muestra nada */
			echo "0&vacio";
		}
		else
		{
			if($cantidad>=1) echo "1&"; 
			else echo "0&";
	
			$cantidad=1;
			$query = "SELECT numero,num_animalito,animalito FROM ruleta_activa where num_animalito LIKE '".$busqueda."%'  LIMIT 0, 40";
			//$query = "select NRO_PAT,RAZON_SOCIAL from establecimientos where NRO_PAT LIKE '".$busqueda."%'  LIMIT 0, 100";
			//echo $query;
			$result = mysqli_query($con,$query);

			while($row = mysqli_fetch_array($result)) {
				//cantidad = rs.getInt("CANT");
				$num_animalito = $row['num_animalito'];
				$animalito = $row['animalito'];		
				
				//String rso =rs.getString("RAZON_SOCIAL");
				
				//out.print("<div onClick=\"clickLista(this);\" onMouseOver=\"mouseDentro(this);\">" + nro + "</div>");
				
				//echo "<div onClick=\"clickLista(this);\" onMouseOver=\"mouseDentro(this);\">" + $NRO_PAT + "</div>";
				// Muestro solo 20 resultados de los 22 obtenidos
				echo "<div onClick=\"clickLista(this);\" onMouseOver=\"mouseDentro(this);\">".$num_animalito." ".$animalito."</div>";
				
				$cantidad = $cantidad + 1;
				//out.print(rso);
			}
		}
		
?>


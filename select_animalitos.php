<?php
$strquery = "SELECT numero,num_animalito,animalito FROM ruleta_activa";
	//echo $strquery;
	$result= mysqli_query($con,$strquery);

	if (!$result) {
	    $mensaje  = 'Consulta no válida: ' . mysqli_error() . "\n";
	    $mensaje .= 'Consulta completa: ' . $strquery;
	    die($mensaje);
	}

	echo "<select class=form-control multiple name=animalito[] style=height:660px>";
	echo "<label>";
	//while ($row = mysqli_fetch_assoc($resultado)){
	while($row = mysqli_fetch_array($result)) {  
		$numero = $row['numero'];
		$num_animalito = $row['num_animalito'];
		$animalito = $row['animalito'];		
		echo "<option value=" .$num_animalito. "_" .$animalito. ">" .$num_animalito. " " .$animalito. "</option>";
	}
	echo "</label>";
	echo "</select>";
	//$hoy = date();
?>

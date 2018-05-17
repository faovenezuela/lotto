<?php
//-----------------------------------------------------
//Funcion que se encarga de agregar por primera vez
//los animalitos a la tabla jugadas
//-----------------------------------------------------
echo "eeeeeeeeeeeeeeee";

//if (!is_null($insert)){
	echo 'aqui';
	
	//Variable que indica si debo insertar
	$deboinsertar=0;
	//-----------------------------------------------------
	//Elaborando el serial	
	//-----------------------------------------------------
	//$nuevoserial="".date(Y)."".date(m). "".date(d)."" .date(H). "".date(mi)."";
	
	
	
	if (!empty($monto)){
		
		$varmonto=0;
		
	}else{
		
		echo "Seleccione un monto ";
		$varmonto=1;
		
	}
	
	if ($monto!=0){
		
		$varmonto=0;
		
	}else{
		
		echo "Monto no puede ser cero ";
		$varmonto=1;
		
	}
	//echo "varmonot" .$varmonto;
	/*if (!empty($animalito)){
		
		$deboinsertar=0;
		
	}else{
		
		echo "Seleccione un Animalito";
		$deboinsertar=1;
		
	}*/
	
	
		//----------------------------------------------------------------------------------
		//Buscar en jugada si flag_imprimir es 0 si es 1 no hacer nada e incrementar $serial
		//----------------------------------------------------------------------------------
		//$strquery_flag = "SELECT Serial,Sorteo,Flag_imprimir FROM jugadas where (Serial='".$nuevoserial."' and Flag_imprimir=False)";
		
		$strquery_flag3 = "SELECT Serial,Sorteo,Flag_imprimir FROM jugadas where Serial='".$nuevoserial."'";
		
		echo $strquery_flag3;
		
		$result_flag3= mysqli_query($con,$strquery_flag3);

		if (!$resul_flag3) {
			
			$deboinsertar=0;
			
		}else{
			
			$deboinsertar=1;
			
		}	
			//$mensaje  = 'Consulta no válida: ' . mysqli_error() . "\n";
			//$mensaje .= 'Consulta completa: ' . $strquery_flag;
			//die($mensaje);
			
			//si se mete aqui, significa que serial ya fue usado
			//Colocamos una variable para que no vuelva a insertar otro regitro
			
			//echo "Serial fue usado";
				//----------------------------------------------------------------------------------
				//Debo revisar si en realidad el $serial fue usado
				//----------------------------------------------------------------------------------
				/*$strquery_serialusado = "SELECT Serial,Sorteo,Flag_imprimir FROM jugadas where Serial='".$nuevoserial."'";
				
				echo $strquery_serialusado;
				
				$result_serialusado= mysqli_query($con,$strquery_serialusado);

				if (!$resul_serialusado) {
					//$mensaje  = 'Consulta no válida: ' . mysqli_error() . "\n";
					//$mensaje .= 'Consulta completa: ' . $strquery_flag;
					//die($mensaje);
					
					//si se mete aqui, significa que serial ya fue usado
					//Colocamos una variable para que no vuelva a insertar otro regitro
					$deboinsertar=0;
				}**/
		//}
		
	//------------------------------------------------------
	if ($deboinsertar==0 && $varmonto==0){
		

		// Concatenar numero de animalito

		if ($buscar_txt=='1'){
			$buscar_txt= '0'.$buscar_txt;			
		} 

		if ($buscar_txt=='2'){
			$buscar_txt= '0'.$buscar_txt;
		} 

		echo $buscar_txt;
		 //$buscar_txt==3 || $buscar_txt==4 || $buscar_txt==5 || $buscar_txt==6 || $buscar_txt==7 || $buscar_txt==8 || $buscar_txt==9){
		

			
		
		}	
		//-----------------------------
		//Busco el nombre del animatilo
		//-----------------------------
		$strqueryani = "SELECT animalito FROM ruleta_activa where num_animalito='".$buscar_txt."'";
		//echo $strqueryani;
		$resultani= mysqli_query($con,$strqueryani);

		if (!$resultani) {
			$mensaje  = 'Consulta no válida: ' . mysqli_error() . "\n";
			$mensaje .= 'Consulta completa: ' . $strqueryani;
			die($mensaje);
		}

		
		while($rowani = mysqli_fetch_array($resultani)) {  
			
			$animalitol = $rowani['animalito'];		
			
		}
		
		//------------------------------------------------------------------------------------------------------------
		$pagar=$monto*30;
		$insert_jug = "INSERT jugadas (Serial,Fecha,Sorteo,Animalito,Num_animalito, ".
						"Monto,Total,Pagar)".
						" values('".$nuevoserial."',NOW(),'".$select_sorteo."','".$animalitol."','".$buscar_txt. "'" .
						",'" .$monto. "','" .$total. "'," .$pagar. ")";

		echo $insert_jug;

					   
			if (mysqli_query($con, $insert_jug)) {
					
				//echo "Planilla actualizada";

			} else {
			
				echo "<p><font color=#000080 size=2 face=Arial Narrow>Los datos no han sido guardados</font></p>";
			}

		//}// fin del if si debo insertar $deboinsertar=0;
//} // fin del insert

?>
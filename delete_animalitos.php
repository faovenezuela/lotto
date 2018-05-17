<?php
//-----------------------------------------------------
//Funcion que se encarga de eliminar por primera vez
//los animalitos a la tabla jugadas
//-----------------------------------------------------
//if (!is_null($check)){
	//isset(

		
		
		/*$insert_jug = "INSERT jugadas (Serial,Fecha,Sorteo,Num_animalito, ".
                        "Monto,Total)".
                        " values('".$nuevoserial."',NOW(),'".$select_sorteo."','".$buscar_txt. "'" .
                        ",'" .$monto. "','" .$total. "')";

		*/
	//if(!empty($_POST['check'])) {
		
		//echo 'check aaaaaaaa	';
if(!empty($_REQUEST['check'])) {
			//echo $check;
			
	//echo 'check aaaaaaaa	';
	foreach ($_REQUEST['check'] as $select_delete)
		{
		//echo "<span><b>".$select_delete."</b></span><br/>";

		$delete_for = "DELETE FROM jugadas WHERE Num_ticket=" .
		   "" . $select_delete . "";

		//echo $delete_for;
		if (mysqli_query($con, $delete_for)) {

			echo "<font color=#0000FF face=Arial Narrow>Animalito Eliminado: ".$select_delete."</font>";
		}else{
			echo "<font color=#FF0000 face=Arial Narrow>Animalito NO eliminado</font>";
		} 
		
	}
}
	//}// fin del if
	
?>

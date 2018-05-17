<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Sistema de Gestion de Animalitos</title>
		
		<meta name="author" content="falvarez" />
		<link rel="shortcut icon" href="images/if_roulette_icons_73218.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="css/bootstrap.min.css">
  		<script src="jquery.min.js"></script>
  		<script src="js/bootstrap.min.js"></script>

		<script type="text/javascript">
		function validateForm() {
			//var e = document.getElementById("loteria");
			//alert (e);


		    var check = document.forms["myForm"]["loteria"].value;
		    if (check == "") {
			alert("Indique la loteria y hora del jugada");
			return false;
		    }

		    var x = document.forms["myForm"]["monto"].value;
		    if (x == "") {
			alert("Suministre un Monto Valido");
			return false;
		    }

		    var y = document.forms["myForm"]["numero"].value;
		    if (y == "") {
			alert("Suministre un Numero Valido");
			return false;
		    }
		    
		}
		</script>
		<script type="text/javascript">
			// Solo permite ingresar numeros.
			function soloNumeros(e){
				var key = window.Event ? e.which : e.keyCode
				if(key == 13)
				{
				    alert(document.getElementById("monto").value);
				    document.getElementById("sel2").value = document.getElementById("monto").value;
				}
				return (key >= 48 && key <= 57)
			}
		</script>
		<script>
			function funcion_agregar() {
				var sel1 = document.getElementById("sel1");
				var selectedValue = sel1.options[sel1.selectedIndex].value;
				document.getElementById("monto").focus();	
				    //alert(selectedValue);
				//alert 'heelo';
			    //document.getElementById("monto").value = selectedValue;
			}
		</script>

		<script>
		// Funcion para limitar el numero de caracteres de un textarea o input
		// Tiene que recibir el evento, valor y número máximo de caracteres
		function limitar(e, contenido, caracteres)
		{
		    // obtenemos la tecla pulsada
		    var unicode=e.keyCode? e.keyCode : e.charCode;
	 
		    // Permitimos las siguientes teclas:
		    // 8 backspace
		    // 46 suprimir
		    // 13 enter
		    // 9 tabulador
		    // 37 izquierda
		    // 39 derecha
		    // 38 subir
		    // 40 bajar
		    if(unicode==8 || unicode==46 || unicode==13 || unicode==9 || unicode==37 || unicode==39 || unicode==38 || unicode==40)
		        return true;
	 
		    // Si ha superado el limite de caracteres devolvemos false
		    if(contenido.length>=caracteres)
		        return false;
	 
		    return true;
		}
    		</script>
    		<script>
    		function contarSeleccionados()
			{
			  var sel=0;
			  if (document.getElementById('cbox10').checked)
			  {
				sel=1;
			  }
			  if (document.getElementById('cbox11').checked)
			  {
				sel=1;
			  }
			  if (document.getElementById('cbox12').checked)
			  {
				sel=1;
			  }
			  if (document.getElementById('cbox1').checked)
			  {
				sel=1;
			  }
			  if (document.getElementById('cbox4').checked)
			  {
				sel=1;
			  }
			  if (document.getElementById('cbox5').checked)
			  {
				sel=1;
			  }
			  if (document.getElementById('cbox6').checked)
			  {
				sel=1;
			  }
			  if (document.getElementById('cbox7').checked)
			  {
				sel=1;
			  }
			  if (sel==1){
				  
				alert('Usted debe seleccionar un sorteo');
			}
			</script>
			<script type="text/javascript" src="animalitos.js"></script>
			<script>
			/* 
			* Parametros mandatorios 
			*/ 
			var seconds = 1; // el tiempo en que se refresca 
			var divid = "refrescar_entrenos"; // el div que quieres actualizar! 
			var url = "web/salas/sala_entrenos.php"; // el archivo que ira en el div 

			function refreshdiv(){ 

				// The XMLHttpRequest object 

				var xmlHttp; 
				try{ 
					xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari 
				} 
				catch (e){ 
					try{ 
						xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer 
					} 
					catch (e){ 
						try{ 
							xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); 
						} 
						catch (e){ 
							alert("Tu explorador no soporta AJAX."); 
							return false; 
						} 
					} 
				} 

				// Timestamp for preventing IE caching the GET request 
				var timestamp = parseInt(new Date().getTime().toString().substring(0, 10)); 
				var nocacheurl = url+"?t="+timestamp; 

				// The code... 

				xmlHttp.onreadystatechange=function(){ 
					if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){ 
						document.getElementById(divid).innerHTML=xmlHttp.responseText; 
						setTimeout('refreshdiv()',seconds*1000); 
					} 
				} 
				xmlHttp.open("GET",nocacheurl,true); 
				xmlHttp.send(null); 
			} 

			// Empieza la función de refrescar 

			window.onload = function(){ 
				refreshdiv(); // corremos inmediatamente la funcion 
			} 
	</script>		
	</head>
	<body onLoad="asignaVariables();">
	<div class="container-fluid">
	  <h1>Estadisticas y Ganadores</h1>
	  <p>Suministre el numero ganador para ver tickes premiados</p>
	  
	  <form name="myForm" action="ganadores.php" onsubmit="return validateForm()" method="post">
		  
		<?php
		$buscar_txt	= $_REQUEST['buscar_txt'];
		$nuevoserial = $_REQUEST['serial'];
		$varimprimir = $_REQUEST['varimprimir'];
		$fecha = $_REQUEST['fecha'];
		$animalito = $_REQUEST['input_2'];
		$animal = $_REQUEST['animal'];
		$sorteo = $_REQUEST['sorteo'];
		$monto = $_REQUEST['monto'];
		$total 	= $_REQUEST['total'];
		$ver = $_REQUEST['ver'];
		$vertodo = $_REQUEST['vertodo'];
		$check = $_REQUEST['check'];
		
		include("conexion.php");
		
		
		
		
		
		//Seleccion de loteria el sorteo
		if(!empty($_POST['sorteo'])) {
			//echo $sorteo;
			foreach ($_REQUEST['sorteo'] as $select_sorteo)
			{
				//echo "<span><b>".$select_sorteo."</b></span><br/>";
				//Seleccion de animalito
				if(!empty($_POST['buscar_txt'])) {
					//foreach ($_REQUEST['animalito'] as $select_animalito)
					//{
						//echo "<span><b>".$buscar_txt."</b></span><br/>";
						//-include("ver_animalitos.php");
					//}
				}else { 
					echo "<span>Por favor seleccione un Animalito.</span><br/>";
				}
			}
		}else { 
			echo "<span>Por favor seleccione un <br>Sorteo.</span><br/>";
		}
		
		
		?>
		
		
		
	  <div class="row">
	    <div class="col-sm-4" style="background-color:lavender;">
		<div class="form-group-sm">
			<label for="serial-sm"></label>
			<table class="table">
    <thead>
      <tr>
        <th>Sorteo</th>
        
      </tr>
    </thead>
    <tbody>
      <?php

	$strquery_hora = "SELECT Descripcion,Hora FROM ruleta_activa_horas";
	//echo $strquery_hora;
	$result_hora= mysqli_query($con,$strquery_hora);

	if (!$result_hora) {
	    $mensaje_jug  = 'Consulta no válida: ' . mysqli_error() . "\n";
	    $mensaje_jug .= 'Consulta completa: ' . $strquery_hora;
	    die($mensaje_jug);
	}
?>    
      <tr class="success">
        <td><div class="success">
			
			
			<select class=form-control multiple name="sorteo[]" style=" font-size:14px; font-family:Verdana, Arial, Helvetica, sans-serif;width:300px; height:160px">
		<label>
<?php 
	while($roww = mysqli_fetch_array($result_hora)) { 
		$descripcion = $roww['Descripcion'];			
		$hora = $roww['Hora'];
		
		//echo "<option value=".$hora." select>".$sorteo[0]."</option>";;	
		if ($sorteo[0] == $hora) {		
					
			echo "<option value=".$hora." select>".$hora."</option>";
		
		}else{
			echo "<option value=".$hora.">".$descripcion."</option>";
		}
		
	}		
		
?>		

    	</label>
  	</div></td>
        
      </tr>
        <tr class="Warning">
        <td><div class="Warning">
			<label>
			  
          	</label>
		</div>
		</td>
        
      </tr>
    </tbody>
  </table>

	
		    
		    
			
		</div>
	    </div>
	
    <div class="col-sm-4" style="background-color:lavenderblush;">

<table class="table">
    <thead>
      <tr>
        <th>Numeros</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
			
			<div id="demo" style="width:269px; height:24px">
				<div id="demoDer"  style="width: 194px; height: 24px">
				  <div align="left">
					<input name="buscar_txt" type="text" class="form-control" id="input_2"
						onfocus="if(document.getElementById('lista').childNodes[0]!=null && this.value!='') { filtraLista(this.value); formateaLista(this.value); 
							reiniciaSeleccion(); document.getElementById('lista').style.display='block'; }"
						onblur="if(v==1) document.getElementById('lista').style.display='none';" 							
						onkeyup="if(navegaTeclado(event)==1) {
							clearTimeout(ultimoIdentificador); 
							ultimoIdentificador=setTimeout('rellenaLista()', 1000); }" 
							size="100" 
							style="background-color: #E5E5E5;"
							onclick="clickLista(this.value)" 
							style="font-size: 20; "							
							onKeyPress="return soloNumeros(event) "
							autocomplete="off">
				  </div>
				  <div id="lista" onmouseout="v=1;" onmouseover="v=0;" style="position: absolute; left: 76px; top: 25px"></div>
				</div>      
				<div class="mensaje" id="error"></div>
			  </div>
		<?php 
		  //include("select_animalitos.php");onblur="if(v==1) document.getElementById('lista').style.display='none';" 
		?>
		
		</td>
      </tr>
    </tbody>
  </table>

	
	</div>
    <div class="col-sm-4" style="background-color:lavender;">

	<label for="monto-sm"></label>
    <input type="HIDDEN" value="<?php echo $sorteo_jug;?>" name="sorteo_jug">
	<input type="HIDDEN" value="<?php echo $monto_jug;?>" name="monto_jug">
	<input type="HIDDEN" value="<?php echo $total;?>" name="total">
	<input type="HIDDEN" value="<?php echo $animalito_jug;?>" name="animalito_jug">
	<input type="HIDDEN" value="<?php echo $animalitoletra;?>" name="animalitoletra">
	<input type="HIDDEN" value="<?php echo $nuevoserial;?>" name="nuevoserial">
	<input type="HIDDEN" value="<?php echo $varimprimir;?>" name="varimprimir">
	
	<input type="submit"  class="btn btn-info" value="Ver" name="ver">
	
	</form>
	<form method="POST" action="ganadores.php">
		
		<input type="HIDDEN" value="<?php echo $sorteo_jug;?>" name="sorteo_jug">
		<input type="HIDDEN" value="<?php echo $monto_jug;?>" name="monto_jug">
		<input type="HIDDEN" value="<?php echo $total;?>" name="total">
		<input type="HIDDEN" value="<?php echo $animalito_jug;?>" name="animalito_jug">
		<input type="HIDDEN" value="<?php echo $animalitoletra;?>" name="animalitoletra">
		<input type="HIDDEN" value="<?php echo $nuevoserial;?>" name="nuevoserial">
		<input type="HIDDEN" value="<?php echo $varimprimir;?>" name="varimprimir">							 
		<input type="submit"  class="btn btn-info" value="Ver todas las jugadas" name="vertodo">                       
    </form>	
	<form method="POST" action="menu_principal.php">
		
		<input type="HIDDEN" value="<?php echo $sorteo_jug;?>" name="sorteo_jug">
		<input type="HIDDEN" value="<?php echo $monto_jug;?>" name="monto_jug">
		<input type="HIDDEN" value="<?php echo $total;?>" name="total">
		<input type="HIDDEN" value="<?php echo $animalito_jug;?>" name="animalito_jug">
		<input type="HIDDEN" value="<?php echo $animalitoletra;?>" name="animalitoletra">
		<input type="HIDDEN" value="<?php echo $nuevoserial;?>" name="nuevoserial">
		<input type="HIDDEN" value="<?php echo $varimprimir;?>" name="varimprimir">							 
		<input type="submit"  class="btn btn-info" value="Cerrar">                       
    </form>	
    </div>
    
  </div>

<div class="row">
    <div class="col-sm-2" style="background-color:lavender;">

    </div>
    <div class="col-sm-8" style="background-color:powderblue;">
	

<?php
if (!is_null($vertodo)){
		$strquery_jug = "SELECT Num_ticket,Serial,Fecha,Animalito,Sorteo,Num_animalito,Monto,Pagar FROM jugadas".
	" where (Flag_imprimir=TRUE and ".
	"Fecha >= DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00'))";
	$ejecutar=1;
}	
if (!is_null($ver)){
	$strquery_jug = "SELECT Num_ticket,Serial,Fecha,Animalito,Sorteo,Num_animalito,Monto,Pagar FROM jugadas".
	" where (Num_animalito='".$buscar_txt."' and Flag_imprimir=TRUE and ".
	"Fecha >= DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00'))";
	$ejecutar=1;
}
if (!is_null($ejecutar)){	
	//echo $strquery_jug;
	$result_jug= mysqli_query($con,$strquery_jug);

	if (!$result_jug) {
	    $mensaje_jug  = 'Consulta no válida: ' . mysqli_error() . "\n";
	    $mensaje_jug .= 'Consulta completa: ' . $strquery_jug;
	    die($mensaje_jug);
	}
?>

<table class="table">
    <thead>
      <tr>
		<th>Serial</th>
		<th>Fecha</th>
        <th>Sorteo</th>        
        <th>Animalito</th>
        <th>Numero</th> 
        <th>Monto</th>     
        <th>Pagar</th> 
      </tr>
    </thead>
    <tbody>
<?php

	$total=0;
	
	while($fila = mysqli_fetch_array($result_jug)) { 
		
		$serial = $fila['Serial'];
		$fecha = $fila['Fecha'];
		$Num_ticket = $fila['Num_ticket'];
		$sorteo_jug = $fila['Sorteo'];
		$monto_jug = $fila['Monto'];
		$animalito_jug = $fila['Num_animalito']; 
		$animalitoletra = $fila['Animalito'];
		$pagar = $fila['Pagar'];
		echo "<tr class=info>";
		echo "<td>";
		echo "" .$serial. "";
		echo "</td>";
		echo "<td>";
		echo "" .$fecha. "";
		echo "</td>";
        echo "<td>";				
		//echo "<input type=checkbox>" .$sorteo_jug. " " .$animalito_jug. " " .$monto_jug. ""; Opciones en eliminar
		//echo "<input type=checkbox name=check[] id=check[]  value="echo $Num_ticket;">";
		//echo "<input type=checkbox name=check[] id=check[]  value=".$Num_ticket.">";
		if (($sorteo_jug==10) || ($sorteo_jug==11)){
			echo "" .$sorteo_jug. " AM";
		}else{
			echo "" .$sorteo_jug. " PM";
		}	
		echo "</td>";
		echo "<td>";
		echo "" .$animalitoletra. "";
		echo "</td>";
		echo "<td>";
		echo "" .$animalito_jug. "";
		echo "</td>";	
		echo "<td>";
		echo "" .$monto_jug. "";
		echo "</td>";	
		echo "<td>";
		echo "" .$pagar. "";
		echo "</td>";
		echo "</tr>";
		$total=$total+$monto_jug;
	}
		echo "<tr>";
		echo "<td>";
		echo "";
		echo "</td>";
		
		echo "<td><h4>";
		echo "Total Jugado:";
		echo "</h4></td>";		
		
		
		echo "<td><h4>";
		echo "" .$total. "";
		echo "</h4></td>";		
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>";
		echo "";
		echo "</td>";
		
		echo "<td><h4>";
		echo "Total a Pagar:";
		echo "</h4></td>";		
		
		
		echo "<td><h4>";
		$pagar=$total*30;
		echo "" .$pagar. "";
		echo "</h4></td>";		
		echo "</tr>";
}		
?>
	
    </tbody>
  </table>

    </div>
    
  </div>
<div class="row">
    <div class="col-sm-4" style="background-color:lavender;">
	<?php
		echo 'Fecha: ';
		echo date('d-m-Y');
	?>
	</div>
    <div class="col-sm-8" style="background-color:lavenderblush;">&nbsp
    </div>
    
  </div>
</div>
<?php

	$strquery_resultados = "SELECT id_ruleta_activa,fecha_result,resultado,Hora_num,Descripcion FROM ruleta_activa_resultado".
	" INNER JOIN ruleta_activa_horas ON ruleta_activa_resultado.id_ruleta_activa=ruleta_activa_horas.id".
	" where fecha_result >= DATE_FORMAT(NOW(),'%Y-%m-%d 00:00:00')";

	//echo $strquery_resultados;
	$result_resultados= mysqli_query($con,$strquery_resultados);

	if (!$result_resultados) {
	    $mensaje_jug  = 'Consulta no válida: ' . mysqli_error() . "\n";
	    $mensaje_jug .= 'Consulta completa: ' . $strquery_resultados;
	    die($mensaje_jug);
	}
?>

<table class="table">
    <thead>
      <tr>
		<th>Id</th>
		<th>Fecha</th>               
        <th>Hora</th>
        <th>Descripcion</th> 
        <th>Resultado</th> 
        <th></th>     
        <th></th> 
      </tr>
    </thead>
    <tbody>
<?php

	
	
	while($fila_r = mysqli_fetch_array($result_resultados)) { 
		
		$id_ruleta_activa = $fila_r['id_ruleta_activa'];
		$fecha_result = $fila_r['fecha_result'];
		$resultado = $fila_r['resultado'];
		$Hora_num = $fila_r['Hora_num'];
		$Descripcion = $fila_r['Descripcion'];

		echo "<tr class=info>";
		echo "<td>";
		echo "" .$id_ruleta_activa. "";
		echo "</td>";
		echo "<td>";
		echo "" .$fecha_result. "";
		echo "</td>";        
		echo "<td>";
		echo "" .$Hora_num. "";
		echo "</td>";
		echo "<td>";
		echo "" .$Descripcion. "";
		echo "</td>";	
		echo "<td>";				
		echo "" .$resultado. "";
		echo "</td>";
		echo "<td>";
		echo "";
		echo "</td>";	
		echo "<td>";
		echo "";
		echo "</td>";
		echo "</tr>";
		
	}
		echo "<tr>";
		echo "<td>";
		echo "";
		echo "</td>";
		
		echo "<td><h4>";
		echo "";
		echo "</h4></td>";		
		
		
		echo "<td><h4>";
		echo "";
		echo "</h4></td>";		
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>";
		echo "";
		echo "</td>";
		
		echo "<td><h4>";
		echo "";
		echo "</h4></td>";		
		
		
		echo "<td><h4>";
		
		echo "";
		echo "</h4></td>";		
		echo "</tr>";
		
?>
	
    </tbody>
  </table>

    </div>	
		
	</body>
</html>

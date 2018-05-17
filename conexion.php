<?php

//---------------------------------------------------------------------
// Declaraciones de la pricipales variables utilizadas para manipular 
// las conexiones JDBC.
//---------------------------------------------------------------------


/*procedimiento de la conexion*/
	//echo 'hello';
	$username="root";
	
    	$password="xts74";

    	$dbName="falvarez_lotto";

    	//String dbHost="www.dissoft.info";
	//$dbHost="mysql1000.mochahost.com";
	$dbHost="localhost";

 	//$url ="jdbc:mysql://"+$dbHost+":3306/"+$dbName;
	
    //$con =  mysqli_connect($dbHost, $username, $password,$dbName);
	$con =  mysqli_connect($dbHost, $username, $password,$dbName);
	
	if (!$con) {
    	die('No pudo conectarse: ' . mysql_error());
    	
	}
	//Comente el if anterior verificar
	
	//echo 'Conectado satisfactoriamente';
	
	//------------------------------------------------------------------
	/*
	$username="falvarez_nelson";
	
    $password="rootbill";

    $dbName="falvarez_alcalsis";

        //String dbHost="www.dissoft.info";
	$dbHost="mysql1000.mochahost.com";

 	//$url ="jdbc:mysql://"+$dbHost+":3306/"+$dbName;
	
    $con =  mysqli_connect($dbHost, $username, $password,$dbName);
	
	if (!$con) {
    	die('No pudo conectarse: ' . mysqli_error());
	}
	//echo 'Conectado satisfactoriamente';
	*/
    //------------------------------------------------------------------    
?>

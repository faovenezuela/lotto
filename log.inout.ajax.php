<?php

	$username='root';
	
	$password='rootbill';

	$dbName='falvarez_lotto';
	
	$dbHost='localhost';

	$url ='jdbc:mysql://'+$dbHost+':3306/'+$dbName;
	//---------------------------------------------
	/*
	$username='falvarez_nelson';
	//$username='root';
	
	$password='rootbill';

	$dbName='falvarez_alcalsis';

	$dbHost='mysql1000.mochahost.com';
	//$dbHost='localhost';

	$url ='jdbc:mysql://'+$dbHost+':3306/'+$dbName;
	*/
	//---------------------------------------------
	session_start();
	
	if ( !isset($_SESSION['username']) && !isset($_SESSION['userid']) ){
		//echo 'AQUI';
		//if ( @$idcnx = @mysql_connect('mysql1000.mochahost.com','falvarez_nelson','rootbill') ){
		if ( @$idcnx = @mysql_connect('localhost','root','xts74') ){
			//echo 'AQUI';
			
			if ( @mysql_select_db('falvarez_lotto',$idcnx) ){
				
				//$sql = 'SELECT user,password,id_user FROM usuarios WHERE user="' . $_POST['login_username']. '" and password="' . md5($_POST['login_userpass']) . '" LIMIT 1';
				$sql = 'SELECT nombre_usuario,clave_usuario,id_usuarios FROM usuarios_lotto WHERE nombre_usuario="' . $_POST['login_username']. '" and clave_usuario="' . $_POST['login_userpass'] . '" LIMIT 1';
				//echo $sql;
				if ( @$res = @mysql_query($sql) ){
					//echo $sql;
					if ( @mysql_num_rows($res) == 1 ){
						//echo 'AQUI';
						$user = @mysql_fetch_array($res);
						
						$_SESSION['username']	= $user['nombre_usuario'];

						//echo $user['nombre_usuario'];
						$_SESSION['userid']	= $user['id_usuarios'];

						echo 1;
						
					}
					else
						echo 0;
				}
				else
					echo 0;
				
				
			}
			
			mysql_close($idcnx);
		}
		else
			echo 0;
	}
	else{
		echo 0;
	}
?>

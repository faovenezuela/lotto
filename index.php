<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
		<link rel="shortcut icon" href="images/if_roulette_icons_73218.ico">
		<title>Sistema de Gestion de Lotto</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="functions.ajax.js"></script>
	</head>
	<body>
		<table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%"><tr><td align="center" valign="middle" height="100%" width="100%">
		<div id="alertBoxes"></div>
		
			<?php
			if ( isset($_SESSION['username']) && isset($_SESSION['userid']) && $_SESSION['username'] != '' && $_SESSION['userid'] != '0' ){
				echo '<div class="session_on">Bienvenido '.$_SESSION['username'].' &#124; <a href="javascript:void(0);" id="sessionKiller">Cerrar Sesion</a>.<span class="timer" id="timer"  style="margin-left: 10px;"></span></div>';
				//header( "location: ./menu_principal.php");
				include("menu_principal.php");
			}else{
			?>
			<div id="allContent"><table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%"><tr><td align="center" valign="middle" height="100%" width="100%">
			<span class="loginBlock"><span class="inner">
			<?php				
				echo '<form method="post" action="index.php">
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td>Usuario:</td>
				<td><input type="text" name="login_username" id="login_username" /></td>
			</tr>
			<tr>
				<td>Contrase&ntilde;a:</td>
				<td><input type="password" name="login_userpass" id="login_userpass" /></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><span class="timer" id="timer"></span><button id="login_userbttn">Login</button></td>
			</tr>
		</table>
	</form>';
	
	
	}
?>
</span></span>
		
	</td></tr></table></div></body>
</html>

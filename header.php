<!DOCTYPE html>
<html>
<head>
<title>Game v 0.0.1</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="header">
	DeeGames
</div>
<div id="container">
	<div id="navigation">
		<div id="nav_div">
<?php
	if(isset($_SESSION['uid'])){
		echo "Вы авторизированы<br><a href='exit.php'>Выйти</a>";
	}else{
		echo "Вы не авторизированы<br><a href='login.php'>Войти</a>";
	}


?>
		</div>
	</div>
	<div id="content">
		<div id="con_div">
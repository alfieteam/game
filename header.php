<!DOCTYPE html>
<html>
<head>
<title>Game v 0.0.10</title>
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
include("functions.php");

	if(isset($_SESSION['uid'])){
		include("safe.php");
		echo "Вы авторизированы<br>";
		echo "&raquo; <a href='main.php'>Your Stats</a><br>";
		echo "&raquo; <a href='rankings.php'>Battle Player</a><br>";
		echo "&raquo; <a href='units.php'>Your Units</a><br>";
		echo "&raquo; <a href='weapons.php'>Your Weapons</a><br>";
		echo "&raquo; <a href='logout.php'>Logout</a>";
	}else{
?>
		<form action="login.php" method="post">
			Username:<br><input type="text" class="loginform" name="username"><br><br>
			Password:<br><input type="password" class="loginform" name="password"><br><br>
			<input type="submit" name="login" value="Login">
		</form>
<?php
	}
?>
		</div>
	</div>
	<div id="content">
		<div id="con_div">
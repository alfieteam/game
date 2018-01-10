<!DOCTYPE html>
<html>
<head>
<title>Game v 0.0.4</title>
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
		echo "Вы авторизированы<br>";
		echo "<a href='main.php'>Main</a>";
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
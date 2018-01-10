<?php

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS", "");
define("DB_NAME","game");

function connect(){
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Ошибка ".mysqli_error($link));
}

function protect($string){
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Ошибка ".mysqli_error($link));
	return mysqli_real_escape_string($link, strip_tags(addslashes($string)));
}



?>
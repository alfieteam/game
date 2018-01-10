<?php

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS", "");
define("DB_NAME","game");

function connect(){
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Ошибка ".mysqli_error($link));
	return $link;
}

function protect($string){
	return mysqli_real_escape_string(connect(), strip_tags(addslashes($string)));
}



?>
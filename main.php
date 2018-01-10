<?php 
session_start();
include("functions.php");
include("header.php");

if(!isset($_SESSION['uid'])){
	echo "Вы не авторизированы, авторизируйтесь!";
}elseif(isset($_SESSION['uid'])){
	echo "Вы вошли как: ".$_SESSION['username']." | Ваш ID: ".$_SESSION['uid'];
}



include("footer.php");
?>

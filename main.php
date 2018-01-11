<?php 
session_start();
include("header.php");

if(!isset($_SESSION['uid'])){
	echo "Вы не авторизированы, авторизируйтесь!";
}elseif(isset($_SESSION['uid'])){
	echo "Username: ".$_SESSION['username']." | Ваш ID: ".$_SESSION['uid'];
	echo "<br><hr>";
	echo "Gold: ".$stats['gold']." | Attack: ".$stats['attack']." | Defense: ".$stats['defense']." | Food: ".$stats['food'];
	echo "<br><hr>";
	echo "Worker: ".$unit['worker']." | Farmer: ".$unit['farmer']." | Warrior: ".$unit['warrior']." | Defender: ".$unit['defender'];
	echo "<br><hr>";
	echo "Sword: ".$weapon['sword']." | Shield: ".$weapon['shield'];




}



include("footer.php");
?>

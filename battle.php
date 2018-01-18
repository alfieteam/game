<?php 
session_start();
include("header.php");
if(!isset($_SESSION['uid'])){
	output("You must be logged in to view this page!");
}else{
	if(isset($_POST['gold'])){
		$turns = protect($_POST['turns']);
		$id = protect($_POST['id']);
		$user_check = mysqli_query(connect(),"SELECT * FROM `stats` WHERE `id` = '".$id."'")or die(mysqli_error());
		if(mysqli_num_rows($user_check) == 0){
			output("There is no user with that ID!");
		}elseif($turns < 1 || $turns > 10){
			output("You must attack with 1-10 turns!");
		}elseif($turns > $stats['turns']){
			output("You do not have enough turns!");
		}
	}elseif(isset($_POST['food'])){
		$turns = protect($_POST['turns']);
		$id = protect($_POST['id']);
		$user_check = mysqli_query(connect(),"SELECT * FROM `stats` WHERE `id` = '".$id."'")or die(mysqli_error());
		if(mysqli_num_rows($user_check) == 0){
			output("There is no user with that ID!");
		}elseif($turns < 1 || $turns > 10){
			output("You must attack with 1-10 turns!");
		}elseif($turns > $stats['turns']){
			output("You do not have enough turns!");
		}

	}else{
		output("You have visited this page incorrectly!");
	}

}

include("footer.php"); 
?>

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
		}else{
			$enemy_stats = mysqli_fetch_assoc($user_check);
			$attack_effect = $turns * 0.1 * $stats['attack'];
			$defense_effect = $enemy_stats['defense'];

			echo "You send your warriors into battle!<br>";
			echo "Your warriors dealt ".$attack_effect." damage!<br>";
			echo "The enemy's defenders dealt ".$defense_effect." damage!<br>";
			if($attack_effect > $defense_effect){
				$ratio = ($attack_effect - $defense_effect) / $attack_effect * $turns;
				$ratio = min($turns,1);
				$gold_stolen = floor($ratio * $enemy_stats['gold']);
				echo "You won the battle! You stole ".$gold_stolen." gold!";
				$battle1 = mysqli_query(connect(),"UPDATE `stats` SET `gold`=`gold` - '".$gold_stolen."' WHERE `id` = '".$id."'")or die(mysqli_error());
				$battle1 = mysqli_query(connect(),"UPDATE `stats` SET `gold`=`gold` + '".$gold_stolen."' WHERE `id` = '".$_SESSION['uid']."'")or die(mysqli_error());
				$battle1 = mysqli_query(connect(),"INSERT INTO `logs` (`attacker`,`defender`,`attacker_damage`,`defender_damage`,`gold`,`food`,`time`) VALUES ('".$_SESSION['uid']."','".$id."','".$attack_effect."','".$defense_effect."','".$gold_stolen."','0','".time()."')")or die(mysqli_error());

			}else{
				echo "You lost the battle!";
			}
		}
	}elseif(isset($_POST['food'])){
		

	}else{
		output("You have visited this page incorrectly!");
	}

}

include("footer.php"); 
?>

<?php 
session_start();
include("header.php");
if(!isset($_SESSION['uid'])){
	echo "Вы не авторизированы, авторизируйтесь!";
}else{ 
	if(!isset($_GET['id'])){
		output("You have visited this page incorrectly!");
	}else{
		$id = protect($_GET['id']);
		$user_check = mysqli_query(connect(),"SELECT * FROM `user` WHERE `id` = '".$id."'")or die(mysqli_error());
		if(mysqli_num_rows($user_check) == 0){
			output("There is no user with that ID!");
		}else{
			$s_user = mysqli_fetch_assoc($user_check);
			$stats_stats = mysqli_query(connect(),"SELECT * FROM `stats` WHERE `id` = '".$id."'")or die(mysqli_error());
			$s_stats = mysqli_fetch_assoc($stats_stats);
			$stats_rank = mysqli_query(connect(),"SELECT * FROM `ranking` WHERE `id` = '".$id."'")or die(mysqli_error());
			$s_rank = mysqli_fetch_assoc($stats_rank);
?>
			<center><h2>Player Stats</h2></center>
			<br><?php echo $s_user['username'];?>
			<br><br>
			<b>Rank: <?php echo $s_rank['overall']?></b>
			<br>
			<b>Gold: <?php echo $s_stats['gold']?></b>
			<br><br>
			<form action="battle.php" method="post">
				<i>Attack on <?php echo $s_user['username'];?> in the last 24 hours: ()</i>
				<br>Number of Turns(1 - 10):  
				<input type="number" name="turns"> 
				<input type="submit" name="attack" value="Attack">
				<input type="hidden" name="id" value="<?php echo $id;?>">
			</form>



<?php



		}
	}



}

include("footer.php"); 
?>

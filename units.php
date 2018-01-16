<?php 
session_start();
include("header.php");

if(!isset($_SESSION['uid'])){
	echo "Вы не авторизированы, авторизируйтесь!";
}elseif(isset($_SESSION['uid'])){
	if(isset($_POST['train'])){
		$worker = number_format(protect($_POST['worker']));
		$farmer = number_format(protect($_POST['farmer']));
		$warrior = number_format(protect($_POST['warrior']));
		$defender = number_format(protect($_POST['defender']));
		$food_needed = (10 * $worker) + (10 * $farmer) + (10 * $warrior) + (10 * $defender);
		// food_needed плюсует всё что было в форме и умножает на 10, давая общую цифру изьятия еды.
		if($worker <= 0 || $farmer <= 0 || $warrior <= 0 || $defender <= 0){
			output("You must train a positive number of units!");
			echo "Количество food: ".$stats['food'];  //Для теста, позже удалить
		}
		elseif($stats['food'] < $food_needed){
			output("You do not have enough food!");
		}
		else{
			$unit['worker'] += $worker;
			$unit['farmer'] += $farmer;
			$unit['warrior'] += $warrior;
			$unit['defender'] += $defender;

			$update_unit = mysqli_query(connect(),"UPDATE `unit` SET
													`worker` = '".$unit['worker']."',
													`farmer` = '".$unit['farmer']."',
													`warrior` = '".$unit['warrior']."',
													`defender` = '".$unit['defender']."'
													WHERE `id` = '".$_SESSION['uid']."'")
													or die(mysqli_error());
			$stats['food'] -= $food_needed;
			$update_food = mysqli_query(connect(),"UPDATE `stats` SET
													`food` = '".$stats['food']."'
													WHERE `id` = '".$_SESSION['uid']."'")
													or die(mysqli_error());
			output("You have trained your units!");
		}
	}
	elseif(isset($_POST['untrain'])){
		$worker = is_numeric(protect($_POST['worker']));
		$farmer = is_numeric(protect($_POST['farmer']));
		$warrior = is_numeric(protect($_POST['warrior']));
		$defender = is_numeric(protect($_POST['defender']));
		$food_needed = (8 * $worker) + (8 * $farmer) + (8 * $warrior) + (8 * $defender);
		if($worker <= 0 || $farmer <= 0 || $warrior <= 0 || $defender <= 0){
			outpet("You must untrain a positive number of units!");
		}elseif($worker > $unit['worker'] || $farmer > $unit['farmer'] || 
				$warrior > $unit['warrior'] || $defender > $unit['defender']){
			output("You do not have that many units to untrane!");
		}else{
			$unit['worker'] -= $worker;
			$unit['farmer'] -= $farmer;
			$unit['warrior'] -= $warrior;
			$unit['defender'] -= $defender;

			$update_unit = mysqli_query(connect(),"UPDATE `unit` SET
													`worker` = '".$unit['worker']."',
													`farmer` = '".$unit['farmer']."',
													`warrior` = '".$unit['warrior']."',
													`defender` = '".$unit['defender']."'
													WHERE `id` = '".$_SESSION['uid']."'")
													or die(mysqli_error());
			$stats['food'] += $food_needed;
			$update_food = mysqli_query(connect(),"UPDATE `stats` SET
													`food` = '".$stats['food']."'
													WHERE `id` = '".$_SESSION['uid']."'")
													or die(mysqli_error());
			output("You have untrained your units!");
		}
	}


?>

	<center><h2>Your Units</h2></center>
	<hr>
	You can train and untrain your units here.
	<br>
	<form action="units.php" method="post">
		<table cellpadding="5" cellspacing="5">
			<tr>
				<td><b>Unit Type</b></td>
				<td><b>Number of Units</b></td>
				<td><b>Unit Cost</b></td>
				<td><b>Unit More</b></td>
			</tr>
			<tr>
				<td>Worker</td>
				<td><?php echo number_format($unit['worker']);  ?></td>
				<td>10 food</td>
				<td><input type="number" name="worker"></td>
			</tr>
			<tr>
				<td>Farmer</td>
				<td><?php echo number_format($unit['farmer']);  ?></td>
				<td>10 food</td>
				<td><input type="number" name="farmer"></td>
			</tr>
			<tr>
				<td>Warrior</td>
				<td><?php echo number_format($unit['warrior']);  ?></td>
				<td>10 food</td>
				<td><input type="number" name="warrior"></td>
			</tr>
			<tr>
				<td>Defender</td>
				<td><?php echo number_format($unit['defender']);  ?></td>
				<td>10 food</td>
				<td><input type="number" name="defender"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><input type="submit" name="train" value="Train"></td>
			</tr>
		</table>
	</form>
	<br><hr><br>
	<form action="units.php" method="post">
		<table cellpadding="5" cellspacing="5">
			<tr>
				<td><b>Unit Type</b></td>
				<td><b>Number of Units</b></td>
				<td><b>Unit Cost</b></td>
				<td><b>Unit More</b></td>
			</tr>
			<tr>
				<td>Worker</td>
				<td><?php echo number_format($unit['worker']);  ?></td>
				<td>8 food</td>
				<td><input type="number" name="worker"></td>
			</tr>
			<tr>
				<td>Farmer</td>
				<td><?php echo number_format($unit['farmer'], 2);  ?></td>
				<td>8 food</td>
				<td><input type="number" name="farmer"></td>
			</tr>
			<tr>
				<td>Warrior</td>
				<td><?php echo number_format($unit['warrior']);  ?></td>
				<td>8 food</td>
				<td><input type="number" name="warrior"></td>
			</tr>
			<tr>
				<td>Defender</td>
				<td><?php echo number_format($unit['defender']);  ?></td>
				<td>8 food</td>
				<td><input type="number" name="defender"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><input type="submit" name="untrain" value="Untrain"></td>
			</tr>
		</table>
	</form>

<?php

}



include("footer.php");
?>

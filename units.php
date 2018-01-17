<?php 
session_start();
include("header.php");

if(!isset($_SESSION['uid'])){
	echo "Вы не авторизированы, авторизируйтесь!";
}elseif(isset($_SESSION['uid'])){
	/* if(isset($_POST['train'])){
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
	} */
	if(isset($_POST['train_worker'])){
		if($_POST['worker'] == null){
			output("Вы не ввели значения!");
		}
		else{
			$worker = ($_POST['worker']);
			if(is_numeric($worker)){
				$food_needed = (10 * $worker);
				if($worker <= 0){
					output(" минус или 0!");
				}elseif($stats['food'] < $food_needed){
					output(" недостаточно еды");
				}
				else{
					printf($worker); //проверка на воркер
					$unit['worker'] += $worker; // наличие воркеров + покупаемое количество
					$stats['food'] -= $food_needed; // наличие еды - затрачиваемое количество еды на покупку воркеров

					$update_worker = mysqli_query(connect(),"UPDATE `unit` SET 
															`worker` = '".$unit['worker']."'
															WHERE `id` = '".$_SESSION['uid']."'") 
															or die(mysqli_error()); 
					$update_food = mysqli_query(connect(),"UPDATE `stats` SET
															`food` = '".$stats['food']."'
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					header('location: units.php');
				}
			}
		}
	}
	if(isset($_POST['untrain_worker'])){
		if($_POST['worker'] == null){
			output("Вы не ввели значение = null");
		}
		else{
			$worker = $_POST['worker'];
			if(is_numeric($worker)){
				$food_add = (8 * $worker);
				if($worker <= 0){
					output(" минус или 0 !");
				}elseif($unit['worker']  < $worker){
					output(" недостаточно воркеров");
				}else{
					$unit['worker'] -= $worker;
					$stats['food'] += $food_add; 

					$update_worker = mysqli_query(connect(),"UPDATE `unit` SET 
															`worker` = '".$unit['worker']."'
															WHERE `id` = '".$_SESSION['uid']."'") 
															or die(mysqli_error()); 
					$update_food = mysqli_query(connect(),"UPDATE `stats` SET
															`food` = '".$stats['food']."'
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					header('location: units.php');
				}
			}
		}
		
	}
	if(isset($_POST['train_farmer'])){
		if($_POST['farmer'] == null){
			output("Вы не ввели значения!");
		}
		else{
			$farmer = ($_POST['farmer']);
			if(is_numeric($farmer)){
				$food_needed = (10 * $farmer);
				if($farmer <= 0){
					output(" минус или 0!");
				}elseif($stats['food'] < $food_needed){
					output(" недостаточно еды");
				}
				else{
					printf($farmer); //проверка на воркер
					$unit['farmer'] += $farmer; // наличие воркеров + покупаемое количество
					$stats['food'] -= $food_needed; // наличие еды - затрачиваемое количество еды на покупку воркеров

					$update_farmer = mysqli_query(connect(),"UPDATE `unit` SET 
															`farmer` = '".$unit['farmer']."'
															WHERE `id` = '".$_SESSION['uid']."'") 
															or die(mysqli_error()); 
					$update_food = mysqli_query(connect(),"UPDATE `stats` SET
															`food` = '".$stats['food']."'
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					header('location: units.php');
				}
			}
		}
	}
	if(isset($_POST['untrain_farmer'])){
		if($_POST['farmer'] == null){
			output("Вы не ввели значение = null");
		}
		else{
			$farmer = $_POST['farmer'];
			if(is_numeric($farmer)){
				$food_add = (8 * $farmer);
				if($farmer <= 0){
					output(" минус или 0 !");
				}elseif($unit['farmer']  < $farmer){
					output(" недостаточно воркеров");
				}else{
					$unit['farmer'] -= $farmer;
					$stats['food'] += $food_add; 

					$update_farmer = mysqli_query(connect(),"UPDATE `unit` SET 
															`farmer` = '".$unit['farmer']."'
															WHERE `id` = '".$_SESSION['uid']."'") 
															or die(mysqli_error()); 
					$update_food = mysqli_query(connect(),"UPDATE `stats` SET
															`food` = '".$stats['food']."'
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					header('location: units.php');
				}
			}
		}
		
	}
	if(isset($_POST['train_warrior'])){
		if($_POST['warrior'] == null){
			output("Вы не ввели значения!");
		}
		else{
			$warrior = ($_POST['warrior']);
			if(is_numeric($warrior)){
				$food_needed = (10 * $warrior);
				if($warrior <= 0){
					output(" минус или 0!");
				}elseif($stats['food'] < $food_needed){
					output(" недостаточно еды");
				}
				else{
					printf($warrior); //проверка на воркер
					$unit['warrior'] += $warrior; // наличие воркеров + покупаемое количество
					$stats['food'] -= $food_needed; // наличие еды - затрачиваемое количество еды на покупку воркеров

					$update_warrior = mysqli_query(connect(),"UPDATE `unit` SET 
															`warrior` = '".$unit['warrior']."'
															WHERE `id` = '".$_SESSION['uid']."'") 
															or die(mysqli_error()); 
					$update_food = mysqli_query(connect(),"UPDATE `stats` SET
															`food` = '".$stats['food']."'
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					header('location: units.php');
				}
			}
		}
	}
	if(isset($_POST['untrain_warrior'])){
		if($_POST['warrior'] == null){
			output("Вы не ввели значение = null");
		}
		else{
			$warrior = $_POST['warrior'];
			if(is_numeric($warrior)){
				$food_add = (8 * $warrior);
				if($warrior <= 0){
					output(" минус или 0 !");
				}elseif($unit['warrior']  < $warrior){
					output(" недостаточно воркеров");
				}else{
					$unit['warrior'] -= $warrior;
					$stats['food'] += $food_add; 

					$update_warrior = mysqli_query(connect(),"UPDATE `unit` SET 
															`warrior` = '".$unit['warrior']."'
															WHERE `id` = '".$_SESSION['uid']."'") 
															or die(mysqli_error()); 
					$update_food = mysqli_query(connect(),"UPDATE `stats` SET
															`food` = '".$stats['food']."'
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					header('location: units.php');
				}
			}
		}
		
	}
	if(isset($_POST['train_defender'])){
		if($_POST['defender'] == null){
			output("Вы не ввели значения!");
		}
		else{
			$defender = ($_POST['defender']);
			if(is_numeric($defender)){
				$food_needed = (10 * $defender);
				if($defender <= 0){
					output(" минус или 0!");
				}elseif($stats['food'] < $food_needed){
					output(" недостаточно еды");
				}
				else{
					printf($defender); //проверка на воркер
					$unit['defender'] += $defender; // наличие воркеров + покупаемое количество
					$stats['food'] -= $food_needed; // наличие еды - затрачиваемое количество еды на покупку воркеров

					$update_defender = mysqli_query(connect(),"UPDATE `unit` SET 
															`defender` = '".$unit['defender']."'
															WHERE `id` = '".$_SESSION['uid']."'") 
															or die(mysqli_error()); 
					$update_food = mysqli_query(connect(),"UPDATE `stats` SET
															`food` = '".$stats['food']."'
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					header('location: units.php');
				}
			}
		}
	}
	if(isset($_POST['untrain_defender'])){
		if($_POST['defender'] == null){
			output("Вы не ввели значение = null");
		}
		else{
			$defender = $_POST['defender'];
			if(is_numeric($defender)){
				$food_add = (8 * $defender);
				if($defender <= 0){
					output(" минус или 0 !");
				}elseif($unit['defender']  < $defender){
					output(" недостаточно воркеров");
				}else{
					$unit['defender'] -= $defender;
					$stats['food'] += $food_add; 

					$update_defender = mysqli_query(connect(),"UPDATE `unit` SET 
															`defender` = '".$unit['defender']."'
															WHERE `id` = '".$_SESSION['uid']."'") 
															or die(mysqli_error()); 
					$update_food = mysqli_query(connect(),"UPDATE `stats` SET
															`food` = '".$stats['food']."'
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					header('location: units.php');
				}
			}
		}
		
	}



?>

	<center><h2>Your Units</h2></center>
	<hr>
	You can train and untrain your units here.
	<br>
	<?php echo "Количество Food: ".$stats['food'];?>
	<br><hr><br>
	<form action="units.php" method="post">
		<table cellpadding="5" cellspacing="5">
			<tr>
				<td><b>Unit Type</b></td>
				<td><b>Number of Units</b></td>
				<td><b>Unit More</b></td>
				<td><b>Cost: 10</b></td>
				<td><b>Cost: 8</b></td>
			</tr>
			<tr>
				<td>Worker</td>
				<td><?php echo number_format($unit['worker']);  ?></td>
				<td><input type="number" name="worker"></td>
				<td><input type="submit" name="train_worker" value="Train"></td>
				<td><input type="submit" name="untrain_worker" value="Untrain"></td>
			</tr>
			<tr>
				<td>Farmer</td>
				<td><?php echo number_format($unit['farmer']);  ?></td>
				<td><input type="number" name="farmer"></td>
				<td><input type="submit" name="train_farmer" value="Train"></td>
				<td><input type="submit" name="untrain_farmer" value="Untrain"></td>
			</tr>
			<tr>
				<td>Warrior</td>
				<td><?php echo number_format($unit['warrior']);  ?></td>
				<td><input type="number" name="warrior"></td>
				<td><input type="submit" name="train_warrior" value="Train"></td>
				<td><input type="submit" name="untrain_warrior" value="Untrain"></td>
			</tr>
			<tr>
				<td>Defender</td>
				<td><?php echo number_format($unit['defender']);  ?></td>
				<td><input type="number" name="defender"></td>
				<td><input type="submit" name="train_defender" value="Train"></td>
				<td><input type="submit" name="untrain_defender" value="Untrain"></td>
			</tr>
		</table>
	</form>

<?php

}



include("footer.php");
?>

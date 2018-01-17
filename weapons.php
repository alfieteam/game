<?php 
session_start();
include("header.php");

if(!isset($_SESSION['uid'])){
	echo "Вы не авторизированы, авторизируйтесь!";
}elseif(isset($_SESSION['uid'])){
	if(isset($_POST['buy_sword'])){
		if($_POST['sword'] == null){ 
			output("Вы не ввели значение/тест на null");
		}
		else{
			$sword = protect($_POST['sword']);
			if(is_numeric($sword)){
				$gold_needed = (10 * $sword);
				if($sword <= 0){
					output("проверка на отрицание и 0");
				}elseif($stats['gold'] < $gold_needed){
					output("Проверка на достаточно ли денег, не достаточно!");
				}else{
					$weapon['sword'] += $sword;
					$stats['gold'] -= $gold_needed;
					$update_sword = mysqli_query(connect(),"UPDATE `weapon` SET 
															`sword` = '".$weapon['sword']."' 
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					$update_gold = mysqli_query(connect(),"UPDATE `stats` SET 
															`gold` = '".$stats['gold']."' 
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					header('location: weapons.php');
				}
			}
		}
	}
	if(isset($_POST['sell_sword'])){
		if($_POST['sword'] == null){ 
			output("Вы не ввели значение/тест на null");
		}
		else{
			$sword = protect($_POST['sword']);
			if(is_numeric($sword)){
				$gold_add = (8 * $sword);
				if($sword <= 0){
					output("проверка на отрицание и 0");
				}elseif($weapon['sword'] < $sword){
					output(" наличие < количество на продажу!");
				}else{
					$weapon['sword'] -= $sword;
					$stats['gold'] += $gold_add;
					$update_sword = mysqli_query(connect(),"UPDATE `weapon` SET 
															`sword` = '".$weapon['sword']."' 
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					$update_gold = mysqli_query(connect(),"UPDATE `stats` SET 
															`gold` = '".$stats['gold']."' 
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					header('location: weapons.php');
				}
			}
		}
	}
	if(isset($_POST['buy_shield'])){
		if($_POST['shield'] == null){ 
			output("Вы не ввели значение/тест на null");
		}
		else{
			$shield = protect($_POST['shield']);
			if(is_numeric($shield)){
				$gold_needed = (10 * $shield);
				if($shield <= 0){
					output("проверка на отрицание и 0");
				}elseif($stats['gold'] < $gold_needed){
					output("Проверка на достаточно ли денег, не достаточно!");
				}else{
					$weapon['shield'] += $shield;
					$stats['gold'] -= $gold_needed;
					$update_shield = mysqli_query(connect(),"UPDATE `weapon` SET 
															`shield` = '".$weapon['shield']."' 
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					$update_gold = mysqli_query(connect(),"UPDATE `stats` SET 
															`gold` = '".$stats['gold']."' 
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					header('location: weapons.php');
				}
			}
		}
	}
	if(isset($_POST['sell_shield'])){
		if($_POST['shield'] == null){ 
			output("Вы не ввели значение/тест на null");
		}
		else{
			$shield = protect($_POST['shield']);
			if(is_numeric($shield)){
				$gold_add = (8 * $shield);
				if($shield <= 0){
					output("проверка на отрицание и 0");
				}elseif($weapon['shield'] < $shield){
					output(" наличие < количество на продажу!");
				}else{
					$weapon['shield'] -= $shield;
					$stats['gold'] += $gold_add;
					$update_shield = mysqli_query(connect(),"UPDATE `weapon` SET 
															`shield` = '".$weapon['shield']."' 
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					$update_gold = mysqli_query(connect(),"UPDATE `stats` SET 
															`gold` = '".$stats['gold']."' 
															WHERE `id` = '".$_SESSION['uid']."'")
															or die(mysqli_error());
					header('location: weapons.php');
				}
			}
		}
	}
				


?>

	<center><h2>Your Weapons</h2></center>
	<hr>
	You can buy and sell weapons here.
	<br>
	Количество gold: <?php echo $stats['gold']; ?>
	<br>
	<form action="weapons.php" method="post">
		<table cellpadding="5" cellspacing="5">
			<tr>
				<td><b>Weapon Type</b></td>
				<td><b>Number of Weapons</b></td>
				<td><b>Amount</b></td>
				<td><b>Cost: 10</b></td>
				<td><b>Cost: 8</b></td>
			</tr>
			<tr>
				<td>Sword</td>
				<td><?php echo number_format($weapon['sword']);  ?></td>
				<td><input type="number" name="sword"></td>
				<td><input type="submit" name="buy_sword" value="    Buy   "></td>
				<td><input type="submit" name="sell_sword" value="  Sell  "></td>
			</tr>
			<tr>
				<td>Shield</td>
				<td><?php echo number_format($weapon['shield']);  ?></td>
				<td><input type="number" name="shield"></td>
				<td><input type="submit" name="buy_shield" value="    Buy   "></td>
				<td><input type="submit" name="sell_shield" value="  Sell  "></td>
			</tr>
		</table>
	</form>

<?php

}



include("footer.php");
?>

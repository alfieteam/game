<?php 
session_start();
include("header.php");

if(!isset($_SESSION['uid'])){
	echo "Вы не авторизированы, авторизируйтесь!";
}elseif(isset($_SESSION['uid'])){
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
				<td><input type="text" name="worker"></td>
			</tr>
			<tr>
				<td>Farmer</td>
				<td><?php echo number_format($unit['farmer']);  ?></td>
				<td>10 food</td>
				<td><input type="text" name="farmer"></td>
			</tr>
			<tr>
				<td>Warrior</td>
				<td><?php echo number_format($unit['warrior']);  ?></td>
				<td>10 food</td>
				<td><input type="text" name="warrior"></td>
			</tr>
			<tr>
				<td>Defender</td>
				<td><?php echo number_format($unit['defender']);  ?></td>
				<td>10 food</td>
				<td><input type="text" name="defender"></td>
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
				<td><input type="text" name="worker"></td>
			</tr>
			<tr>
				<td>Farmer</td>
				<td><?php echo number_format($unit['farmer']);  ?></td>
				<td>8 food</td>
				<td><input type="text" name="farmer"></td>
			</tr>
			<tr>
				<td>Warrior</td>
				<td><?php echo number_format($unit['warrior']);  ?></td>
				<td>8 food</td>
				<td><input type="text" name="warrior"></td>
			</tr>
			<tr>
				<td>Defender</td>
				<td><?php echo number_format($unit['defender']);  ?></td>
				<td>8 food</td>
				<td><input type="text" name="defender"></td>
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

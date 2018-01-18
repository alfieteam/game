<?php 
session_start();
include("header.php");
if(!isset($_SESSION['uid'])){
	echo "Вы не авторизированы, авторизируйтесь!";
}else{ 
?>

<center><h2>Battle Players</h2></center>
<hr>
<table cellpadding="2" cellspacing="2">
	<tr>
		<td width="50px"><b>Rank</b></td>
		<td width="150px"><b>Username</b></td>
		<td width="200px"><b>Gold</b></td>
	</tr>
	<?php   
	$get_users = mysqli_query(connect(),"SELECT `id`, `overall` FROM `ranking`
										WHERE `overall` > 0 ORDER BY `overall` ASC") 
										or die(mysqli_error());

	while($row = mysqli_fetch_assoc($get_users)){
		echo "<tr>";
		echo "<td>".$row['overall']."</td>";
		$get_user = mysqli_query(connect(),"SELECT `username` FROM `user` WHERE `id` = '".$row['id']."'") or die(mysqli_error());
		$rank_name = mysqli_fetch_assoc($get_user);
		echo "<td><a href=\"stats.php?id=".$row['id']."\">".$rank_name['username']."</a></td>";
		$get_gold = mysqli_query(connect(),"SELECT `gold` FROM `stats` WHERE `id` = '".$row['id']."'") or die(mysqli_error());
		$rank_gold = mysqli_fetch_assoc($get_gold);
		echo "<td>".number_format($rank_gold['gold'])."</td>";
		echo "</tr>";

	}



	?>
</table>
<?php


}

include("footer.php"); 
?>

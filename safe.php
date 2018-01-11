<?php 

$stats_get = mysqli_query(connect(),"SELECT * FROM `stats` WHERE `id`='".$_SESSION['uid']."'") or die (mysqli_error());
$stats = mysqli_fetch_assoc($stats_get);

$unit_get = mysqli_query(connect(),"SELECT * FROM `unit` WHERE `id`='".$_SESSION['uid']."'") or die (mysqli_error());
$unit = mysqli_fetch_assoc($unit_get);

$user_get = mysqli_query(connect(),"SELECT * FROM `user` WHERE `id`='".$_SESSION['uid']."'") or die (mysqli_error());
$user = mysqli_fetch_assoc($user_get);

$weapon_get = mysqli_query(connect(),"SELECT * FROM `weapon` WHERE `id`='".$_SESSION['uid']."'") or die (mysqli_error());
$weapon = mysqli_fetch_assoc($weapon_get);

?>
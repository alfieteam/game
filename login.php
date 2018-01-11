<?php 
session_start();
include("header.php");

if(isset($_POST['login'])){
	if(isset($_SESSION['uid'])){
		echo "Вы авторизированы.";
	}else{
		$username = protect($_POST['username']);
		$password = protect($_POST['password']);

		$login_check = mysqli_query(connect(),"SELECT `id`, `username` FROM `user` WHERE `username` = '$username' AND `password` = '".md5($password)."'") or die (mysqli_error());
		if(mysqli_num_rows($login_check) > 0){
			$get_id = mysqli_fetch_assoc($login_check);
			$_SESSION['uid'] = $get_id['id'];
			$_SESSION['username'] = $get_id['username'];
			header("Location: main.php");
		}else{
			echo "Не верный username или password.";
		}
	}
}

include("footer.php"); 
?>

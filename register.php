<?php
session_start();
include("header.php");
include("functions.php");
connect();

if(isset($_POST['register'])){
	$username = protect($_POST['username']);
	$password = protect($_POST['password']);
	$email = protect($_POST['email']);

	if($username == "" || $password == "" || $email == ""){
		echo "Please supply all fields!";
	}elseif((strlen($username) > 20) || (strlen($username) < 6)){
		echo "Username must be 6 - 20 characters!";
	}elseif((strlen($email) > 32) || (strlen($email) < 12)){
		echo "E-mail must be 12 - 32 characters!";
	}elseif((strlen($password) > 32) || (strlen($password) < 6)){
		echo "Password must be 6 - 32 characters!";
	}else{
		$register1 = mysqli_query(connect(),"SELECT `id` FROM `user` WHERE `username` ='$username'") or die (mysqli_error());
		$register2 = mysqli_query(connect(),"SELECT `id` FROM `user` WHERE `email` ='$email'") or die (mysqli_error());
		if(mysqli_num_rows($register1) > 0){
			echo "That username is already in use!";
		}elseif(mysqli_num_rows($register2) > 0){
			echo "That E-mail addres is already in use!";
		}else{
			$ins1 = mysqli_query(connect(),"INSERT INTO `stats` (`gold`,`attack`,`defense`,`food`) VALUES (100,10,10,100)") or die (mysqli_error());
			$ins2 = mysqli_query(connect(),"INSERT INTO `unit` (`worker`,`farmer`,`warrior`,`defender`) VALUES (5,5,0,0)") or die (mysqli_error());
			$ins3 = mysqli_query(connect(),"INSERT INTO `user` (`username`,`password`,`email`) VALUES ('$username','".md5($password)."','$email')") or die (mysqli_error());
			$ins4 = mysqli_query(connect(),"INSERT INTO `weapon` (`sword`,`shield`) VALUES (0,0)") or die(mysqli_error());
			echo "Your account <b>$username</b> has create!";
		}
	}
}

?>
<p>Registration</p>
<br>
<form action="register.php" method="POST">
<input type="text" name="username"> Username<br><br>
<input type="password" name="password"> Password<br><br>
<input type="email" name="email"> Email<br><br>
<input type="submit" name="register" value="Register">



</form>
<?php include("footer.php"); ?>
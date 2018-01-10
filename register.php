<?php
include("functions.php");
connect();


?>
Register page
<br><br>
<form action="register.php" method="POST">
<input type="text" name="username"> Username<br><br>
<input type="password" name="password"> Password<br><br>
<input type="email" name="email"> Email<br><br>
<input type="submit" name="register" value="Register">



</form>
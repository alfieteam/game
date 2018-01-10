<?php 
session_start();
$_SESSION['uid'] = 1;
include("header.php");

echo "Область основного контента";

include("footer.php"); 
?>

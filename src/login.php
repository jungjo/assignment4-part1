<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8"/>
<title>Login Assignment by Jooyoung </title>
</head>
<body>

<form action = "content1.php" method="POST">
	<input type = "text" name = "username">
	<input type = "submit" name = "Login" value = "Login">
</form>
</body>
</html>

<?php
if(isset($_GET['logout']) && $_GET['logout'] == 1){
	$_SESSION = array();
	session_destroy();
	echo "You have logged out successfully.";
}
?>

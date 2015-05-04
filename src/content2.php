<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

session_start();

//this sends the user back if they went to content1.php without ever using a login.php
if(!isset($_POST['username']) && !isset($_SESSION['username'])){
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8"/>
<title>Content2 Assignment by Jooyoung </title>
</head>
<body>
<?php
echo"Let's get you back to content1 page. Click <a href='content1.php'>here</a> to return to content1 page.";
?>

</body>
</html>

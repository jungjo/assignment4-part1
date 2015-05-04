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
<title>Content1 Assignment by Jooyoung </title>
</head>
<body>

<?php

//check if user did not input anything for username
if (isset($_POST['username']) && ($_POST['username'] == "")) {
	echo 'A username must be entered.Click <a href="login.php">here</a> to return to login screen.';
}		

else{
	//first time with no session name set
	if(!isset($_SESSION['username']) && isset($_POST['username'])){
		if(!isset($_SESSION['visits'])){
			$_SESSION['visits'] = 0;
		}
		$_SESSION['username'] = $_POST['username']; //set postusername to sessionusername

		echo "Hello $_SESSION[username] you have visited this page $_SESSION[visits] times before\n";
		echo '<p>Click <a href="login.php?logout=1">here</a> to logout.</p>';
		//increment visits
		$_SESSION['visits']++; 
		//link to content2
		echo '<p>Click <a href="content2.php">here</a> goto content2 page.</p>';
	}	
	//if the user has a session and goes to content1.php without going through login.php 
	else if(isset($_SESSION['username']) && !isset($_POST['username'])){
		echo "Hello $_SESSION[username] you have visited this page $_SESSION[visits] times before\n";
		echo '<p>Click <a href="login.php?logout=1">here</a> to logout.</p>';
		//increment visits
		$_SESSION['visits']++; 
		echo '<p>Click <a href="content2.php">here</a> goto content2 page.</p>';
	}
	
	//if the user goes through login again with the same / different user name	
	else if (isset($_SESSION['username']) && isset($_POST['username'])){
		if($_SESSION['username'] == $_POST['username']){
			echo "Hello $_SESSION[username] you have visited this page $_SESSION[visits] times before\n";
			echo '<p>Click <a href="login.php?logout=1">here</a> to logout.</p>';
			//increment visits
			$_SESSION['visits']++; 
			echo '<p>Click <a href="content2.php">here</a> goto content2 page.</p>';
		}
		else{
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['visits'] = 0;
			echo "Hello $_SESSION[username] you have visited this page $_SESSION[visits] times before\n";				
			echo '<p>Click <a href="login.php?logout=1">here</a> to logout.</p>';
			$_SESSION['visits']++;
			echo '<p>Click <a href="content2.php">here</a> goto content2 page.</p>';
		}
	}

	
}	
?>	

</form>
</html>

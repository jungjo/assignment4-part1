<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8"/>
<title>Loopback Assignment by Jooyoung</title>
</head>
<body>

<?php
//set up an array to output the type, key and value on json_encode later.
$r_array = array();
//set up a temporary array to store values of parameter 
$temp_arr = array();

//check to see what type of request it is GET or POST
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	//if request is empty, set type and parameter and exit
	if(empty($_GET)){
		$r_array['Type'] = 'Get';
		$r_array['Parameter'] = null;
		echo json_encode($r_array);
		return;
	}
	
	//check to see what type of request method it is and iterate and assign each key to their value	
	foreach($_GET as $key => $value){
		//if there is no values, mark key as undefined.
		if($value == ""){	
			$r_array[$key] = 'undefined'; 
		}
		else{
			$r_array['TYPE'] = 'GET';
			$temp_arr[$key] = $value;
		}
	}
}

//do the same thing for post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(empty($_POST)){
		$r_array['Type'] = 'POST';
		$r_array['Parameter'] = null;
		echo json_encode($r_array);
		return;
	}	
	foreach($_POST as $key => $value){
		if($value == ""){	
			$r_array[$key] = 'undefined'; 
		}
		else{
			$r_array['TYPE'] = 'POST';
			$temp_arr[$key] = $value;
		}
	}
}	

//push temp_arr to r_array['Parameter']
$r_array['Parameter'] = $temp_arr;
echo json_encode($r_array);

?>

</body>
</html>

<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8"/>
<title>Multtable Assignment by Jooyoung </title>
</head>
<body>

<?php
$min = $_GET['min-multiplicand'];	
$max = $_GET['max-multiplicand'];
$min_mult = $_GET['min-multiplier'];
$max_mult = $_GET['max-multiplier'];


//checks to see if any of the parameters are missing
if(!isset($min)){
	echo "Missing parameter min-multiplicand.\n";
}	
if(!isset($max)){
	echo "Missing parameter max-multiplicand.\n";
}	
if(!isset($min_mult)){
	echo "Missing parameter min-multiplier.\n";
}	
if(!isset($max_mult)){
	echo "Missing parameter max-multiplier.\n";
}	
if(!isset($min) || !isset($max) || !isset($min_mult) || !isset($max_mult)){
	return;
}

//checks to see if any of the parameters are not integers
if(!is_numeric($min)){
	echo "min-multiplicand must be an integer\n";
}	
if(!is_numeric($max)){
	echo "max-multiplicand must be an integer\n";
}
if(!is_numeric($min_mult)){
	echo "min-multiplier must be an integer\n";
}
if(!is_numeric($max_mult)){
	echo "man-multiplier must be an integer\n";
}
if(!is_numeric($min) || !is_numeric($max) || !is_numeric($min_mult) || !is_numeric($max_mult)){
	return;
}

//checks to see if min is greater than or equal to max;
if($min > $max){
	echo  "Minimum multiplicand larger than maximum.\n";
}
if($min_mult > $max_mult){
	echo "Minimum multiplier larger than maximum.\n";
}
if($min > $max || $min_mult > $max_mult){
	return;
}

//produce the table
echo "<table border = '1'>\n";

echo "<tr>\n <th>\n"; //create a blank spot on top left

//create the multiplier of top row
for ($i = $min_mult; $i <= $max_mult; $i++){ 
	echo "<th>$i\n";
}

//create values for the table
for ($i = $min; $i <= $max; $i++) {
	echo "<tr>\n";
  	$mult_num = ($min + $i); 
	echo "<th>$mult_num\n";
	
    for ($j = $min_mult; $j <= $max_mult; $j++) {
   	 $val = $i * $j;
    	 echo "  <td>$val\n";
    }
    echo "</tr>\n";
}

?>

</body>
</html>	

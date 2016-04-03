 <!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 24/3/2016
 Last edited 	:

 Purpose        : Retrieve car registration numbers from Car table and display 
				  in drop down list
-->

<?php
require_once 'functions.php';
$con = getConnection();
//Select all registration numbers that are not flagged for deletion
$sql = "SELECT Car.RegNo,EngineSize,Colour,Doors,
		Model.Model,Manufacturer,Version,BodyStyle 
		From Model INNER JOIN Car 
		ON Model.ModelID = Car.ModelID WHERE DeleteFlag = '0' ";
//From plesk -
//Select Car.RegNo,EngineSize,Colour,Doors, 
//Model.Model,Manufacturer,Version,BodyStyle 
//From Model INNER JOIN Car 
//on Model.ModelID = Car.ModelID Where Car.DeleteFlag = 0

if(!$result = mysqli_query($con, $sql)) {
	die("An Error in the SQL Query: " . mysqli_error());
}
while($row = mysqli_fetch_array($result)) {
	//select each element from the chosen category
	$regNo = $row['RegNo'];
	$engineSize = $row['EngineSize'];
	$colour = $row['Colour'];
	$doors= $row['Doors'];
	$model= $row['Model'];
	$manufacturer= $row['Manufacturer'];
	$version= $row['Version'];
	$bodyStyle= $row['BodyStyle'];
	$allText = "$regNO,$engineSize,$colour,$doors,$model,$manufacturer,$version,$bodyStyle";
	
	//display car reg in drop down
	echo "<option value = '$allText'>$regNo</option>"; 
}
mysqli_close($con);
?>
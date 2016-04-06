 <!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 24/3/2016
 Last edited 	:

 Purpose        : Allow user to select car registration number for dropdown which in turn populates the form with data
				  relevant to the selected reg.
-->

<?php
//Reuse code
require_once 'functions.php';
$con = getConnection();
//Select relevant details from both Car and Model tables to create new table
//with records that are not flagged for deletion
$sql = "SELECT Car.RegNo, EngineSize, Colour, Doors, 
		Model.Model,Manufacturer,Version,BodyStyle 
		From Model INNER JOIN Car 
		ON Model.ModelID = Car.ModelID WHERE Car.DeleteFlag = '0'";
//if query and connection not satisfied	
if(!$result = mysqli_query($con, $sql)) {
	die("Cannot find car registrations: " . mysqli_error());
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
	$retrievedDetails = "$regNo,$engineSize,$colour,$doors,$model,$manufacturer,$version,$bodyStyle";
	
	//display car reg in drop down
	echo "<option value = '$retrievedDetails'>$regNo</option>"; 
}
//Reuse code
mysqli_close($con);
?>
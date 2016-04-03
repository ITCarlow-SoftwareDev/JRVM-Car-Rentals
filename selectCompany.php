 <!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 24/3/2016
 Last edited 	:

 Purpose        : Retrieve car registration numbers from Car table and display 
				  in drop down list for deleteCar.php
//From plesk -
Select Car.RegNo,Colour,ChassisNo,DateAdded, 
Model.Model,Manufacturer,Version,BodyStyle 
From Model INNER JOIN Car 
on Model.ModelID = Car.ModelID 

Where Car.DeleteFlag = 0 ***!!!!! Should cars marked for deletion be available to amend !!!!!***
-->

<?php
require_once 'functions.php';
$con = getConnection();
//Select all existing registration numbers
$sql = "SELECT Car.RegNo,Colour,ChassisNo,DateAdded,Car.ModelID, 
		Model.Model,Manufacturer,Version,BodyStyle 
		From Model INNER JOIN Car 
		ON Model.ModelID = Car.ModelID";
	
if(!$result = mysqli_query($con, $sql)) {
	die("Cannot find car registrations: " . mysqli_error());
}
while($row = mysqli_fetch_array($result)) {
	
	$regNo = $row['RegNo'];
	$modelID= $row['ModelID'];
	$model= $row['Model'];
	$manufacturer= $row['Manufacturer'];
	$version= $row['Version'];
	$chassisNo= $row['ChassisNo'];
	$colour = $row['Colour'];
	$bodyStyle= $row['BodyStyle'];
	$dateAdded= $row['DateAdded'];
	$retrievedDetails = "$regNo,$modelID,$model,$manufacturer,$version,$chassisNo,$colour,$bodyStyle,$dateAdded";
	
	//display car reg in drop down
	echo "<option value = '$retrievedDetails'>$regNo</option>"; 
}
mysqli_close($con);
?>
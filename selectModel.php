<!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 08/03/2016
 Last edited 	:

 Unit 1
 Purpose        : Allow user to select model type which in turn populates the form with data
				  relevant to the selected model chosen.
-->
<?php 
	require_once 'functions.php';
	$connection = getConnection();

	$sql = "SELECT ModelID, Model, BodyStyle, Version, Manufacturer, CategoryID FROM Model ";

	if(!$result = mysqli_query($connection, $sql)){ 
		die("<br> Error when selecting model ID" . mysqli_error($connection));
	}//end if
	
	//$modelID = 0;
	
	while($row = mysqli_fetch_array($result)) {
		
		$modelID = $row['ModelID'];
		$model = $row['Model'];
		$bodyStyle = $row['BodyStyle'];
		$version = $row['Version'];
		$manufacturer = $row['Manufacturer'];
		$categoryID = $row['CategoryID'];
		$retrievedDetails = "$modelID,$model,$bodyStyle,$version,$manufacturer";
		
		echo "<option value = '$retrievedDetails'>$model</option>";
	}//end while
mysqli_close($connection);
?>
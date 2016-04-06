<!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 24/3/2016
 
 Unit 2
 Purpose        : Enables the deletion of a car from the Car table.
				  (Not strictly speaking i.e. value of DeleteFlag is changed from '0' to '1')
				  Contains SQL to update DeleteFlag of chosen record in database.
				  Presents user with an uneditable verifying the record he/she 
				  has just flagged for deletion.
-->
<?php
	//Reuse code 
	require_once 'functions.php';
	//Get connected to database
	$con = getConnection();
	//Fields to be used with 'Get' for uneditable form
	$carReg = $_POST['regNo'];
	$manufacturer = $_POST['manufacturer'];
	$model = $_POST['model'];
	$engineSize = $_POST['engineSize'];
	$doors = $_POST['numOfDoors'];
	$colour = $_POST['colour'];
	$version = $_POST['version'];
	$bStyle = $_POST['bStyle'];
	
	
	// delete the record from Category table for the selected category id
	// (not actually deleting record just changing value of DeleteFlag)
	$sql = "UPDATE Car SET DeleteFlag='1' WHERE Car.RegNo = '$carReg'";
	// If above query is not satisfied.
	if(!mysqli_query($con, $sql)) {
	die("An Error in the SQL Delete Category Query: " . mysqli_error($con));
	}
	//close connection
	mysqli_close($con);
	//Reuse code
	include 'header.php';
?>
	<!-- An uneditable form to show user the car which they have just deleted from the database -->
	<form class="form" action="deleteCar.php" method="get">
	<!-- Class form used to ensure all forms look the same,"get" 
		 used to display fields from the record just flagged for deletion in Car table-->
		<h2>This car has been removed from the system!</h2>
		
		<label>Registration Number</label>
									<!--echo field from record just flagged for deletion -->
		<input type="text" value="<?php echo $carReg  ?>" readonly>
		
		<label>Manufacturer</label>
		<input type="text" value="<?php echo $manufacturer ?>" readonly>
		
		<label>Model</label>
		<input type="text" value="<?php echo $model ?>" readonly>
		
		<label>Engine Size</label>
		<input type="number" value="<?php echo $engineSize ?>" readonly>
		
		<label>Number of Doors</label>
		<input type="number" value="<?php echo $doors ?>" readonly>
		
		<label>Colour</label>
		<input type="text" value="<?php echo $colour ?>" readonly>
		
		<label>Version</label>
		<input type="text" value="<?php echo $version ?>" readonly>
		
		<label>Body Style</label>
		<input type="text" value="<?php echo $bStyle ?>" readonly>
		<!-- class used to ensure all buttons look the same,when button clicked 
			user returns to deleteCar.php (action)-->
		<input type="submit" class="btnGreen" id="btnSuccess" value="Previous Screen">
 
	</form>

<?php 
	//Reuse code
	include 'footer.php';
?>
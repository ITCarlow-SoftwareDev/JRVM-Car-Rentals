<!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 24/3/2016
 Last edited 	:

 Purpose        : Flag a car for deletion in car table 
-->
<?php
	require_once 'functions.php';
	$con = getConnection();
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
	if(!mysqli_query($con, $sql)) {
	die("An Error in the SQL Delete Category Query: " . mysqli_error($con));
	}
	mysqli_close($con);
	include 'header.php';
?>
	<!-- An uneditable form to show user the car which they have just deleted from the database -->
	<form class="form" action="deleteCar.php" method="get">

		<h2>This car has been removed from the system!</h2>
		
		<label>Registration Number</label>
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
		
		<input type="submit" class="btnGreen" id="btnSuccess" value="Return to Previous Screen">
 
	</form>

<?php 
	include 'footer.php';
?>
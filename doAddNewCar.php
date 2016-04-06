<!-- 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 25/2/2016

 Unit 1
 Purpose        : Enables the addition of a new car into the Car table.
				  Contains SQL to insert new record into database.
				  Presents user with an uneditable verifying the record he/she 
				  has just added.
-->
<?php
 require_once "functions.php"; 				
 
    $conn = getConnection();					// located in function.php
    $theRegNum = $_POST['regNum'];
    $theColour= $_POST['colour'];
    $theChassisNumber = $_POST['chassisNumber'];
	$theNumberOfDoors = $_POST['numberOfDoors'];
    $thePurchasePrice = $_POST['purchasePrice'];
    $theDateAddedToFleet = $_POST['dateAddedToFleet'];
	$theEngineSize = $_POST['engineSize']; 
	$theFuelType = $_POST['fuelType'];
	$theModelID = $_POST['modelID'];
	
	//SQL to insert new record
    $sql = "INSERT INTO Car(RegNo, Colour, ChassisNo, DateAdded, PurchasePrice, Doors, EngineSize, FuelType,ModelID) VALUES ('"
        . $theRegNum . "', '" . $theColour . "', '" . $theChassisNumber ."', '" . $theDateAddedToFleet . "', '" . $thePurchasePrice . "', '" . $theNumberOfDoors . "', '" . $theEngineSize ."', '" .$theFuelType ."', '" .$theModelID."');";
		

    if(mysqli_query($conn, $sql)) {
        // If above query is satisfied.
    } 
	else {
        die("Error !! Car not added to database. Check query and connection " . mysqli_error($conn));
    }
    mysqli_close($conn);
	//Reuse code
include 'header.php';	
?>	
<!-- An uneditable form to show user the car which they have just added to the database -->
<form class="form" action="addNewCar.php" method="get">
<!-- Class form used to ensure all forms look the same,"get" 
used to display fields from the record just added to Car table-->
	  <h2>This car has been added to database</h2>
	  
	  <label>Registration Number </label>
								<!--echo field from record just added -->
	  <input type="text" value="<?php echo $theRegNum ?>" readonly>
	  
	  <label>Colour </label>
	  <input type="text" value="<?php echo $theColour ?>" readonly>
	  
	  <label>Chassis Number (VIN) </label>
	  <input type="text" value="<?php echo $theChassisNumber ?>" readonly>
	  
	  <label>Number of Doors </label>
	  <input type="number" value="<?php echo $theNumberOfDoors ?>" readonly>
	  
	  <label>Purchase Price </label>
	  <input type="number" value="<?php echo $thePurchasePrice ?>" readonly>
	  
	  <label>Date added to fleet </label>
	  <input type="date" value="<?php echo $theDateAddedToFleet ?>" readonly>
	  
	  <label>Engine Size </label>
	  <input type="number" value="<?php echo $theEngineSize ?>" readonly>
	  
	  <label>Fuel Type </label> <br>
	  <input type="text" value="<?php echo $theFuelType ?>" readonly>
	  
	  <label>Model ID </label> <br>
	  <input type="number" value="<?php echo $theModelID ?>" readonly>
	 
	  <div class="form-btn">
	  <!-- class form-btn used to ensure all buttons look the same,when button clicked 
			user returns to addNewCar.php-->
		<input type="submit" class="btnGreen" id="btnSuccess" value="Previous Screen">
	  </div>
</form>
<?php 
	//Reuse code
	include 'footer.php';
?>
 
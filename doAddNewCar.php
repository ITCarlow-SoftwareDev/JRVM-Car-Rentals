<!-- 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 25/2/2016
 Last edited 	:

 Unit 1
 Purpose        : Enables the addition of new cars to the Car table.
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
	//$theModelName = $_POST['modelName'];
	$theEngineSize = $_POST['engineSize'];
	$theFuelType = $_POST['fuelType'];
	
	//query to add a new record to Category table
    $sql = "INSERT INTO Car(RegNo, Colour, ChassisNo, DateAdded, PurchasePrice, Doors, EngineSize, FuelType) VALUES ('"
        . $theRegNum . "', '" . $theColour . "', '" . $theChassisNumber . "', '" . $theNumberOfDoors . "', '" . $thePurchasePrice . "', '" . $theDateAddedToFleet ."', '" . $theEngineSize."', '" . $theFuelType. "');";

    if(mysqli_query($conn, $sql)) {
        // Insert successful.
        header("location: addCompany.php");
    } 
	else {
        die("Could not insert into database" . mysqli_error($conn));
    }
    mysqli_close($conn);
    
	?>
	
<!-- Show car details just added to database -->
<form class="form" action="addNewCar.php" method="get">

	  <h2>This car has been added to database</h2>
	  
	  <label>Registration Number</label>
	  <input type="text" value="<?php echo $catId ?>" readonly>
	  
	  <label>Colour</label>
	  <input type="text" value="<?php echo $costPerDay ?>" readonly>
	  
	  <label>Chassis Number (VIN)</label>
	  <input type="number" value="<?php echo $fiveDayDisc ?>" readonly>
	  
	  <label>Number of Doors </label>
	  <input type="number" value="<?php echo $tenDayDisc ?>" readonly>
	  
	  <label>Purchase Price </label>
	  <input type="number" value="<?php echo $tenDayDisc ?>" readonly>
	  
	  <label>Date added to fleet</label>
	  <input type="date" value="<?php echo $tenDayDisc ?>" readonly>
	  
	  <label>Engine Size</label>
	  <input type="number" value="<?php echo $tenDayDisc ?>" readonly>
	  
	  <label>Fuel Type</label> <br>
	  <input type="text" value="<?php echo $tenDayDisc ?>" readonly>
	  
	  <div class="rental-form-btn">
		<input type="submit" class="btnGreen" id="btnSuccess" value="Return to Previous Screen">
	  </div>
</form>
<?php 
	include 'footer.php';
?>
 
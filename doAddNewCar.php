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
	$theEngineSize = $_POST['engineSize']; 
	$theFuelType = $_POST['fuelType'];
	$theModelID = $_POST['modelID'];
	
    $sql = "INSERT INTO Car(RegNo, Colour, ChassisNo, DateAdded, PurchasePrice, Doors, EngineSize, FuelType,ModelID) VALUES ('"
        . $theRegNum . "', '" . $theColour . "', '" . $theChassisNumber ."', '" . $theDateAddedToFleet . "', '" . $thePurchasePrice . "', '" . $theNumberOfDoors . "', '" . $theEngineSize ."', '" .$theFuelType ."', '" .$theModelID."');";
	//This Query works in Plesk -- INSERT INTO Car(RegNo, Colour, ChassisNo, DateAdded, PurchasePrice, Doors, EngineSize, FuelType,ModelID) VALUES ('4444LS1999', 'Pink','AAAASSSSDDDD0000', '2010-02-02','200000',5,1.6,'Diesel',3);
	echo $sql; //for debug

    if(mysqli_query($conn, $sql)) {
        // If above query is satisfied.
       // header("location: addNewCar.php");
    } 
	else {
        die("Error !! Car not added to database. Check query and connection " . mysqli_error($conn));
    }
    mysqli_close($conn);
include 'header.php';	
?>	
<!-- An uneditable form to show user the car which they have just added to the database -->
<form class="form" action="addNewCar.php" method="get">

	  <h2>This car has been added to database</h2>
	  
	  <label>Registration Number </label>
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
		<input type="submit" class="btnGreen" id="btnSuccess" value="Return to Previous Screen">
	  </div>
</form>
<?php 
	include 'footer.php';
?>
 
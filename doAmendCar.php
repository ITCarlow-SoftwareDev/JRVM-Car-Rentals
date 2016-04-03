<!-- 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 25/2/2016
 Last edited 	:

 Unit 1
 Purpose        : Enables the addition of new cars to the Car table.
 
 Query used in PLESK to confirm SQL 
//UPDATE Car INNER JOIN Model ON Car.ModelID = Model.ModelID SET Car.ChassisNo ="000121457",
//Car.Colour ="pink",Car.DateAdded ="2014-01-01", Model.Model="Fiesta",
//Model.BodyStyle="HatchBack" WHERE Car.RegNo =000
-->
<?php

 require_once "functions.php"; 				
 
    $conn = getConnection();					// located in function.php
    $regNo = $_POST['regNo'];
    $model= $_POST['model'];
    $manufacturer = $_POST['manufacturer'];
	$version = $_POST['version'];
    $chassisNo = $_POST['chassisNo'];
    $colour = $_POST['colour'];
	$bStyle = $_POST['bStyle']; 
	$dateAdded = $_POST['dateAdded'];
	
    $sql = " UPDATE Car INNER JOIN Model ON Car.ModelID = Model.ModelID
			 SET Car.ChassisNo =$chassisNo,
				 Car.Colour =$colour,
				 Car.DateAdded =$dateAdded,
				  Model.Model=$model,
				  Model.BodyStyle=$bStyle";
	echo $sql;	 //!!!!!!******** FOR DEBUG DELETE ********!!!!!!

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
<form class="form" action="amendCar.php" method="get">

	  <h2>This car has been added to database</h2>
	  
	  <label>Registration Number </label>
	  <input type="text" value="<?php echo $regNo ?>" readonly>
	  
	  <label>Model </label>
	  <input type="text" value="<?php echo $model ?>" readonly>
	  
	  <label>Manufacturer </label>
	  <input type="text" value="<?php echo $manufacturer ?>" readonly>
	  
	  <label>Version </label>
	  <input type="text" value="<?php echo $version?>" readonly>
	  
	  <label>Chassis Number </label>
	  <input type="text" value="<?php echo $chassisNo ?>" readonly>
	  
	  <label>Colour </label>
	  <input type="text" value="<?php echo $colour ?>" readonly>
	  
	  <label>Body Style</label>
	  <input type="text" value="<?php echo $bStyle ?>" readonly>
	  
	  <label>Date Added To Fleet</label>
	  <input type="date" value="<?php echo $dateAdded ?>" readonly>
	 
	  <div class="form-btn">
		<input type="submit" class="btnGreen" id="btnSuccess" value="Return to Previous Screen">
	  </div>
</form>
<?php 
	include 'footer.php';
?>
 
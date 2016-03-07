<!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 25/2/2016
 Last edited 	:

 Unit 1
 Purpose        : Allow user to enter details of a new car which has been acquired by 
				  JRVM Rentals.
-->
<?php
	include 'header.php';
?>
<div class="form">
		<form action="doAddNewCar.php" method="post">
			<label>Registration Number</label><br>
			<input type="text" name="regNum" id="theRegNum" placeholder="e.g 1234-lS-161"> <br> <!-- Make reg pattern, add required -->
			 
			<label>Colour</label> <br>
			<input type="text" name="colour" id="theColour" placeholder="e.g Green"> <br>
			
			<label>Chassis Number (VIN)</label> <br>
			<input type="text" name="chassisNumber" id="theChassisNumber" placeholder="e.g JT164JA80XXXXXXXX"> <br> <!-- add required -->
			
			<label>Number of Doors </label> <br>
			<input type="number"min="2" name="numberOfDoors" id="theNumOfDoors" placeholder="e.g 5"><br>
			
			<label>Purchase Price </label> <br>
			<input type="number" min="0" step=".1" name="purchasePrice" id="thePurchasePrice" placeholder=" e.g 23,999.99"> <br>   <!-- http://www.w3schools.com/tags/att_input_step.asp -->
			
			<label>Date added to fleet</label> <br>
			<input type="date" name="dateAddedToFleet" id="theAddedDate" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"> <br> <!-- add function cant add date in future, add required -->
			
			<label>Model ID</label><br>
			<input type="text" name="modelName" id="theModelId"><br>		<!--****Query***********  add required -->
			
			<label>Engine Size</label><br>
			<input type="number" min="0" max="5" step=".1" name="engineSize" id="thengineSize" placeholder="e.g 1.2"><br>
			
			<label>Fuel Type</label> <br>
			<input type="text" name="fuelType" id="thefuelType" placeholder="e.g. Diesel"><br>
										
			<br>
			<div class="addNewCarBtns">
				<button class="btnGreen">Submit</button>
				<button class="btnRed">Cancel</button>
			</div>
		</form>
	</div>
	<script>
		//function declaration
		function confirmAddition() {
			var userFeedback = userFeedback("Are you sure you want to add this car ???");
			if(userFeedback == true) {
				return true;
			}//end if
			else {
				return false;
			}//end else
		} //end confirmAddition()
	</script>
<?php 
	include 'footer.php';
?>



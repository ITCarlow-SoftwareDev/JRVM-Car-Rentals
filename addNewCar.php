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
<form class="form"  name="addCar" id="addNewCarForm" onsubmit="return confirmAddition()" action="doAddNewCar.php"  method="post">
	<h2>Add a New Car</h2>
	<div id="formLeft">
		<label id="model">Select Model</label><br>
		
		<!--drop down for existing car registration numbers-->
		<select name="selectedModel" id="selectedModel" title="Choose model from drop-down" onchange='populate()' required>
			<option value="Select model"</option>
			<?php include "selectModel.php"; ?>      
		</select> <br>  
	
		<!-- to update Car table with ModelID using hidden -->
		<!--  http://www.w3schools.com/tags/tag_input.asp --> 
		<input type="hidden" name="modelID" id="modelID" disabled> <br>
	
		<!-- to be populated with relevant data from particular model id -->

		<label>Body Style</label> <br>
		<input type="text" name="bodystyle" id="bodystyle" disabled> <br>
		
		<label>Version</label> <br>
		<input type="text" name="version" id="version" disabled> <br>
		
		<label>Manufacturer</label> <br>
		<input type="text" name="manufacturer" id="manufacturer" disabled> <br>

		<label>Registration Number</label><br>
		<input type="text" maxlength="12" name="regNum" id="theRegNum" title ="Enter Registration Number of car e.g. 2010-LS-1234" placeholder="e.g 1234-LS-161" required> <br> <!-- Make reg pattern, add required -->
		 
		<label>Colour</label> <br>
		<input type="text" maxlength="15" name="colour" id="theColour" pattern="[a-zA-Z. ]+" title ="Alpha Characters only" placeholder="e.g Green" required> <br>
	</div>
	<div id="formRight">
		<label>Chassis Number (VIN)</label> <br>
		<input type="text" maxlength="15" name="chassisNumber" title ="Enter the chassis Number associated with your car. It can be number + letter format" id="theChassisNumber" placeholder="e.g ABCDE0123456789" required> <br> <!-- add required -->
		
		<label>Number of Doors </label> <br>
		<input type="number"min="2"  max="10" name="numberOfDoors" title ="Enter number of doors only"  id="theNumOfDoors" placeholder="e.g 5" required><br>
		
		<label>Purchase Price (&euro;'s) </label> <br>
		<input type="number" min="0" step=".01" title="Numbers only indicating how much the car was purchased for" name="purchasePrice" id="thePurchasePrice" placeholder=" e.g 23,999.99" required> <br>   <!-- http://www.w3schools.com/tags/att_input_step.asp -->
		
		<label>Date added to fleet</label> <br>
		<input type="date" name="dateAddedToFleet" id="theAddedDate" required> <br> <!-- add function cant add date in future, add required -->
		
		<label>Engine Size</label><br>
		<input type="number" min="1" max="5" step=".1" name="engineSize" id="thengineSize" placeholder="e.g 1.2" required><br>
		
		<label>Fuel Type</label> 
		<br>
		<select name="fuelType" id="thefuelType">
				  <option value="Petrol">Petrol</option>
				  <option value="Diesel">Diesel</option>
		</select> <br>
	</div>
		<div class="form-btn">
			<button class="btnRed" type="reset">Clear</button>
			<button class="btnGreen" type="submit">Submit</button>
		</div>
</form>
	<script>
	
		//function declaration
		function confirmAddition(){
								///3 types alert, confirm, prompt
			var userFeedback = confirm("Are you sure you want to add this car to the database?");
			if(userFeedback == true){
				
				//ModelID needs to be enabled now so value can be retrieved 
				document.getElementById("modelID").disabled = false;
				return true;
			}//end if
			else{
				return false;
			}//end else
		} //end confirmAddition()

		//function declaration 
		function populate(){
		var selectM = document.getElementById("selectedModel");
		//chosenM assigned value of the model selected from list box
		var chosenM = selectM.options[selectM.selectedIndex].value; 
		var retrievedDetails = chosenM.split(',');
		document.getElementById("modelID").value = retrievedDetails[0];
		document.getElementById("model").value = retrievedDetails[1];
		document.getElementById("bodystyle").value = retrievedDetails[2];
		document.getElementById("version").value = retrievedDetails[3];
		document.getElementById("manufacturer").value = retrievedDetails[4];
		
		$retrievedDetails = "$modelID,$model,$bodyStyle,$version,$manufacturer";

		alert ("For debug,Retrieved details are :" + retrievedDetails ); //For Debug **********DELETE
		
		} // end populate
	</script>
<?php 
	include 'footer.php';
?>
<!-- 
Recommended browser - Google Chrome 
 Author         : Ronan Timmons
 Student No     : C00197150
 Date created   : 25/2/2016

 Unit 1
 Purpose        : Allow user to add new record for a new car which has been acquired by 
				  JRVM Rentals.
-->
<?php 
	//Reuse code
	include 'header.php';
	//To make sure car cannot be added in future
	date_default_timezone_set('UTC'); 
?>
<form class="form"  name="addCar" id="addNewCarForm" onsubmit="return confirmAddition()" action="doAddNewCar.php" required method="post">
	<h2>Add a New Car</h2>
	<!--Splits data into left column for attractiveness i.e. not one long form -->
	<div id="formLeft"> 
		<label id="model">Select Model</label><br>
		
		<select name="selectedModel" id="selectedModel" title="Choose model from drop-down" onchange='populate()' required>
			<option value="Select model"</option>
			<!--drop down for existing car Models-->
			<?php include "selectModel.php"; ?>      
		</select> <br>  
	
		<!--  used to update Car table with ModelID using hidden -->
		<!--  http://www.w3schools.com/tags/tag_input.asp --> 
		<input type="hidden" name="modelID" id="modelID" disabled> <br>
	
		<!--***** to be populated with relevant data from particular model id *****-->
		<label>Body Style</label> <br>
		<input type="text" name="bodystyle" id="bodystyle" disabled> <br>
		
		<label>Version</label> <br>
		<input type="text" name="version" id="version" disabled> <br>
		
		<label>Manufacturer</label> <br>
		<input type="text" name="manufacturer" id="manufacturer" disabled> <br>
		<!--***** end of data to be populated *****-->
		
		<label>Registration Number</label><br>
		<input type="text" maxlength="12" name="regNum" id="theRegNum" autocomplete="off" title ="Enter Registration Number of car e.g. 161-LS-1234" placeholder="e.g 161-LS-1234" required > <br>
		 
		<label>Colour</label> <br>
		<input type="text" maxlength="15" name="colour" id="theColour" pattern="[a-zA-Z. ]+" title ="Alpha Characters only" placeholder="e.g Green" required> <br>
	</div>
	<!--Splits data into Right column for attractiveness i.e. not one long form -->
	<div id="formRight">
		<label>Chassis Number (VIN)</label> <br>
		<input type="text" maxlength="15" name="chassisNumber" autocomplete="off" title ="Chassis Number associated with your car. It can be number + letter format" id="theChassisNumber" placeholder="e.g ABCDE0123456789" required> <br>
		
		<label>Number of Doors </label> <br>
		<input type="number"min="2"  max="10" name="numberOfDoors" title ="Enter number of doors only (Min-2,Max-10)"  id="theNumOfDoors" placeholder="e.g 5" required><br>
		
		<label>Purchase Price (&euro;'s) </label> <br>
		<!-- http://www.w3schools.com/tags/att_input_step.asp -->
		<input type="number" min="0" step=".01" title="Numbers only indicating how much the car was purchased for" name="purchasePrice" id="thePurchasePrice" placeholder=" e.g 23,999.99" required> <br>   
		
		<label>Date added to fleet</label> <br>								<!--Makes sure date cannot be chosen in the future -->
																			<!--http://php.net/manual/en/datetime.format.php -->
		<input type="text" name="dateAddedToFleet" id="theAddedDate" value="<?php echo date('d/m/Y');?>" readOnly required> <br>
		
		<label>Engine Size</label><br>
		<!-- http://www.w3schools.com/tags/att_input_step.asp -->
		<input type="number" min="1" max="5" step=".1" name="engineSize" title="Engine litre i.e. 1.4 or 2.2 etc." id="thengineSize" placeholder="e.g 1.2" required><br>
		
		<label>Fuel Type</label> 
		<br>
		<select name="fuelType" id="thefuelType">
				<!-- Drop down for fuel type -->
				  <option value="Petrol">Petrol</option>
				  <option value="Diesel">Diesel</option>
		</select> <br>
	</div><!--end formRight -->
	<!-- class form-btn used to ensure all buttons look the same,when button clicked
		 confirmAddition() is invoked-->
		<div class="form-btn">
			<button class="btnRed" type="reset">Clear</button>
			<button class="btnGreen" type="submit">Submit</button>
		</div>
</form>
	<script>
		//function declaration
		//Asks the user to confirm the addition of a new record
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
		//Used to populate fields with data related to value of selectedModel
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
		} // end populate
	</script>
<?php 
	//Reuse code
	include 'footer.php';
?>